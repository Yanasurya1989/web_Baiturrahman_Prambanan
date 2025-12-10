<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\News;
use App\Models\Unit;
use App\Models\About;
use App\Models\Header;
use App\Models\Artikel;
use App\Models\Catprog;
use App\Models\Program;
use App\Models\Studies;
use App\Models\Structurs;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\SectionSetting;
use App\Helpers\SectionVisibility;

class HomepageController extends Controller
{
    public function home()
    {
        // $studies = Studies::latest()->limit(2)->get();
        $studies = Studies::latest()->take(5)->get(); // ambil 5 kajian terbaru
        $sections = SectionSetting::where('status', 'active')->orderBy('order')->get();
        // return view('frontend.index', compact('sections', 'studies'));

        $units = Unit::get();
        $structurs = Structurs::get();

        // $sliders = Header::where('status', 'active')->get();
        // foreach ($sliders as $data) {
        //     $data->short_description = substr($data->deskripsi, 0, 100) . '...';
        // }

        $sliderMode = env('SLIDER_MODE', 'header'); // default header

        if ($sliderMode === 'artikel') {
            $sliders = Artikel::latest()->take(5)->get();
            foreach ($sliders as $item) {
                $item->short = substr(strip_tags($item->deskripsi), 0, 120) . '...';
                $item->image_url = asset('storage/' . $item->gambar);
                $item->title = $item->judul;
                $item->link = route('artikel.show', $item->id);
            }
        } else {
            $sliders = Header::where('status', 'active')->get();
            foreach ($sliders as $item) {
                $item->short = substr(strip_tags($item->deskripsi), 0, 120) . '...';
                $item->image_url = $item->gambar;
                $item->title = $item->judul;
                $item->link = route('slider.show', $item->id ?? 0);
            }
        }

        // $logos = Logo::get();
        $logos = Logo::first();

        $news = News::get();
        // $news = News::where('status', 'active')->get();
        // foreach ($news as $data) {
        //     $data->short_description = substr($data->deskripsi, 0, 30) . '...';
        // }

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
        // $sections = SectionSetting::orderBy('order')->get();
        $artikels = Artikel::latest()->take(6)->get();

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
            'artikels'
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
        $studydetillist = Studies::get();
        return view('programs.detil', compact('study', 'news', 'about', 'teams', 'units', 'catprogs', 'studydetillist'));
    }

    public function artikelDetil($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikels = Artikel::where('id', '!=', $id)
            ->latest()
            ->take(5)
            ->get();

        return view('4th-fe.artikel.show', compact('artikel', 'artikels'));
    }

    public function artikelIndex()
    {
        $artikels = \App\Models\Artikel::latest()->paginate(6); // tampil 6 per halaman
        return view('4th-fe.artikel.frontend.index', compact('artikels'));
    }
}
