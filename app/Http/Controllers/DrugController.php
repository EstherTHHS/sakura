<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //with pagination
        $drugLists = DB::table('drugs')
            ->paginate(3);
        return view('Drug.drugList', ["drugList" => $drugLists]);
        //get all data 
        // $drugLists = DB::table('drugs')
        //     ->get();
        // return view('Drug.drugList', ["drugList" => $drugLists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Drug.drugAdd");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('drugs')
            ->insert([
                'drugName' => $request->drugname,
                'containPerTab' => $request->contain,
                'stock' => $request->stock,
                'price' => $request->price
            ]);
        return redirect("/drug");
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
        $drug = DB::table('drugs')->find($id);
        return view("Drug.drugEdit", ["drugItem" => $drug]);
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
        DB::table('drugs')
            ->where("id", $id)
            ->update([
                'drugName' => $request->drugname,
                'containPerTab' => $request->contain,
                'stock' => $request->stock,
                'price' => $request->price
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
        DB::table('drugs')
            ->where("id", $id)
            ->delete();
        return redirect("/maindash");
    }
}
