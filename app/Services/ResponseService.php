<?php

namespace App\Services;

use App\Models\Response;
use App\Models\Recommendation;
use App\Models\Summary;
use App\Services\OpenAIService;
use Illuminate\Support\Facades\Session;

class ResponseService
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function storeResponses($user, $responses)
    {
        $recommendations = [];
        $recommendationTexts = '';

        foreach ($responses as $response) {
            // Store or update the response
            $storedResponse = Response::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'question_id' => $response['question_id'],
                ],
                [
                    'answer_id' => $response['answer_id'],
                ]
            );

            // Generate individual recommendation
            $questionText = $storedResponse->question->name;
            $answerText = $storedResponse->answer->name;
            $prompt = "Based on the answer: '$answerText' to the question: '$questionText', generate a mental health recommendation.";

            $recommendationText = $this->openAIService->generateResponse($prompt);

            // Store each recommendation in the database
            Recommendation::create([
                'user_id' => $user->id,
                'response_id' => $storedResponse->id,
                'recommendation' => $recommendationText,
            ]);

            // Collect recommendation texts for summary generation
            $recommendationTexts .= "Question: $questionText, Answer: $answerText, Recommendation: $recommendationText.\n";
            
            $recommendations[] = [
                'question' => $questionText,
                'answer' => $answerText,
                'recommendation' => $recommendationText,
            ];
        }

        // Generate a concise summary using OpenAI
        $summaryPrompt = "Summarize the following recommendations in a cohesive narrative without using numbers or a list format. Make it a concise, continuous summary that captures the essence of all recommendations:\n" . $recommendationTexts;
        $conciseSummary = $this->openAIService->generateResponse($summaryPrompt);

        // Store the summary in the summaries table
        Summary::updateOrCreate(
            ['user_id' => $user->id],
            ['summary' => $conciseSummary]
        );

        return $recommendations;
    }
}
