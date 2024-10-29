<?php

namespace App\Services;

use App\Models\Response;
use App\Models\Recommendation;
use App\Services\OpenAIService;

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

            $questionText = $storedResponse->question->name;
            $answerText = $storedResponse->answer->name;
            $prompt = "Based on the answer: '$answerText' to the question: '$questionText', generate a mental health recommendation.";

            $recommendationText = $this->openAIService->generateResponse($prompt);

            Recommendation::create([
                'user_id' => $user->id,
                'response_id' => $storedResponse->id,
                'recommendation' => $recommendationText,
            ]);

            $recommendations[] = [
                'question' => $questionText,
                'answer' => $answerText,
                'recommendation' => $recommendationText,
            ];
        }

        return $recommendations;
    }
}
