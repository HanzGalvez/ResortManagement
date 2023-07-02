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

        if (count($select) > 0) {
            $monthly = number_format($select[0]->monthly_earnings, 2, '.', '');
        } else {
            $monthly = 0;
        }


        $select = DB::select("SELECT year AS year, SUM(total) AS annual_earnings
FROM transaction
GROUP BY year
ORDER BY year;");

        $userData1 = auth()->user();

        if (count($select) > 0) {
            $yearly = number_format($select[0]->annual_earnings, 2, '.', '');
        } else {
            $yearly = 0;
        }



        $year_sales =
            DB::select("SELECT year, SUM(total) AS yearly_sales FROM transaction GROUP BY year ORDER BY year;");



        return view('staff_dashboard', ['userData' => $userData1, 'id' => 1])->with('monthy', $monthly)->with('annual', $yearly)->with('yearly_sales', $year_sales);
    }



    public function index()
    {
        $select = DB::select("SELECT * FROM `users` WHERE role = 'staff' OR role ='employee'");
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
}
