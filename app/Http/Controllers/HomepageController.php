<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Logo;
use App\Models\Unit;
use App\Models\Header;
use App\Models\News;
use App\Models\Studies;
use App\Models\Structurs;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function home()
    {
        $studies = Studies::Latest()->limit(2)->get();
        $units = Unit::get();
        $structurs = Structurs::get();
        $sliders = Header::where('status', 'active')->get();
        $logos = Logo::get();
        $news = News::get();
        // $abouts = About::latest()->first(); // ambil data terbaru
        $about = About::where('status', 'active')->first();
        $about->video_url = str_replace("watch?v=", "embed/", $about->video_url);

        return view('4th-fe.index', compact('news', 'logos', 'sliders', 'studies', 'structurs', 'units', 'about'));
        // return view('rd-user.index', compact('sliders', 'studies', 'structurs'));
        // return view('nd-user.index', compact('sliders'));
        // return view('user', compact('studies', 'units', 'structures'));
    }

    public function home_admin()
    {
        return view('admin');
    }
}
