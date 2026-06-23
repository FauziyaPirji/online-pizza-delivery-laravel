<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class about_usController extends Controller
{
    public function showAboutUs()
    {
        return view('about_us'); 
    }
}
