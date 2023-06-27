<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{


    public function index()
    {


        $select = DB::select("SELECT year AS year, month AS month, SUM(total) AS monthly_earnings FROM transaction GROUP BY year, month ORDER BY year, month;");


        $monthly = number_format($select[0]->monthly_earnings, 2, '.', '');


        $select = DB::select("SELECT year AS year, SUM(total) AS annual_earnings
FROM transaction
GROUP BY year
ORDER BY year;");

        $yearly = number_format($select[0]->annual_earnings, 2, '.', '');

        $customer =
            DB::select("SELECT SUM(adult) as totalAdult, SUM(kids) as totalKids FROM `transaction` WHERE day = DAY(CURRENT_DATE) AND month = MONTH(CURRENT_DATE) AND year = YEAR(CURRENT_DATE);");

        $totalCust = $customer[0]->totalAdult + $customer[0]->totalKids;

        return view('dashboard')->with('monthy', $monthly)->with('annual', $yearly)->with('total', $totalCust);
    }



    // Monthly Sales 

    public function monthly()
    {
        $query = "SELECT month AS month, year AS year, SUM(total) AS total_sales FROM transaction GROUP BY year, month ORDER BY year, month;";

        $data = DB::select($query);

        return response()->json($data);
    }
}
