<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class appointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applist = DB::table('appointments')
            ->where("del_flg", 0)
            ->paginate(3);
        return view("Appointmet.listApp", ["apptInfos" => $applist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Appointmet.addApp");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('appointments')
            ->insert([
                'doctor' => $request->doc,
                'room_no' => $request->roNo,
                'apt_date' => $request->date,
                'apt_time' => $request->time
            ]);

        return redirect("/appt");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = DB::table('appointments')->find($id);
        return view("Appointmet.editApp", ["bookingInfo" => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('appointments')
            ->where("id", $id)
            ->update([
                'doctor' => $request->doc,
                'room_no' => $request->roNo,
                'apt_date' => $request->date,
                'apt_time' => $request->time
            ]);

        return redirect("/appt");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('appointments')
            ->where("id", $id)
            ->update([
                'del_flg' => 1

            ]);

        return redirect("/appt");
    }
}
