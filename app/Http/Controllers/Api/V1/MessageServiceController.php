<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Api\V1\ManagementController as MANAGEMENT;

class MessageServiceController extends Controller
{
    private $userId;
    private $text;
    private $replyToken;

    public function getMessage(Request $request)
    {
        $lineMsg = $request['events']['0'];
        $this->userId = $lineMsg['source']['userId'];
        $this->text = isset($lineMsg['message']['text']) ? $lineMsg['message']['text'] : 'null';
        $this->replyToken = $lineMsg['replyToken'];

        $this->keyFilter();
    }

    private function keyFilter()
    {
        if($this->text[0] == '#') {
            switch (true) {
                case strpos($this->text, 'tr') != false :
                    if(strpos($this->text, '-') != false) {
                        $isTR = explode('-', $this->text);
                        if($isTR[0] == '#tr') {
                            if(strlen($isTR[1]) == 10) {
                                $trackingOrder = (new MANAGEMENT)->trackingOrder($isTR[1], $this->userId);
                                $this->replyMessage($trackingOrder);
                            }else{
                                $this->replyMessage('หมายเลขโทรศัพท์ไม่ครบ...');
                            }
                        }
                    }
                    $this->replyMessage('คำสั่งไม่ถูกต้อง...');
                    break;
                case strpos($this->text, 'vo') != false :
                    if(strpos($this->text, '-') != false) {
                        $isVO = explode('-', $this->text);
                        if($isVO[0] == '#vo' && sizeof($isVO) == 4) {
                            $code = $isVO[1].'-'.$isVO[2].'-'.$isVO[3];
                            $voiceOrder = (new MANAGEMENT)->voiceOrder($code);
                            $this->replyMessage($voiceOrder);
                        }
                    }
                    $this->replyMessage('คำสั่งไม่ถูกต้อง...');
                    break;
                case strpos($this->text, 'register') != false :
                    if(strpos($this->text, '-') != false) {
                        $isRegister = explode('-', $this->text);
                        if($isRegister[0] == '#register') {
                            $register = (new MANAGEMENT)->register($isRegister[1], $this->userId);
                            $this->replyMessage($register);
                        }
                    }
                    $this->replyMessage('คำสั่งไม่ถูกต้อง...');
                    break;
                default :
                    $this->replyMessage('คำสั่งไม่ถูกต้อง...');
                    break;
            }
        }else{
            $saveOrder = (new MANAGEMENT)->saveOrder($this->userId, $this->text);
            $this->replyMessage($saveOrder);
        }
    }

    private function replyMessage($text)
    {
        $response = \LINEBot::replyText($this->replyToken, $text);
        if ($response->isSucceeded()) {
            return;
        }
    }

    
}
