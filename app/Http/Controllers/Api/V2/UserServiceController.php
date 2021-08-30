<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserServiceController extends Controller
{
    public function getUserByStatus($orgid, $status = null)
    {
        if($status == null) {
            $user = User::where('orgid', $orgid)->get();
            if(sizeof($user) > 0) {
                return response()->json(['data' => $user], 200);
            }
        }else{
            $user = User::where('orgid', $orgid)->where('status', $status)->get();
            if(sizeof($user) > 0) {
                return response()->json(['data' => $user], 200);
            }
        }

        return response()->json(['message' => 'user not found'], 404);
    }

    public function getUserBylineUserId($line_userid)
    {
        $user = User::where('line_userid', $line_userid)->first();
        if($user) {
            return response()->json(['data' => $user], 200);
        }
        
        return response()->json(['message' => 'user not found'], 404);
    }

    public function updateUser(Request $request)
    {
        $currentUser = User::where('line_userid', $request->line_userid)->first();
        if($currentUser) {
            $orgid = isset($request->orgid) ? $request->orgid : $currentUser->orgid;
            $name = isset($request->name) ? $request->name : $currentUser->name;
            $status = isset($request->status) ? $request->status : $currentUser->status;

            $set_status = strtoupper($status);
            if($set_status != 'NEW' && $set_status != 'ACTIVE' && $set_status != 'INACTIVE') {
                return response()->json(['message' => 'status not currect'], 400);
            }

            $currentUser->update([
                'orgid' => $orgid,
                'name' => $name,
                'status' => $set_status
            ]);

            return response()->json(['message' => 'user updated'], 200);
        }

        return response()->json(['message' => 'user not found'], 400);
    }
}
