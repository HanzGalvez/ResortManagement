<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class modalController extends Controller
{
    public function showModal()
    {
        return view('cottage_details');
    }
}
