<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Api\V1\WiroonController as Wiroon;

class MessageServiceController extends Controller
{
    private $orgid;

    public function getMessage(Request $request)
    {
        $this->orgid = $request->orgid;
        switch ($this->orgid) {
            case 'wiroon':
                (new Wiroon)->wiroonService($request);
                break;
            default:
                return;
        }
    }

    public function getWebhook(Request $request)
    {
        Log::debug($request);
    }
}
