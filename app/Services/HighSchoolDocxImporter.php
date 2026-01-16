<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use ZipArchive;
use DOMDocument;
use DOMXPath;

class HighSchoolDocxImporter
{
    /**
     * Import mapping:
     * 1 DOCX => 1 Course (UI: Activity), division=highschool, published=true
     * Each "Task N" section => 1 Lesson (UI: Task)
     * Inside each Lesson => MULTIPLE Task rows (UI: Steps), split by "Step X:"
     */
    public function import(string $absoluteDocxPath, bool $dryRun = false): array
    {
        $filename = basename($absoluteDocxPath);
        $fileNo   = $this->extractFileNumber($filename);

        // Read DOCX safely (no PHPWord; avoids image/zip issues)
        $lines = $this->docxToLinesViaZipXml($absoluteDocxPath);

        // Title ALWAYS from filename (docs vary inside)
        $activityTitle = $this->cleanTitleFromFilename($filename);

        $estimatedMinutes = $this->extractEstimatedMinutesFromLines($lines);

        // Pull Task titles from breakdown if available (Task 1 - ...)
        $taskTitles = $this->extractTaskTitlesFromLines($lines);

        // Split into Task chunks: [taskNo => chunkLines[]]
        $taskChunks = $this->splitIntoMajorTaskChunksFromLines($lines);

        // Slug includes # for stable ordering/uniqueness; title does not include "#"
        $baseSlug   = Str::slug($activityTitle);
        $courseSlug = $fileNo ? "highschool-{$fileNo}-{$baseSlug}" : "highschool-{$baseSlug}";
        $courseSlug = $this->limitSlug($courseSlug);

        $result = [
            'course_title'  => $activityTitle,
            'course_slug'   => $courseSlug,
            'lessons_count' => count($taskChunks),
        ];

        if ($dryRun) {
            return $result;
        }

        DB::transaction(function () use ($courseSlug, $activityTitle, $estimatedMinutes, $taskTitles, $taskChunks) {

            /** @var Course $course */
            $course = Course::updateOrCreate(
                ['slug' => $courseSlug],
                [
                    'division'          => 'highschool',
                    'title'             => $activityTitle,
                    'summary'           => null,
                    'image_path'        => null,
                    'is_published'      => true,
                    'estimated_minutes' => $estimatedMinutes,
                ]
            );

            // Safe re-run: delete existing lessons+steps under this course and recreate
            $existingLessons = Lesson::where('course_id', $course->id)->get();
            foreach ($existingLessons as $lesson) {
                Task::where('lesson_id', $lesson->id)->delete();
                $lesson->delete();
            }

            $lessonOrder = 1;

            foreach ($taskChunks as $taskNo => $chunkLines) {
                // Lesson title from breakdown if available; fallback to "Task N"
                $lessonTitle = $taskTitles[$taskNo] ?? "Task {$taskNo}";

                $lessonSlug = $this->uniqueLessonSlug(
                    $course->id,
                    $this->limitSlug("t{$taskNo}-" . Str::slug($lessonTitle))
                );

                /** @var Lesson $lesson */
                $lesson = Lesson::create([
                    'course_id'  => $course->id,
                    'title'      => $lessonTitle,
                    'slug'       => $lessonSlug,
                    'sort_order' => $lessonOrder,
                ]);

                // ✅ Split Task chunk into multiple Steps using "Step X:" headings
                $steps = $this->splitStepsFromTaskChunk($chunkLines);

                // Fallback: if no steps found, keep 1 step with all content
                if (count($steps) === 0) {
                    $steps = [
                        [
                            'title' => $lessonTitle,
                            'lines' => $chunkLines,
                        ],
                    ];
                }

                $stepOrder = 1;
                foreach ($steps as $s) {
                    $stepTitle = $s['title'];
                    $bodyLines = $s['lines'];

                    $stepSlug = $this->uniqueStepSlug(
                        $lesson->id,
                        $this->limitSlug("step-{$stepOrder}-" . Str::slug($stepTitle))
                    );

                    Task::create([
                        'lesson_id'  => $lesson->id,
                        'title'      => $stepTitle,
                        'slug'       => $stepSlug,
                        'sort_order' => $stepOrder,
                        'body'       => $this->linesToHtml($bodyLines),
                    ]);

                    $stepOrder++;
                }

                $lessonOrder++;
            }
        });

        return $result;
    }

