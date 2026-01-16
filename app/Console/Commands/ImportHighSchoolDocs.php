<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Services\HighSchoolDocxImporter;

class ImportHighSchoolDocs extends Command
{
    protected $signature = 'import:highschool-docs
        {--path=storage/app/import/highschool : Folder containing .docx files}
        {--dry-run : Print what would be imported without writing to DB}';

    protected $description = 'Import High School DOCX files into courses/lessons/tasks (Activity/Task/Step)';

    public function handle(HighSchoolDocxImporter $importer): int
    {
        $path = base_path($this->option('path'));
        $dryRun = (bool) $this->option('dry-run');

        if (!File::exists($path)) {
            $this->error("Folder not found: {$path}");
            return self::FAILURE;
        }

        $files = collect(File::files($path))
            ->filter(fn($f) => strtolower($f->getExtension()) === 'docx')
            ->sortBy(fn($f) => $f->getFilename());

        if ($files->isEmpty()) {
            $this->warn("No .docx files found in: {$path}");
            return self::SUCCESS;
        }

        $this->info("Found {$files->count()} docx file(s). Dry-run: " . ($dryRun ? 'YES' : 'NO'));

        foreach ($files as $file) {
            $this->line("— Importing: " . $file->getFilename());
            $result = $importer->import($file->getPathname(), $dryRun);

            $this->line("   Activity: {$result['course_title']} (slug: {$result['course_slug']})");
            $this->line("   Tasks imported: {$result['lessons_count']}");
        }

        $this->info('Done.');
        return self::SUCCESS;
    }
}
