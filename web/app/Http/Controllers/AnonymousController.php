<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnonymousController extends Controller
{
    //
    public function tt(){
        return view('check.CheckMain');
    }
    public function workin(Request $request){

        DB::table('status_work')
            ->insert(
                [
                    'ID_member' => $request->input('idd'),
                    'Work_date' => $request->input('dates'),
                    'WorkTime_checkin' => $request->input('times'),
                    'Work_status' => $request->input('Work_status')
                ]
            );

        $Work_dates = $request->input('dates');
        $ids = $request->input('idd');
        $users = DB::table('status_work')
            ->select('ID_member','WorkTime_checkin','WorkTime_checkout','OT_Time_CheckIn','OT_Time_CheckOut','Work_date')
            ->where('ID_member', '=', $ids)
            ->orWhere('Work_date', '=', $Work_dates)
            ->get();

        foreach ($users as $users){
            return response()->json([
                'WorkTime_checkin'=>$users->WorkTime_checkin,
                'WorkTime_checkout'=>$users->WorkTime_checkout,
                'OT_Time_CheckIn'=>$users->OT_Time_CheckIn,
                'OT_Time_CheckOut'=>$users->OT_Time_CheckOut,
            ]);


        }
    }

    public function workout(Request $request){
        $idd = $request->input('idd');
        $date = $request->input('dates');
        $timee = $request->input('times');
        DB::select(DB::raw("UPDATE status_work SET WorkTime_checkout = '$timee' WHERE Work_date = '$date' AND ID_member = '$idd'"));
    }

    //
    public function OTin(Request $request){
        $idd = $request->input('idd');
        $date = $request->input('dates');
        $timee = $request->input('times');
        DB::select(DB::raw("UPDATE status_work SET OT_Time_CheckIn = '$timee' WHERE Work_date = '$date' AND ID_member = '$idd'"));
    }


    public function OTOut(Request $request){
        $idd = $request->input('idd');
        $date = $request->input('dates');
        $timee = $request->input('times');
        $otin = DB::select(DB::raw("SELECT OT_Time_CheckIn FROM status_work WHERE Work_date = '$date' AND ID_member = '$idd'"));
        foreach ($otin as $otins){
            $otcheckin = $otins->OT_Time_CheckIn;
            $hours = (strtotime($timee) - strtotime($otcheckin))/  ( 60 * 60 );
            DB::select(DB::raw("UPDATE status_work SET OT_Time_CheckOut = '$timee' , OT = '$hours' WHERE Work_date = '$date' AND ID_member = '$idd'"));

        }
    }

    public function checkLogin(Request $request){
        $idlogin = $request->input('ID_member');
        $users = DB::table('profile')
            ->select('ID_member')
            ->where('ID_member', '=', $idlogin)
            ->get();
        foreach ($users as $userss){
            $usersss = $userss->ID_member;
//            return response()->json($request);
        }

        if(empty($usersss)){
            $status = "";
        }
        else{
            $status = $usersss;
        }
//        $status = "asd";
        return response()->json(['aa'=>$status]);

    }

}
