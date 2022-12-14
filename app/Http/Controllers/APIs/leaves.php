<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
// use DB;
use Auth;
use App\User;
use DateTime;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\leave;
use Illuminate\Support\Facades\DB ;

class leaves extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt');
    }

    public function addleave(Request $request)
    {
        $rules = [
            'UserId' => ['required'],
            'StartDate' => ['required'],
            'EndDate' => [],
            'Leavetype' => ['required'],
            'Leavedays' => ['required'],
            'Details' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $er = $validator->errors();
            return response()->json($er, 201);
        } else {
            $ValidData = $request->input();
        }
        $leave = leave::create([
            'details' => $ValidData['Details'],
            "end_date" => $ValidData['EndDate'],
            "leave_type" => ($ValidData['Leavetype'] ? $ValidData['Leavetype'] : "No"),
            "leave_day_count" => $ValidData['Leavedays'],
            "requested_by" => $ValidData['UserId'],
            'start_date' => $ValidData['StartDate'],
            "status" => "0"
        ]);
        if ($leave) {
            return response()->json([
                'Message' => "Your Leave request posted",
                'Status'  => "Success"
            ], 200);
        } else {
            return response()->json([
                'Message' => "Your Leave request not submitted",
                'Status'  => "Fail"
            ], 201);
        }
    }
    public function all_leave(Request $request)
    {
        $id= $request->UserId;
        $leaves = leave::where("requested_by", $id)->latest()->get();
        if ($leaves) {
            return response()->json($leaves, 200);
        } else {
            return response()->json([
                'Message' => "no Leaves available",
                'Status'  => "Fail"
            ], 201);
        }
    }
    public function LeavesTypes()
    {
        $leaves = DB::table("leave_types")->get();
        if ($leaves) {
            return response()->json($leaves, 200);
        } else {
            return response()->json([
                'Message' => "no Leaves available",
                'Status'  => "Fail"
            ], 201);
        }
    }
}
