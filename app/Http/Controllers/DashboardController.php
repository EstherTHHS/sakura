<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DashboardController extends Controller
{
    public function index()
    {

        // App::setLocale("jp");

        if (!session()->has("username")) {
            return redirect("/login");
        }

        // $rooms = DB::table('rooms')->limit(4)->get();
        $rooms = DB::table('rooms')
            ->limit(4)
            ->where("del_flg", 0)
            ->get();


        $drugLists = DB::table('drugs')
            ->limit(4)
            ->get();

        $applist = DB::table('appointments')
            ->limit(4)
            ->where("del_flg", 0)
            ->get();

        $msg = DB::table('messages')
            ->limit(4)
            ->where("del_flg", 0)
            ->get();




        return view(
            'dashboard',
            [
                "roomInfo" => $rooms,
                "drugList" => $drugLists,
                "apptInfos" => $applist,
                "msgInfo" => $msg
            ],


        );
    }

    public function locale($code)
    {
        session()->put("locale", $code);
        // return dd($code);
        return back();
    }
}
