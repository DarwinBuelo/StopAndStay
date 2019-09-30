<?php

require_once "vendor/autoload.php";

class SMS
{
    public static function send($from = null, $text = null, $to = null)
    {
        try {
            $basic  = new \Nexmo\Client\Credentials\Basic('0fe80f41', 'hbDJBMFJUOmlwIj0');
            $client = new \Nexmo\Client($basic);
            $message = $client->message()->send([
                'to' => $to,
                'from' => $from,
                'text' => $text
            ]);
        } catch (Exception $error) {
            echo 'Invalid Contact Number Format';
        }
    }
}
//EOF