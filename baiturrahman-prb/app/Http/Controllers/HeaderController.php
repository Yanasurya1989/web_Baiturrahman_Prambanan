<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {
        $header = Header::get();
        return view('slider.index', compact('header'));
    }

    public function store(Request $request)
    {
        // input
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $path_loc = $request->file('gambar');
            $url = $path_loc->move('storage/image', $path_loc->hashName());
        }

        // dd($request->all());

        // proses
        $simpan = Header::create([
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'gambar' => $url->getPath() . '/' . $url->getFilename(),
        ]);

        // output
        return redirect('/slider');
    }

    public function update_slider(Request $request, $id_slider)
    {
        $id_slider = decrypt($id_slider);
        // input
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $path_loc = $request->file('gambar');
            $url = $path_loc->move('storage/image', $path_loc->hashName());
        }

        // dd($request->all());

        // proses
        $simpan = Header::where('id', $id_slider)->update([
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'gambar' => $url->getPath() . '/' . $url->getFilename(),
        ]);

        // output
        return redirect('/slider');
    }

    public function delete($id)
    {
        $id = decrypt($id);

        $delete = Header::where('id', $id)->delete();

        return redirect('/slider');
    }
}
