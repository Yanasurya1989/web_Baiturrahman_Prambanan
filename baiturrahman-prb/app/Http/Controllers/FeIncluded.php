<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeIncluded extends Controller
{
    public function index()
    {
        return view('fe-layout.header');
    }
}
