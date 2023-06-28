<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\cashierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResortController;
use App\Http\Controllers\CottageController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EntranceController;
use App\Http\Controllers\PointOfSale;
use App\Http\Controllers\staffController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {



    return view('welcome');
});

Route::get('/dashboard', function () {

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

    $year_sales =
        DB::select("SELECT year, SUM(total) AS yearly_sales FROM transaction GROUP BY year ORDER BY year;");

    $present_emp = DB::select("SELECT COUNT(*) AS present
FROM attendance
WHERE DATE(date) = CURRENT_DATE AND time_in IS NOT NULL;");

    $present = $present_emp[0]->present;




    //Monthly Percentage

    $months = [];

    $percentage =
        DB::select("SELECT month AS month, SUM(adult) + SUM(kids) AS total_sum, ((SUM(adult) + SUM(kids)) / (SELECT SUM(adult) + SUM(kids) FROM transaction) * 100) AS percentage FROM transaction GROUP BY month;");

    for ($j = 1; $j <= 12; $j++) {
        $found = false; // Flag to track if a match is found for the month

        for ($i = 0; $i < count($percentage); $i++) {
            if ($percentage[$i]->month == $j) {
                array_push($months, round($percentage[$i]->percentage * 100 / 100));
                $found = true;
                break; // Exit the inner loop once a match is found
            }
        }

        if (!$found) {
            array_push($months, 0);
        }
    }

    return view('dashboard', ['total' => $totalCust, 'id' => 1, 'present' => $present])->with('monthy', $monthly)->with('annual', $yearly)->with('year_sales', $year_sales)->with('monthly_percentage', $months);
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/admin_dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Route::get('/staff_dashboard', [staffController::class, 'dashboard'])->name('staff.dashboard');

});

require __DIR__ . '/auth.php';


Route::get('/staff', function () {
    return view('staff');
})->middleware(['auth', 'verified'])->name('staff');

Route::get('/attendance', function () {
    return view('attendance');
})->middleware(['auth', 'verified'])->name('attendance');


// Route::get('/cottage_details', function () {
//     return view('cottage_details');
// })->middleware(['auth', 'verified'])->name('cottage_details');

// Route::get('/add_cottage', function () {
//     return view('add_cottage');
// })->middleware(['auth', 'verified'])->name('add_cottage');


// Route::get('/add_entrance', function () {
//     return view('add_entrance');
// })->middleware(['auth', 'verified'])->name('add_entrance');

// Route::get('/entrance_details', function () {
//     return view('entrance_details');
// })->middleware(['auth', 'verified'])->name('entrance_details');


//Admin

//Monthly Sales na pinupunta yung data sa JS area chart 


Route::middleware('auth', 'verified', 'admin')->group(function () {


    Route::get('/profit', [ResortController::class, 'profit']);


    Route::get('/staff', [staffController::class, 'index'])->middleware(['auth', 'verified'])->name('staff');
    Route::get('/cottage_details', [CottageController::class, 'cottages'])->middleware(['auth', 'verified'])->name('cottage_details');

    Route::get('/entrance_details', [EntranceController::class, 'entrance'])->middleware(['auth', 'verified'])->name('entrance_details');

    Route::get('/attendance', [AttendanceController::class, 'index'])->middleware(['auth', 'verified'])->name('attendance');

    Route::post('/add_entrance', [EntranceController::class, 'store'])->name('entrance.data');
    Route::view('/add_entrance', 'add_entrance');



    Route::post('/add_cottage', [CottageController::class, 'store'])->name('store.data');
    Route::view('/add_cottage', 'add_cottage');

    Route::post('/update_cottage', [CottageController::class, 'update']);
    Route::get('/delete_cottage/{cottage_id}', [CottageController::class, 'destroy']);
    Route::get('/reset', [CottageController::class, 'reset']);


    Route::post('/update_entrance', [EntranceController::class, 'update']);
    Route::get('/delete_entrance/{type_id}', [EntranceController::class, 'destroy']);
});

Route::get('/total_sales', [ResortController::class, 'monthly'])->middleware(['auth', 'verified']);


//Cashier Side 
Route::middleware('auth', 'verified', 'staff')->group(function () {
    //Staff POS
    Route::view('/PointOfSale', 'PointOfSale');
    Route::get('/PointOfSale', [PointOfSale::class, 'index'])->name('entrance_details');
    Route::view('/receipt', 'receipt');

    Route::post('/add_trans', [PointOfSale::class, 'store'])->name('trans.data');
    Route::get('/staff_entrance', [staffController::class, 'entrance']);
    Route::get('/staff_cottage', [staffController::class, 'cottage']);
    // Route::view('/staff_dashboard', 'staff_dashboard');
    Route::get('/staff_dashboard',  [staffController::class, 'dashboard'])->name('staff.dashboard');
});


//Employee Side 
Route::middleware('auth', 'verified', 'emp')->group(function () {

    Route::get('/employee_dashboard', [EmployeeController::class, 'index'])->name('emp.dashboard');
    Route::get('/emp_attendance',  [EmployeeController::class, 'attendance']);
    Route::get('/emp_logs',  [EmployeeController::class, 'logs']);
    Route::get('/timein',  [EmployeeController::class, 'store']);
    Route::get('/timeout',  [EmployeeController::class, 'timeout']);
});
