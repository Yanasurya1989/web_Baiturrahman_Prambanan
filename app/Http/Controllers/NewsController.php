<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function storeBedaLokasiPenyimpananGambar(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('image', 'public');
        }

        News::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $path,
        ]);

        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        // $path = null;
        // if ($request->hasFile('gambar')) {
        //     $storedPath = $request->file('gambar')->store('image', 'public'); 
        //     $path = 'storage/' . $storedPath; 
        // }

        // News::create([
        //     'judul' => $request->judul,
        //     'deskripsi' => $request->deskripsi,
        //     'gambar' => $path, 
        // ]);

        $storedPath = $request->file('gambar')->store('image', 'public'); // hasil: "image/namafile.jpg"

        News::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $storedPath, // cukup: "image/namafile.jpg"
        ]);

        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    public function storeModal(Request $request)
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

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($news->gambar && Storage::disk('public')->exists($news->gambar)) {
                Storage::disk('public')->delete($news->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('image', 'public');
        }

        $news->update($data);

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->gambar && Storage::disk('public')->exists($news->gambar)) {
            Storage::disk('public')->delete($news->gambar);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }

    public function frontend()
    {
        $news = News::all();
        return view('4th-fe.index', compact('news'));
    }


    public function show($id)
    {
        $news = News::findOrFail($id);
        $logos = Logo::all(); // kembalikan baris ini
        return view('news.show', compact('news', 'logos'));
    }
}
