<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class staffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function dashboard()
    {

        $select = DB::select("SELECT year AS year, month AS month, SUM(total) AS monthly_earnings FROM transaction GROUP BY year, month ORDER BY year, month;");


        $monthly = number_format($select[0]->monthly_earnings, 2, '.', '');


        $select = DB::select("SELECT year AS year, SUM(total) AS annual_earnings
FROM transaction
GROUP BY year
ORDER BY year;");

        $yearly = number_format($select[0]->annual_earnings, 2, '.', '');
        return view('staff_dashboard')->with('monthy', $monthly)->with('annual', $yearly);
    }



    public function index()
    {
        $select = DB::select("SELECT * FROM `users` WHERE role = 'staff' OR role ='cashier'");
        return view('staff')->with('users', $select);
    }

    public function entrance()
    {
        $select = DB::select("SELECT * FROM `entrance_fee`");
        return view('staff_entrance')->with('entrance', $select);
    }


    public function cottage()
    {
        $select = DB::select("SELECT * FROM `cottage` ORDER BY (CASE WHEN status = 'Available' THEN 0 ELSE 1 END), status
");
        return view('staff_cottage')->with('cottages', $select);
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
        //
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