    /**
     * DOCX -> text lines by reading word/document.xml from ZIP.
     * No PHPWord => avoids image ZIP crashes.
     */
    private function docxToLinesViaZipXml(string $absoluteDocxPath): array
    {
        $zip = new ZipArchive();
        $ok = $zip->open($absoluteDocxPath);

        if ($ok !== true) {
            throw new \RuntimeException("Cannot open DOCX as zip: {$absoluteDocxPath} (ZipArchive code: {$ok})");
        }

        $xml = $zip->getFromName('word/document.xml');
        $zip->close();

        if ($xml === false) {
            throw new \RuntimeException("word/document.xml not found in DOCX: {$absoluteDocxPath}");
        }

        $dom = new DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = false;

        libxml_use_internal_errors(true);
        $dom->loadXML($xml);
        libxml_clear_errors();

        $xpath = new DOMXPath($dom);
        $xpath->registerNamespace('w', 'http://schemas.openxmlformats.org/wordprocessingml/2006/main');

        $lines = [];

        // Each paragraph => one "line"
        foreach ($xpath->query('//w:p') as $p) {
            $isList = $xpath->query('.//w:numPr', $p)->length > 0;

            $texts = [];
            foreach ($xpath->query('.//w:t', $p) as $t) {
                $texts[] = $t->nodeValue;
            }

            $line = trim(preg_replace('/\s+/u', ' ', implode('', $texts)) ?? '');
            $line = $this->normalizeLine($line);

            if ($line === '') {
                $lines[] = '';
                continue;
            }

            if ($isList) {
                $lines[] = '• ' . $line;
            } else {
                $lines[] = $line;
            }
        }

        return $lines;
    }

    private function normalizeLine(string $line): string
    {
        $line = trim($line);
        $line = str_replace(["–", "—"], "-", $line);

        // Clean common bad replacement chars without breaking normal text
        $line = str_replace(["\xEF\xBF\xBD"], '', $line); // "�" replacement char in some cases
        $line = preg_replace('/\s+/u', ' ', $line) ?? $line;

        return trim($line);
    }

    private function extractFileNumber(string $filename): ?int
    {
        if (preg_match('/#\s*(\d+)/', $filename, $m)) {
            return (int) $m[1];
        }
        return null;
    }

    /**
     * Always use filename for Activity title.
     * Never include "#1 -".
     */
    private function cleanTitleFromFilename(string $filename): string
    {
        $name = preg_replace('/\.docx$/i', '', $filename) ?? $filename;

        // remove leading "#1", "_#4", etc.
        $name = preg_replace('/^_?\s*#\s*\d+\s*-?\s*/', '', $name) ?? $name;

        // remove date suffix like "-Dec 30..." or "-Jan 2 ..."
        $name = preg_replace('/-(Dec|Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov)\b.*$/i', '', $name) ?? $name;

        $name = trim($name, " -_\t\n\r\0\x0B");

        return $name !== '' ? $name : 'High School Activity';
    }

    private function extractEstimatedMinutesFromLines(array $lines): ?int
    {
        $text = implode("\n", array_map('trim', $lines));

        if (preg_match('/Total Estimated Time[^0-9]*(\d+)\s*-\s*(\d+)\s*minutes/i', $text, $m)) {
            return (int) round(((int)$m[1] + (int)$m[2]) / 2);
        }

        if (preg_match('/Estimated Time for Activity[^0-9]*(\d+)\s*-\s*(\d+)\s*minutes/i', $text, $m)) {
            return (int) round(((int)$m[1] + (int)$m[2]) / 2);
        }

        if (preg_match('/Total Estimated Time[^0-9]*(\d+)\s*minutes/i', $text, $m)) {
            return (int) $m[1];
        }

        return null;
    }

    /**
     * Extract Task titles from breakdown lines like:
     * - "Task 1 - Gift of Peace"
     * - "Task 2: Something"
     */
    private function extractTaskTitlesFromLines(array $lines): array
    {
        $titles = [];

        foreach ($lines as $l) {
            $l = trim((string)$l);
            if ($l === '') continue;

            if (preg_match('/^Task\s+(\d+)([A-Z])?\s*[-:]\s*(.+)$/i', $l, $m)) {
                $no = (int) $m[1];
                if (!isset($titles[$no])) {
                    $titles[$no] = "Task {$no} – " . trim($m[3]);
                }
            }
        }

        return $titles;
    }

    /**
     * Split into Task chunks reliably.
     * - detect "Task 1", "Task 2", "Task 1A" etc
     * - keep only starts that look like REAL task sections (markers appear soon after)
     */
    private function splitIntoMajorTaskChunksFromLines(array $lines): array
    {
        $starts = $this->getRealTaskStartIndexes($lines); // [taskNo => idx]

        if (empty($starts)) {
            return [1 => $lines];
        }

        asort($starts); // by index

        $taskNos = array_keys($starts);
        $idxs    = array_values($starts);

        $chunks = [];
        for ($i = 0; $i < count($taskNos); $i++) {
            $no   = $taskNos[$i];
            $from = $idxs[$i];
            $to   = ($i + 1 < count($idxs)) ? $idxs[$i + 1] : count($lines);

            $chunks[$no] = array_slice($lines, $from, $to - $from);
        }

        ksort($chunks);
        return $chunks;
    }

    private function getRealTaskStartIndexes(array $lines): array
    {
        $candidates = []; // taskNo => [idx...]

        foreach ($lines as $i => $l) {
            $l = trim((string)$l);
            if ($l === '') continue;

            // Task 1 / Task 1 - / Task 1: / Task 1A
            if (preg_match('/^Task\s+(\d+)([A-Z])?\b/i', $l, $m)) {
                $no = (int) $m[1];

                if ($this->looksLikeRealTaskSectionStart($lines, $i)) {
                    $candidates[$no][] = $i;
                }
            }
        }

        $starts = [];
        foreach ($candidates as $no => $idxList) {
            sort($idxList);
            $starts[$no] = $idxList[0];
        }

        unset($starts[0]);
        return $starts;
    }

