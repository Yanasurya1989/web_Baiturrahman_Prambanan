<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Catprog;
use App\Models\Header;
use App\Models\Studies;
use Illuminate\Http\Request;

class Study extends Controller
{

    public function index()
    {
        $studies = Studies::get();
        // $studies = Studies::Latest()->limit(2)->get();
        return view('study.index', compact('studies'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // input
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;
        $link = $request->link;

        // dd($request->all());

        // proses
        $simpan = Studies::create([
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'link' => $link
        ]);

        // output
        return redirect('/study');
    }


    public function show(Studies $studies)
    {
        //
    }


    public function edit(Studies $studies)
    {
        //
    }


    public function update(Request $request, Studies $studies)
    {
        //
    }


    public function destroy($studies)
    {
        $studies = decrypt($studies);

        $delete = Studies::where('id', $studies)->delete();

        return redirect('/study');
    }

    public function detilStudy()
    {
        $fstudy = Studies::get();
        $header = About::get();
        $catprog = Catprog::get();
        // $studies = Studies::get();
        return view('programs.detil', compact('fstudy', 'header', 'catprog'));
    }
}
