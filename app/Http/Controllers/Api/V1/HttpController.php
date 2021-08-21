<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class HttpController extends Controller
{
    public function getProfile($userId)
    {
        $profile = \LINEBot::getProfile($userId);
        return $profile->getJSONDecodedBody();
    }

    public function replyMessage($replyToken, $text)
    {
        $response = \LINEBot::replyText($replyToken, $text);
        if ($response->isSucceeded()) {
            return;
        }
    }

    public function findMsg()
    {
        return Http::get('https://orgid.orderpang.com/lineoa/tr?find=msg');
    }

    public function getImage($messageId)
    {
        $response = \LINEBot::getMessageContent($messageId);
        if ($response->isSucceeded()) {
            $tempfile = tmpfile();
            return fwrite($tempfile, $response->getRawBody());
        }
    }
}
