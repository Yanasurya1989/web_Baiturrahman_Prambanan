<?php

namespace App\Http\Controllers;

use App\Models\Studies;
use Illuminate\Http\Request;

class Study extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studies = Studies::get();
        // $studies = Studies::Latest()->limit(2)->get();
        return view('study.index', compact('studies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Studies $studies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Studies $studies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Studies $studies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($studies)
    {
        $studies = decrypt($studies);

        $delete = Studies::where('id', $studies)->delete();

        return redirect('/study');
    }
}
