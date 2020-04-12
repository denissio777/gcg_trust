<?php
/**
 * Created by PhpStorm.
 * User: prog
 * Date: 12.10.17
 * Time: 14:42
 */

namespace app\models;


use Twilio\Rest\Client;

class Twilio
{
    public static function sms($phone, $text){
        $sid = 'AC410577709fa919ad197437b41d7d1499';
        $token = '27860c11748781d29c78eff997cae43b';

        $client = new Client($sid, $token);

        $client->messages->create(
            $phone, [
                'from' => '+12528883012',
                'body' => $text
            ]
        );
    }
}