<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Api\V1\HttpController as HTTP;
use App\Http\Controllers\Api\V1\CommandsController as Command;
use App\Http\Controllers\Api\V1\JsonController as JSON;

class WiroonController extends Controller
{
    public function wiroonService(Request $payload)
    {
        $lineMsg = $payload['events']['0'];
        $userId = $lineMsg['source']['userId'];
        $text = isset($lineMsg['message']['text']) ? $lineMsg['message']['text'] : 'null';
        $replyToken = $lineMsg['replyToken'];

        if($text[0] == '#') {
            switch ($text) {
                case '#tr' :
                    $this->onTR($replyToken, $text);
                    break;
                case '#vo' :
                    $this->onVO($replyToken, $text);
                    break;
                case '#register' :
                    $this->onRegister($replyToken, $userId);
                    break;
                default :
                    (new HTTP)->replyMessage($replyToken, 'คำสั่งไม่ถูกต้อง...');
            }
        }else{
            (new JSON)->jsonInsert($payload);
        }
        
        // $this->onRegister($userId);
    }

    private function onTR($replyToken)
    {
        // $response = (new HTTP)->findMsg();
        (new HTTP)->replyMessage($replyToken, 'no action');

    }

    private function onVO($replyToken, $text)
    {
        (new HTTP)->replyMessage($replyToken, $text);
    }

    private function onRegister($replyToken, $userId)
    {
        $response = (new HTTP)->getProfile($userId);
        (new Command)->register($response, $replyToken);
    }

    private function anotherText($payload)
    {

    }
}
