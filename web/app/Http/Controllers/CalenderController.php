<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalenderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function calender(Request $request)
    {

        if($request->ajax())
        {
//            dd($request->Calender);
            $output="";
            $Calenders = DB::table('activity')
                ->where('Date',$request->Calender)
                ->get();
            if($Calenders)
            {
                foreach ($Calenders as $key => $calender) {
                    $output = $calender->Activity_name;
                }

                return Response($output);
            }

        }
    }
}
