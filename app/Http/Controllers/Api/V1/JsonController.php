<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Api\V1\HttpController as HTTP;
use Illuminate\Support\Facades\Storage;

class JsonController extends Controller
{
    public function jsonInsert($payload)
    {
        $lineMsg = $payload['events']['0'];
        $type = $lineMsg['message']['type'];
        $userId = $lineMsg['source']['userId'];
        
        if($type == 'text') {
            $fileNane = date('ymd').'_'.date('His').'_'.date('U').'.json';
            $contentInfo = [
                'line_userid' => $userId,
                'body' => $lineMsg['message']['text'],
                'image' => '',
                'status' => 'DR',
                'timestamp' => date('ymdHisU')
            ];

            Storage::disk('local')->put($payload['orgid'].'/'.$fileNane, json_encode($contentInfo));
        }

        if($type == 'image') {
            $image = (new HTTP)->getImage($lineMsg['message']['id']);
            // Log::debug($image);
        }
        // Log::debug($payload);
        
    }
}
