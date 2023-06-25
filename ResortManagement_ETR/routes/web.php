<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\cashierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResortController;
use App\Http\Controllers\CottageController;
use App\Http\Controllers\EntranceController;
use App\Http\Controllers\PointOfSale;
use App\Http\Controllers\staffController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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

Route::post('/update_entrance', [EntranceController::class, 'update']);
Route::get('/delete_entrance/{type_id}', [EntranceController::class, 'destroy']);



//Cashier Side 
//Staff POS
Route::view('/PointOfSale', 'PointOfSale');
Route::get('/PointOfSale', [PointOfSale::class, 'index'])->middleware(['auth', 'verified'])->name('entrance_details');
Route::view('/receipt', 'receipt');

Route::post('/add_trans', [PointOfSale::class, 'store'])->name('trans.data');
