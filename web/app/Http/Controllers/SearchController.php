<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    public function index()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $profiles = DB::table('profile')
                ->where('Firstname','LIKE','%'.$request->search."%")
                ->orWhere('Lastname','LIKE','%'.$request->search."%")
                ->orWhere('Email','LIKE','%'.$request->search."%")
                ->get();

            if($profiles)
            {
                foreach ($profiles as $key => $profile) {
                    $output.= '<tr onclick="getdata()">' . '<td id="ID_member">'.$profile->ID_member.'</td>'.
                        '<td id="Firstname">'.$profile->Firstname.'</td>'.
                        '<td id="Lastname">'.$profile->Lastname.'</td>'.
                        '<td id="Email">'.$profile->Email.'</td>'.
                        '</tr>';
                }
                return Response($output);
            }
        }
    }
}