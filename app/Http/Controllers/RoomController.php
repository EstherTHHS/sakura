<?php

namespace App\Http\Controllers;

use App\Mail\successMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rooms = DB::table('rooms')
            ->where("del_flg", 0)
            ->paginate(3);
        return view('room.listRoom', ["roomInfos" => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return "roomOK";
        return view("room.addRoom");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        DB::table('rooms')
            ->insert([
                'room_no' => $request->roomNo,
                'price' => $request->price,
                'status' => $request->status,
                'available_person' => $request->person
            ]);





        //email send
        $emails = ["thethhsan@gmail.com"];
        Mail::send(
            'mail.welMail',
            [
                'titleMail' => "Add room successfully",
                'mailbody' => "Your CRUD process is clear",
                'by' => 'Sakura Team'
            ],

            function ($message) use ($emails) {
                $message->to($emails)->subject('Is AI coming for our jobs?');
            }

        );
        return redirect("/room");
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
        $room = DB::table('rooms')->find($id);
        return view("room.editRoom", ["roomEditInfos" => $room]);
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
        DB::table('rooms')
            ->where("id", $id)
            ->update([
                'room_no' => $request->roomNo,
                'price' => $request->price,
                'status' => $request->status,
                'available_person' => $request->person
            ]);

        return redirect("/maindash");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('rooms')
            ->where("id", $id)
            ->update([
                'del_flg' => 1

            ]);

        return redirect("/maindash");
    }
}
