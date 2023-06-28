<?php

namespace App\Http\Controllers;

use App\Models\cottage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CottageController extends Controller
{


    public function cottages()
    {
        $select = DB::select('select * from cottage');
        return view('cottage_details')->with('cottages', $select);

        // return view('cottage_details');
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
            'cottage' => 'required',

            'capacity' => 'required|numeric',

            'price' => 'required|numeric',

        ]);

        $insert = DB::insert("INSERT INTO `cottage` (`cottage_id`, `cottage_name`, `capacity`, `price`, `status`, `created_at`, `updated_at`) VALUES (NULL, '$request->cottage', '$request->capacity', '$request->price', 'Available', current_timestamp(), current_timestamp());");



        return redirect('cottage_details');
    }


    public function edit($id)
    {
        $user = cottage::findOrFail($id);
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

        DB::update("UPDATE `cottage` SET `cottage_name` = '$request->cottage', `capacity` = '$request->capacity', `price` = '$request->price', `status` = 'Available' WHERE `cottage`.`cottage_id` = '$request->cottage_id';");

        session()->flash('success', 'Record updated successfully.');
        return redirect('cottage_details')->with(['code' => 'successfuly edited']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE FROM cottage WHERE `cottage`.`cottage_id` = $id");
        session()->flash('deleted', 'Record deleted successfully.');

        return redirect('cottage_details')->with(['code' => 'successfuly deleted']);
    }

    public function reset()
    {
        DB::update("UPDATE cottage SET status = 'Available';");

        return redirect('cottage_details')->with(['code' => 'successfuly reset']);
    }
}
