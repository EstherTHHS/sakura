<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all data form patient table
        $patients = DB::table('patients')->paginate(5);
        return view("Patient.list", ["patientinfos" => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Patient.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();
        DB::table('patients')
            ->insert([
                'name' => $request->userName,
                'age' => $request->age,
                'address' => $request->address,
                'phone' => $request->phNo,
                'email' => $request->email
            ]);

        //return to list after insert datas into table 

        return redirect("/patient");
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
        // echo $id;

        //get all data form patient table
        // $patients = DB::table('patients')->where("id", $id)->first();
        $patients = DB::table('patients')->find($id);
        // dd($patients);

        return view("Patient.edit", ["patientinfos" => $patients]);
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
        DB::table('patients')
            ->where("id", $id)
            ->update([
                'name' => $request->userName,
                'age' => $request->age,
                'address' => $request->address,
                'phone' => $request->phNo,
                'email' => $request->email
            ]);

        //return to list after insert datas into table 

        return redirect("/patient");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('patients')->where("id", $id)->delete();
        return redirect("/patient");
    }
}
