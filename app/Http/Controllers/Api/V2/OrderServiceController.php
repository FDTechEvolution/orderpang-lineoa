<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\User;

class OrderServiceController extends Controller
{
    public function getOrder($orgid, $status = null)
    {
        $users = User::where('orgid', $orgid)->get();
        if(sizeof($users) > 0) {
            $orders = [];
            if($status != null) {
                foreach($users as $user) {
                    $order = Order::with('user:id,name')->where('user_id', $user->id)->where('status', $status)->get();
                    if(sizeof($order) > 0) {
                        foreach($order as $item) {
                            array_push($orders, $item);
                        }
                    }else{
                        return response()->json(['message' => 'order not found'], 404);
                    }
                }
                
                return response()->json(['data' => $orders], 200);
            }else{
                foreach($users as $user) {
                    $order = Order::with('user:id,name')->where('user_id', $user->id)->get();
                    if(sizeof($order) > 0) {
                        foreach($order as $item) {
                            array_push($orders, $item);
                        }
                    }else{
                        return response()->json(['message' => 'order not found'], 404);
                    }
                }
                
                return response()->json(['data' => $orders], 200);
            }
        }

        return response()->json(['message' => 'error'], 404);
    }

    // public function getOrderByOrgid($orgid)
    // {
    //     // $order = Order::with(['user' => function ($query) {
    //     //     $query->where('orgid', $orgid);
    //     // }])->get();

    //     $user = User::where('orgid', $orgid)->first();
    //     if($user) {
    //         $order = Order::where('user_id', $user->id)->get();
    //         if(sizeof($order) > 0) {
    //             return response()->json(['data' => $order], 200);
    //         }

    //         return response()->json(['message' => 'order not found'], 400);
    //     }

    //     return response()->json(['message' => 'orgid not found'], 400);
    // }

    public function updateOrder(Request $request)
    {
        $currentOrder = Order::find($request->order_id);
        if($currentOrder) {
            $body = isset($request->body) ? $request->body : $currentOrder->body;
            $status = isset($request->status) ? $request->status : $currentOrder->status;

            if($this->checkPaymentMethod($body) == 'NULL') {
                return response()->json(['message' => 'payment method not currect'], 400);
            }

            $set_status = strtoupper($status);
            if($set_status != 'DR' && $set_status != 'CO' && $set_status != 'VO') {
                return response()->json(['message' => 'status not currect'], 400);
            }
            
            $currentOrder->update([
                'body' => $body,
                'payment_method' => $this->checkPaymentMethod($body),
                'status' => $set_status
            ]);

            return response()->json(['message' => 'order updated'], 200);
        }

        return response()->json(['message' => 'order not found'], 400);
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
}
