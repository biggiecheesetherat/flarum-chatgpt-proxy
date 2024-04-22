<?php

namespace Msc\ChatGPT;

use Flarum\Discussion\Discussion;
use Flarum\Post\CommentPost;
use Flarum\Post\Post;
use Flarum\Settings\SettingsRepositoryInterface;
use Flarum\User\User;
use Illuminate\Support\Arr;
use OpenAI;
use OpenAI\Client;

function askGPT($prompt) {
    // Define the base URL
    $api_url = 'https://reverse.mubi.tech/v1';

    // Construct the request body
    $data = json_encode([
        'model' => 'gpt-4',
        'messages' => [
            [
                'role' => 'user',
                'content' => $prompt
            ]
        ]
    ]);

    // Set the cURL options
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $api_url . '/chat/completions',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Origin: https://gptcall.net/',
            'Referer: https://gptcall.net/'
        ],
    ]);

    // Execute the request
    $response = curl_exec($curl);

    // Check for errors
    if (curl_errno($curl)) {
        return 'Error:' . curl_error($curl);
    }

    // Close cURL session
    curl_close($curl);

    // Decode the JSON response
    $responseData = json_decode($response, true);

    // Check if the response is valid
    if (!$responseData) {
        return 'Error: Invalid response';
    }

    // Extract and return the bot's response
    return $responseData['choices'][0]['message']['content'];
}

class Agent
{
    protected int $maxTokens;
    protected string $model;

    public function __construct(
        public readonly User $user,
        protected ?Client    $client = null,
        string               $model = null,
        int                  $maxTokens = null
    )
    {
        $this->model = $model ?? 'gpt-3.5-turbo-instruct';
        $this->maxTokens = $maxTokens ?? 100;
    }

//    public function operational(): bool
//    {
//        return $this->client !== null;
//    }
//
//    public
//    function is(User $someone): bool
//    {
//        return $this->user->is($someone);
//    }

    public function repliesTo(Discussion $discussion): void
    {
        $content = $discussion->firstPost->content;
        $respond = askGPT($content)
        
        if (empty($respond)) return;

        $userPrompt = $this->user->id;

//        if (Str::startsWith($respond, 'FLAG: ')) {
//            $flag = new Flag(
//                Str::after($respond, 'FLAG: '),
//                $discussion
//            );
//
//            $flag();
//        } else {
//        $reply = new Reply(
//            reply: $respond,
//            shouldMention: $this->canMention,
//            inReplyTo: $discussion
//        );

        CommentPost::reply(
            discussionId: $discussion->id,
            content: $respond,
            userId: $userPrompt,
            ipAddress: '127.0.0.1'
        )->save();
//        }
    }

}
