<?php

namespace App\Services;

use App\Models\Response;

class ResponseService
{
    public function storeResponses($user, $responses)
    {
        foreach ($responses as $response) {
            Response::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'question_id' => $response['question_id'],
                ],
                [
                    'answer_id' => $response['answer_id'],
                ]
            );
        }
    }
}