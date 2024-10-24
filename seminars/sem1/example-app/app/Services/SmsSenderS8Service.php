<?php

namespace App\Services;

use Twilio\Rest\Client as TwilioClient;

class SmsSenderS8Service implements SmsSenderS8Interface
{

    protected $client;

    public function __construct($sid, $token)
    {
        $this->client = new TwilioClient($sid, $token);
    }

    public function send($message)
    {
        $this->client->messages->create(
            '7123456789', // Replace with your Twilio phone number - TO
            [
                'from' => '7987654321', // Replace with your Twilio phone number - FROM
                'body' => $message,
            ]
        );
    }
}
