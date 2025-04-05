<?php

namespace App\Http\Controllers;

use App\Models\Structurs;
use App\Models\Studies;
use App\Models\Unit;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function home()
    {
        $studies = Studies::Latest()->limit(2)->get();
        $units = Unit::get();
        $structures = Structurs::get();
        return view('user', compact('studies', 'units', 'structures'));
    }

    public function home_admin()
    {
        return view('admin');
    }
}
