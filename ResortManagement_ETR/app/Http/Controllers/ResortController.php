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

    // Monthly Sales 

    public function monthly()
    {
        $query = "SELECT month AS month, year AS year, SUM(total) AS total_sales FROM transaction WHERE year = YEAR(CURRENT_DATE) GROUP BY year, month ORDER BY year, month;";

        $data = DB::select($query);

        return response()->json($data);
    }
}
