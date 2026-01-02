<?php

namespace App\Services;

use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Throwable;

class ChatbotService
{
    public function __construct(private Client $http)
    {
    }

    public function generateReply(Conversation $conversation, string $userMessage): string
    {
        $language = $conversation->language ?? 'en';

        [$role, $membershipSummary, $divisionAccess] = $this->resolveUserContext($language);

        $platformContext = $this->buildPlatformContext(
            $membershipSummary,
            $divisionAccess,
            $role
        );

        try {
            $systemPrompt = $this->buildSystemPrompt(
                $platformContext,
                $language,
                $role
            );

            return $this->callOpenAi(
                $systemPrompt,
                $userMessage,
                $language
            );

        } catch (Throwable $e) {

            if ($language === 'fr') {
                return "Il y a eu un problème avec le service d'IA. Veuillez réessayer dans un moment.";
            }

            return "There was a problem connecting to the AI service. Please try again in a moment.";
        }
    }


    protected function resolveUserContext(string $language): array
    {
        $role = 'guest';
        $membershipSummary = $language === 'fr'
            ? "Aucun abonnement actif — accès invité."
            : "No active membership — guest access.";
        $divisionAccess = $language === 'fr'
            ? "Aucune division débloquée."
            : "No divisions unlocked.";

        $user = Auth::user();

        if (!$user) {
            return [$role, $membershipSummary, $divisionAccess];
        }

        if ($user->hasRole('school')) {
            $role = 'school';
        } elseif ($user->hasRole('teacher')) {
            $role = 'teacher';
        } elseif ($user->hasRole('admin')) {
            $role = 'admin';
        } else {
            $role = 'user';
        }

        if ($role === 'school') {
            $school = $user->school ?? null;

            if ($school) {
                $activeMemberships = $school->activeMemberships()->get();

                if ($activeMemberships->isNotEmpty()) {
                    $types = $activeMemberships
                        ->pluck('type')
                        ->unique()
                        ->values()
                        ->all();

                    $membershipSummary = "Active memberships: " . implode(', ', $types) . ".";
                    $divisionAccess = "Unlocked divisions: " . implode(', ', $types) . ".";
                } else {
                    $membershipSummary = "No active memberships found.";
                    $divisionAccess = "No unlocked divisions.";
                }
            } else {
                $membershipSummary = "School role but no linked school record.";
                $divisionAccess = "Division access unknown.";
            }
        }

        elseif ($role === 'teacher') {
            $membershipSummary = "Teacher account linked to a school.";
            $divisionAccess = "Access based on the school’s unlocked divisions.";
        }

        else {
            $membershipSummary = "System account — membership not applicable.";
            $divisionAccess = "Not applicable.";
        }

        return [$role, $membershipSummary, $divisionAccess];
    }


    protected function buildPlatformContext(
        string $membershipSummary,
        string $divisionAccess,
        string $role
    ): string {

        $lines = [];

        $lines[] = "Platform name: My Place In This World.";
        $lines[] = "Mission: restore pride, purpose, and well-being in Black student learning.";
        $lines[] = "Approach: curriculum highlights African excellence before slavery.";
        $lines[] = "Audience: schools and teachers — NOT individual parent subscriptions.";
        $lines[] = "Divisions: Primary, Junior Intermediate (JI), High School.";
        $lines[] = "Learning arc: lessons often begin with video introductions, moving into text-based activities and deeper reflection.";
        $lines[] = "Teacher workflow: teachers explore activities and bring them into their classrooms using their own teaching style.";
        $lines[] = "Gallery: teachers may share student work, but it is not linked to divisions or activity workflows.";
        $lines[] = "Membership model: memberships unlock SCHOOL division access.";
        $lines[] = "Payments: no payment provider or billing system implemented.";
        $lines[] = "Student subscription plans: not implemented.";
        $lines[] = "Assignment systems, class management, progress tracking: not implemented.";
        $lines[] = "User role: {$role}";
        $lines[] = "Membership summary: {$membershipSummary}";
        $lines[] = "Division access: {$divisionAccess}";

        return implode("\n", $lines);
    }


    protected function buildSystemPrompt(
        string $platformContext,
        string $language,
        string $role
    ): string {

        $promptEN = <<<TXT
You are the AI assistant for My Place In This World.

Voice + tone:
- Warm, uplifting, supportive.
- Speak to teachers and school leaders with respect and encouragement.
- Avoid formal greetings or repetitive openings.
- Do not begin responses with phrases like “Welcome!” or “Thank you for your question.”
- Respond conversationally and directly.
- Focus on belonging, pride, wellness, and purpose.
- Honor the cultural weight of this work.

Rules:
- Use ONLY the platform context below.
- NEVER invent features that do not exist.
- Be honest about limitations.
- Keep answers clear, human, and grounded in the curriculum.
- Tailor responses to the user role when possible.
- Avoid technical jargon.
- Do not reference internal database structures.
- Do not assume membership unlock unless logged in as school.
- Be careful not to describe dashboards or workflows that don’t exist.

Platform context:
{$platformContext}
TXT;

        $promptFR = <<<TXT
Vous êtes l'assistant IA pour « My Place In This World ».

Voix + ton :
- Chaleureux, encourageant, positif.
- Répondre directement, sans formules répétitives de salutation.
- Ne pas commencer par « Bienvenue » ou « Merci pour votre question ».
- Parler aux enseignants et aux responsables scolaires avec respect et soutien.
- Mettre l’accent sur l’identité, la fierté, le bien-être et l’équité.

Règles :
- Utiliser UNIQUEMENT le contexte ci-dessous.
- Ne JAMAIS inventer de fonctionnalités inexistantes.
- Être honnête sur les limites.
- Rester clair, humain et ancré dans le programme.
- Adapter les réponses au rôle de l’utilisateur lorsque possible.
- Éviter le jargon technique.
- Ne pas supposer l’accès à une division sans abonnement actif et identifié.

Contexte de la plateforme :
{$platformContext}
TXT;

        return $language === 'fr' ? $promptFR : $promptEN;
    }


    protected function callOpenAi(
        string $systemPrompt,
        string $userMessage,
        string $language
    ): string {

        $apiKey = config('services.openai.key', env('OPENAI_API_KEY'));
        $model  = config('services.openai.model', 'gpt-4.1-mini');

        if (!$apiKey) {
            return $language === 'fr'
                ? "La clé API OpenAI est manquante."
                : "The OpenAI API key is missing.";
        }

        $response = $this->http->post(
            'https://api.openai.com/v1/chat/completions',
            [
                'headers' => [
                    'Authorization' => "Bearer {$apiKey}",
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'model' => $model,
                    'messages' => [
                        ['role' => 'system', 'content' => $systemPrompt],
                        ['role' => 'user',   'content' => $userMessage],
                    ],
                ],
                'timeout' => 20,
            ]
        );

        $json = json_decode((string) $response->getBody(), true);

        return $json['choices'][0]['message']['content']
            ?? ($language === 'fr'
                ? "Je n'ai pas pu générer de réponse."
                : "I wasn’t able to generate a response.");
    }
}
