<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function entrance()
    {
        $select = DB::select('select * from entrance_fee');
        return view('entrance_details')->with('entrance', $select);

        // return view('cottage_details');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'entrance' => 'required',

            'price' => 'required|numeric',

        ]);

        $insert = DB::insert("INSERT INTO `entrance_fee` ( `type_name`, `fee`) VALUES ( '$request->entrance',  '$request->price');");



        return redirect('entrance_details');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::update("UPDATE `entrance_fee` SET  `type_name` = '$request->type', `fee` = '$request->fee' WHERE `entrance_fee`.`type_id` = $request->type_id;");

        return redirect('entrance_details')->with(['code' => 'successfuly edited']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE FROM entrance_fee WHERE `entrance_fee`.`type_id` = $id");
        return redirect('entrance_details')->with(['code' => 'successfuly deleted']);
    }
}
