<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PointOfSale extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $select = DB::select("SELECT * FROM `cottage` WHERE `status` = 'Available'");
        $select2 = DB::select("SELECT * FROM `entrance_fee`");
        return view('PointOfSale')->with('cottage', $select)->with('entrance', $select2);
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


        $this->validate($request, [
            'adult' => 'required|numeric',
            'child' => 'numeric',
            'add' => 'numeric',
            'tendered' => 'numeric',



        ]);

        date_default_timezone_set('Asia/Manila');
        $currentDate = Carbon::now();

        $currentDay = $currentDate->day;
        $currentMonth = $currentDate->month;
        $currentYear = $currentDate->year;
        $userId = Auth::id();

        $cottage = $request->cottage;

        $cashTendered = strval($request->tendered);
        $change = strval($request->change);

        $total = doubleval($request->totalvalue);
        $total2 = strval($request->totalvalue);


        $transId =
            mt_rand(100000, 999999);


        DB::insert("INSERT INTO `transaction` (`trans_id`, `adult`, `kids`, `id`, `additional_fee`, `total`, `date`, `day`, `month`, `year`) VALUES ('$transId', '$request->adult', '$request->child', '$userId', '$request->add', '$total', current_timestamp(), '$currentDay', '$currentMonth', ' $currentYear');");


        foreach ($cottage as $cottage_id) {

            DB::insert("INSERT INTO `invoice` (`invoice_id`, `trans_id`, `cottage_id`) VALUES (NULL, '$transId', '$cottage_id')");
            DB::update("UPDATE `cottage` SET `status` = 'Unavailable' WHERE `cottage`.`cottage_id` = $cottage_id;");
        }





        $select = DB::select("SELECT * FROM `cottage` ");


        return view('receipt', [
            'adult' => $request->adult,
            'child' => $request->child,
            'total' => $total2,
            'cash' => $cashTendered,
            'change' => $change,


        ])->with('cottage_id', $cottage)->with('cottage', $select);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
