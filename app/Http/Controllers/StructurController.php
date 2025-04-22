<?php

namespace App\Http\Controllers;

use App\Models\Structurs;
use Illuminate\Http\Request;

class StructurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structures = Structurs::get();
        return view('structur.index', compact('structures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function storeBentarMauUpdateSosmed(Request $request)
    {
        // input
        $nama = $request->nama;
        $jabatan = $request->jabatan;
        $sambutan = $request->sambutan;

        if ($request->hasFile('gambar')) {
            $path_loc = $request->file('gambar');
            $url = $path_loc->move('storage/image', $path_loc->hashName());
        }

        // dd($request->all());

        // proses
        $simpan = Structurs::create([
            'nama' => $nama,
            'jabatan' => $jabatan,
            'sambutan' => $sambutan,
            'gambar' => $url->getPath() . '/' . $url->getFilename(),
        ]);

        // output
        return redirect('/structure');
    }

    public function store(Request $request)
    {
        // input
        $nama = $request->nama;
        $jabatan = $request->jabatan;
        $sambutan = $request->sambutan;
        // $link_sosmed = $request->link_sosmed;
        $fb = $request->fb;
        $twitter = $request->twitter;
        $instagram = $request->instagram;
        $youtube = $request->youtube;

        if ($request->hasFile('gambar')) {
            $path_loc = $request->file('gambar');
            $url = $path_loc->move('storage/image', $path_loc->hashName());
            $gambar_path = $url->getPath() . '/' . $url->getFilename();
        } else {
            $gambar_path = null;
        }

        // proses
        $simpan = Structurs::create([
            'nama' => $nama,
            'jabatan' => $jabatan,
            'sambutan' => $sambutan,
            'gambar' => $gambar_path,
            // 'link_sosmed' => $link_sosmed,
            'fb' => $fb,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'youtube' => $youtube,
        ]);

        // output
        return redirect('/structure');
    }

    public function show(Structurs $structurs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Structurs $structurs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Structurs $structurs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($structurs)
    {
        $structurs = decrypt($structurs);

        $delete = Structurs::where('id', $structurs)->delete();

        return redirect('/structure');
    }
}
