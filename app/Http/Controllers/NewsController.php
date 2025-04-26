<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::get();
        return view('news.index', compact('news'));
    }

    public function frontend()
    {
        $news = News::get();
        dd($news);
        return view('4th-fe.index', compact('news'));
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

        if ($request->hasFile('gambar')) {
            $path_loc = $request->file('gambar');
            $url = $path_loc->move('storage/image', $path_loc->hashName());
        }

        // dd($request->all());

        // proses
        $simpan = News::create([
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'gambar' => $url->getPath() . '/' . $url->getFilename(),
        ]);

        // output
        return redirect('/news');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        $logos = Logo::all();
        return view('news.show', compact('news', 'logos'));
    }

    public function destroy($news)
    {
        $news = decrypt($news);

        $delete = News::where('id', $news)->delete();

        return redirect('/news');
    }
}
