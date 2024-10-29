<?php

namespace App\Services;

use GuzzleHttp\Client;

class OpenAIService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.openai.key'),
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    public function generateResponse($prompt)
    {
        $response = $this->client->post('chat/completions', [
            'json' => [
                'model' => 'gpt-3.5-turbo',  
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ]
                ],
                'max_tokens' => 100,           
                'temperature' => 0.7,          
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        return $data['choices'][0]['message']['content'] ?? '';
    }
}
