<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userData1 = auth()->user();
        $id = $userData1->id;



        $currentDay = date('j');



        $currentDay = date('j');


        $select = DB::select("SELECT COUNT(DISTINCT DATE(date)) AS present_days FROM attendance WHERE MONTH(date) = MONTH(CURRENT_DATE) AND YEAR(date) = YEAR(CURRENT_DATE) AND id = $id;");
        $present = $select[0]->present_days;
        $daysInMonth = date('t');

        $absent = $currentDay - $present;

        $attendance_info = DB::select("SELECT * FROM `attendance` WHERE id = $id");


        return view('employee_dashboard', [
            'userData' => $userData1,
            'present' => $present,
            'numOfmonth' => $daysInMonth,
            'absent' => $absent,
            'attendance' => $attendance_info,
        ]);
    }

    public function attendance()
    {

        $userData1 = auth()->user();

        $id = $userData1->id;

        $select = DB::select("SELECT * FROM `attendance` WHERE DATE(`date`) = CURRENT_DATE() AND id = $id;");

        return view('emp_attendance')->with('time_in', $select);
    }

    public function logs()
    {

        $userData1 = auth()->user();

        $id = $userData1->id;

        $select = DB::select("SELECT * FROM `attendance` WHERE id = $id");

        return view('emp_logs')->with('attendance', $select);
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

        $userData1 = auth()->user();

        $id = $userData1->id;


        $validate = DB::select("SELECT * FROM `attendance` WHERE DATE(`date`) = CURRENT_DATE() AND id = $id;");

        $rowCount = count($validate);

        if ($rowCount > 0) {
        } else {
            $insert = DB::insert("INSERT INTO `attendance` (`attendance_id`, `id`, `time_in`, `time_out`, `date`) VALUES (NULL, '$id',  current_time(), NULL, current_timestamp())");
        }


        $select = DB::select("SELECT * FROM `attendance` WHERE id = $id");

        return redirect('emp_attendance')->with('attendance', $select);
    }



    public function timeout(Request $request)
    {

        $userData1 = auth()->user();

        $id = $userData1->id;


        $validate = DB::select("SELECT * FROM `attendance` WHERE DATE(`date`) = CURRENT_DATE() AND id = $id;");

        $rowCount = count($validate);

        if ($rowCount == 1) {
            $attendance_id = $validate[0]->attendance_id;
            $update = DB::update("UPDATE `attendance` SET `time_out` = current_time() WHERE `attendance`.`attendance_id` = $attendance_id;");
        } else {
        }


        $select = DB::select("SELECT * FROM `attendance` WHERE id = $id");

        return redirect('emp_attendance')->with('attendance', $select);
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
