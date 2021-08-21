<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Api\V1\HttpController as HTTP;

class CommandsController extends Controller
{
    public function register($payload, $replyToken)
    {
        if(!$this->checkUser($payload['userId'])) {
            Register::create([
                'name' => $payload['displayName'],
                'line_profile' => $payload['pictureUrl'],
                'line_userid' => $payload['userId']
            ]);

            (new HTTP)->replyMessage($replyToken, 'ลงทะเบียนเรียบร้อยแล้ว');
        }else{
            (new HTTP)->replyMessage($replyToken, 'คุณได้ลงทะเบียนไปแล้ว...');
        }
    }

    private function checkUser($userId)
    {
        $user = Register::where(['line_userid' => $userId])->first();
        return $user;
    }
}
