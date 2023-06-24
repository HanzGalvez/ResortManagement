<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:staff');
    }

    public function index()
    {
        return view('PointOfSale');
    }
}
