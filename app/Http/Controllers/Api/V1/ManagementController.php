<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\Api\V1\LineNotifyController as LINE;

// Models
use App\Models\User;
use App\Models\Order;

class ManagementController extends Controller
{
    public function register($orgid, $userId)
    {
        $user = $this->getUser($userId);
        if(!$user) {
            $profile = $this->getProfile($userId);
            User::create([
                'orgid' => $orgid,
                'name' => $profile['displayName'],
                'line_name' => $profile['displayName'],
                'line_profile' => $profile['pictureUrl'],
                'line_userid' => $userId
            ]);

            return 'ได้รับข้อมูลแล้ว กรุณาแจ้งผู้ดูแลระบบเพื่อดำเนินการต่อ';
        }else{
            if($user->status == 'INACTIVE') {
                User::where('line_userid', $userId)->update(['status' => 'NEW']);
                return 'ได้รับข้อมูลแล้ว กรุณาแจ้งผู้ดูแลระบบเพื่อดำเนินการต่อ';
            }

            return 'ไม่สามารถบันทึกข้อมูลได้';
        }
    }


    public function saveOrder($userId, $body)
    {
        $user = $this->getUser($userId);
        if($user) {
            if($this->checkPaymentMethod($body) == 'NULL') return 'รูปแบบการชำระเงินไม่ถูกต้อง กรุราตรวจสอบ!';

            $subcode = date('ymd-His');
            $submillisec = substr(date('U'), 0,3);
            $code = $subcode.'-'.$submillisec;
            $order = Order::create([
                        'user_id' => $user->id,
                        'body' => $body,
                        'payment_method' => $this->checkPaymentMethod($body),
                        'code' => $code
                    ]);

            if($order) {
                return 'บันทึกแล้ว คำสั่งซื้อหมายเลข '.$code;
            }
            return 'ไม่สามารถบันทึกข้อมูลได้ กรุณาติดต่อผู้ดูแลระบบ';
        }else{
            return 'ผู้ใช้งานยังไม่ถูกบันทึกเข้าสู่ระบบ กรุณาติดต่อผู้ดูแลระบบ';
        }
    }


    public function trackingOrder($mobileno, $userId)
    {
        $user = $this->getUser($userId);
        if($user) {
            $url = sprintf('https://%s.orderpang.com/service-customers/find?search=%s', $user->orgid, $mobileno);
            $response = Http::get($url);
            $res = json_decode($response->getBody()->getContents(), true);
            if(isset($res)) {
                return $res;
            }
            return 'ไม่มีข้อมูล';
        }
        
        return 'ผู้ใช้งานยังไม่ถูกบันทึกเข้าสู่ระบบ กรุณาติดต่อผู้ดูแลระบบ';
    }

    public function voiceOrder($code)
    {
        $order = Order::where('code', $code)->first();
        if($order) {
            if($order->status == 'DR') {
                $order->update(['status' => 'VO']);
                $this->sendNotify('รายการสั่งซื้อ รหัส : '.$code.' ถูกยกเลิก', env('LINE_NOTIFY_TOKEN_TEST'));
                return 'ยกเลิกรายการสั่งซื้อ รหัส : '.$code.' เรียบร้อยแล้ว';
            } else if($order->status == 'CO') {
                return 'รายการสั่งซื้อ รหัส : '.$code.' ถูกยืนยันไปแล้ว ไม่สามารถยกเลิกได้';
            } else if($order->status == 'VO') {
                return 'รายการสั่งซื้อ รหัส : '.$code.' ได้ถูกยกเลิกไปแล้ว';
            } else {
                return 'เกิดข้อผิดพลาดเกี่ยวกับการยกเลิกรายการสั่งซื้อ รหัส : '.$code.' กรุณาติดต่อผู้ดูแลระบบ';
            }
        }

        return 'ไม่มีรายการรหัส : '.$code.' ที่คุณค้นหา...กรุณาตรวจสอบ';
        
    }


    private function getUser($userId)
    {
        return User::where('line_userid', $userId)->first();
    }


    private function getProfile($userId)
    {
        $profile = \LINEBot::getProfile($userId);
        return $profile->getJSONDecodedBody();
    }


    private function checkPaymentMethod($body)
    {
        $payment = explode(' ', $body)[1];
        if($payment == 'โอน') {
            return 'TRANSFER';
        }else if($payment == 'ปลายทาง') {
            return 'COD';
        }else if($payment == 'บัตรเครดิต') {
            return 'CREDIT';
        }else{
            return 'NULL';
        }
    }

    private function sendNotify($message, $token)
    {
        (new LINE)->sendMessage($message, $token);
    }
}