    private function looksLikeRealTaskSectionStart(array $lines, int $startIdx): bool
    {
        $needles = [
            'Teacher Background',
            'Learning Goals',
            'Success Criteria',
            'Teacher Instructions',
            'Student Instructions',
            'Estimated Time',
            'Materials',
            'Resources',
            'Assessment',
            'Teacher Look-Fors',
        ];

        $max = min(count($lines) - 1, $startIdx + 80);

        for ($i = $startIdx + 1; $i <= $max; $i++) {
            $l = trim((string)$lines[$i]);
            if ($l === '') continue;

            foreach ($needles as $n) {
                if (stripos($l, $n) !== false) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * ✅ Split a Task chunk into multiple Steps using headings like:
     * "Step 1:", "Step 2 -", "Step 5." etc.
     *
     * Each step:
     * - title = the first non-empty line in that step chunk (keeps "Step X: ...")
     * - lines = from that heading until next step heading
     */
    private function splitStepsFromTaskChunk(array $lines): array
    {
        $stepIndexes = [];

        foreach ($lines as $i => $l) {
            $l = trim((string)$l);
            if ($l === '') continue;

            // Step 1:  / Step 1 -  / Step 1.  / Step 1)
            if (preg_match('/^Step\s+(\d+)\s*[:\.\-\)]/i', $l)) {
                $stepIndexes[] = $i;
            }
        }

        if (count($stepIndexes) === 0) {
            return [];
        }

        $steps = [];
        $stepIndexes[] = count($lines); // sentinel end

        for ($k = 0; $k < count($stepIndexes) - 1; $k++) {
            $from  = $stepIndexes[$k];
            $to    = $stepIndexes[$k + 1];
            $chunk = array_slice($lines, $from, $to - $from);

            // Step title is first non-empty line
            $title = 'Step';
            foreach ($chunk as $cl) {
                $cl = trim((string)$cl);
                if ($cl !== '') {
                    $title = $this->cleanStepTitle($cl);
                    break;
                }
            }

            $steps[] = [
                'title' => $title,
                'lines' => $chunk,
            ];
        }

        return $steps;
    }

    /**
     * Minimal stable HTML:
     * - blank line => paragraph break
     * - "• " lines => UL/LI
     */
    private function linesToHtml(array $lines): string
    {
        $html = [];
        $para = [];
        $inUl = false;

        $flushPara = function () use (&$html, &$para) {
            if (!empty($para)) {
                $html[] = '<p>' . e(implode(' ', $para)) . '</p>';
                $para = [];
            }
        };

        $closeUl = function () use (&$html, &$inUl) {
            if ($inUl) {
                $html[] = '</ul>';
                $inUl = false;
            }
        };

        foreach ($lines as $raw) {
            $l = trim((string)$raw);

            if ($l === '') {
                $flushPara();
                $closeUl();
                continue;
            }

            if (str_starts_with($l, '• ')) {
                $flushPara();
                if (!$inUl) {
                    $html[] = '<ul>';
                    $inUl = true;
                }
                $item = trim(substr($l, 2));

                // remove accidental encoding artifacts if present
                $item = str_replace(["\xEF\xBF\xBD", "�"], '', $item);

                $html[] = '<li>' . e($item) . '</li>';
                continue;
            }

            $closeUl();
            $para[] = $l;
        }

        $flushPara();
        $closeUl();

        return implode("\n", $html);
    }

    private function limitSlug(string $slug): string
    {
        $slug = Str::slug($slug);
        if (strlen($slug) <= 250) return $slug;
        return substr($slug, 0, 250);
    }

    private function uniqueLessonSlug(int $courseId, string $slug): string
    {
        $base = $slug;
        $i = 2;

        while (Lesson::where('course_id', $courseId)->where('slug', $slug)->exists()) {
            $slug = $this->limitSlug($base . '-' . $i);
            $i++;
        }

        return $slug;
    }

    private function uniqueStepSlug(int $lessonId, string $slug): string
    {
        $base = $slug;
        $i = 2;

        while (Task::where('lesson_id', $lessonId)->where('slug', $slug)->exists()) {
            $slug = $this->limitSlug($base . '-' . $i);
            $i++;
        }

        return $slug;
    }

    private function cleanStepTitle(string $rawTitle): string
    {
        $rawTitle = trim($rawTitle);

        // Remove: "Step 2:", "Step 2 -", "Step 2.", "Step 2)" (case-insensitive)
        $clean = preg_replace('/^Step\s+\d+\s*[:\.\-\)]\s*/i', '', $rawTitle) ?? $rawTitle;

        // If after cleaning it's empty, fallback to original
        $clean = trim($clean);
        return $clean !== '' ? $clean : $rawTitle;
    }

}
