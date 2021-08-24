<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Org;

class OrgController extends Controller
{
    public function index()
    {
        $org = Org::where('status', 'ACTIVE')->orderBy('created_at', 'desc')->get();
        return view('orgs', ['orgs' => $org]);
    }

    public function create(Request $request)
    {
        $org = Org::create([
            'orgid' => $request->orgid,
            'name' => $request->name,
            'line_notify_token' => $request->line_notify_token,
            'status' => 'ACTIVE'
        ]);

        if($org) return redirect()->back()->with('success', 'เพิ่ม Org เรียบร้อยแล้ว');

        return redirect()->back()->with('error', 'เกิดข้อผิดพลาด');
    }

    public function update(Request $request)
    {
        $org = Org::where('id', $request->id)
                ->update([
                    'name' => $request->e_name,
                    'line_notify_token' => $request->e_line_notify_token
                ]);

        if($org) return redirect()->back()->with('success', 'แก้ไข Org เรียบร้อยแล้ว');

        return redirect()->back()->with('error', 'เกิดข้อผิดพลาด');
    }

    public function delete(Request $request)
    {
        $org = Org::where('id', $request->id)
                ->update([
                    'status' => 'INACTIVE'
                ]);

        if($org) return redirect()->back()->with('success', 'ลบ Org เรียบร้อยแล้ว');

        return redirect()->back()->with('error', 'เกิดข้อผิดพลาด');
    }
}
