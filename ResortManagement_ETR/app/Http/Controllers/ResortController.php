<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResortController extends Controller
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

    public function profit()
    {


        $thisday = DB::select("SELECT SUM(total) AS total_sales FROM transaction WHERE DATE(date) = CURRENT_DATE;");
        $day = $thisday[0]->total_sales;

        $thismonth = DB::select("SELECT SUM(total) AS total_sales
        
FROM transaction
WHERE MONTH(date) = MONTH(CURRENT_DATE())
  AND YEAR(date) = YEAR(CURRENT_DATE());");
        $month = $thismonth[0]->total_sales;


        return view('profit', ['daily' => $day, 'monthly' => $month]);
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



    // Monthly Sales 

    public function monthly()
    {
        $query = "SELECT month AS month, year AS year, SUM(total) AS total_sales FROM transaction WHERE year = YEAR(CURRENT_DATE) GROUP BY year, month ORDER BY year, month;";

        $data = DB::select($query);

        return response()->json($data);
    }
}
