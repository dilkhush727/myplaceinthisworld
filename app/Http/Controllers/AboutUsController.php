<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    //About us page view

    public function index() {
        return view('about-us');
    }
}
