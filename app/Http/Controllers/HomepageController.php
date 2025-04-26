<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\News;
use App\Models\Unit;
use App\Models\About;
use App\Models\Header;
use App\Models\Program;
use App\Models\Studies;
use App\Models\Structurs;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\SectionSetting;
use App\Helpers\SectionVisibility;
use App\Models\Catprog;

class HomepageController extends Controller
{
    public function home()
    {
        $studies = Studies::latest()->limit(2)->get();
        $units = Unit::get();
        $structurs = Structurs::get();

        $sliders = Header::where('status', 'active')->get();
        foreach ($sliders as $data) {
            $data->short_description = substr($data->deskripsi, 0, 100) . '...';
        }

        // $logos = Logo::get();
        $logos = Logo::first();
        $news = News::get();
        $programs = Program::where('status', 1)->take(4)->get();
        $testimonials = Testimonial::latest()->get();
        $catprogs = \App\Models\Catprog::all();

        $about = About::where('status', 'active')->first();
        if ($about) {
            $about->short_description = substr($about->description, 0, 200) . '...';  // Potong deskripsi menjadi 100 karakter
            $about->video_url = str_replace("watch?v=", "embed/", $about->video_url);
        }

        $teams = Structurs::get(); // Bisa diganti nanti kalau ada model Team

        // Ambil semua section yang aktif & urut
        $sections = SectionVisibility::getVisibleSectionsWithOrder()->map(function ($item) {
            $item->section_name = strtolower($item->section_name);
            return $item;
        });

        // Buat array nama-nama section yang aktif
        $activeSections = $sections->pluck('section_name')->toArray();

        // Versi uppercase pertama (buat blade yang pakai `Programs`, `Abouts`, dll)
        $visibleSections = array_map('ucfirst', $activeSections);

        // Cek apakah section tertentu aktif
        $showAbout = in_array('abouts', $activeSections);
        $showPrograms = in_array('programs', $activeSections);
        $showNews = in_array('news', $activeSections);
        $showStudies = in_array('studies', $activeSections);
        $showStructurs = in_array('structurs', $activeSections);
        $showUnits = in_array('units', $activeSections);
        $showTestimonials = in_array('testimonials', $activeSections);
        $showSliders = in_array('headers', $activeSections);
        $showLogos = in_array('logos', $activeSections);

        return view('4th-fe.index', compact(
            'news',
            'logos',
            'sliders',
            'studies',
            'structurs',
            'units',
            'about',
            'programs',
            'showAbout',
            'showPrograms',
            'showNews',
            'showStudies',
            'showStructurs',
            'showUnits',
            'showTestimonials',
            'showSliders',
            'showLogos',
            'teams',
            'sections',
            'testimonials',
            'visibleSections', // 🔥 Tambahan ini yang penting
            'catprogs',
        ));
    }

    public function home_admin()
    {
        return view('admin');
    }

    public function aboutDetil()
    {
        $news = News::latest()->take(3)->get();
        $about = About::where('status', 'active')->first();
        $headers = Header::where('status', 'active')->latest()->take(3)->get();
        $teams = Structurs::latest()->take(3)->get();
        $units = Unit::latest()->get();
        $catprogs = Catprog::latest()->get();
        $logos = Logo::all();
        return view('about.detil', compact('about', 'news', 'headers', 'teams', 'units', 'catprogs', 'logos'));
    }

    public function detilStudy()
    {
        $study = About::where('status', 'active')->first();
        $news = News::latest()->take(3)->get();
        $about = About::where('status', 'active')->first();
        $teams = Structurs::latest()->take(3)->get();
        $units = Unit::latest()->get();
        $catprogs = Catprog::latest()->get();
        return view('programs.detil', compact('study', 'news', 'about', 'teams', 'units', 'catprogs'));
    }
}
