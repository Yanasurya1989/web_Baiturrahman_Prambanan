<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\Header;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HeaderController extends Controller
{
    public function index()
    {
        $header = Header::all(); // Ambil semua data, baik active maupun non-active
        foreach ($header as $item) {
            $item->short_description = Str::limit(strip_tags($item->deskripsi), 10);
            $item->short_title = Str::limit($item->judul, 5);
            $item->short_kategori = Str::limit($item->kategori, 5);
            $item->video_embed_url = str_replace('watch?v=', 'embed/', $item->video_url);
        }
        return view('slider.index', compact('header'));
    }

    public function showCarouselFe($id)
    {
        $allSliders = Header::all();
        $slider = Header::findOrFail($id);
        $logos = Logo::all();
        return view('slider.CarouselFe.detil', compact('logos', 'slider', 'allSliders'));
    }


    public function toggleStatus($id)
    {
        $header = Header::findOrFail($id);
        $header->status = $header->status === 'active' ? 'non-active' : 'active';
        $header->save();

        return redirect()->back()->with('success', 'Status berhasil diubah');
    }


    public function store(Request $request)
    {
        // input
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;
        $kategori = $request->kategori;

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
            'kategori' => $kategori,
        ]);

        // output
        return redirect('/slider');
    }

    public function edit(Header $header)
    {
        return view('slider.edit', compact('header'));
    }

    public function update_slider(Request $request, Header $id_slider)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');

            // Simpan gambar
            $path = $gambar->store('public/image');

            // Debug: Periksa path penyimpanan
            dd('File disimpan di:', $path);
        }


        $updated = $id_slider->update($data);

        if ($updated) {
            return redirect()->to('/slider')->withSuccess('Berhasil diupdate');
        } else {
            return back()->withErrors('Gagal memperbarui slider');
        }
    }

    public function delete($id)
    {
        $id = decrypt($id);

        $delete = Header::where('id', $id)->delete();

        return redirect('/slider');
    }

    public function show($id)
    {
        $slider = Header::findOrFail($id); // Ambil data slider berdasarkan ID
        // return view('slider_detail', compact('slider'));
        // return view('slider.detil', compact('slider'));
        return view('slider.contact-detile', compact('slider'));
    }

    // public function contact($id)
    // {
    //     $headerImage = Header::where('id', $id)->value('gambar');

    //     return view('slider.contact-detile', compact('headerImage'));
    // }

    public function contact($id)
    {
        // Ambil data berdasarkan ID
        $header = Header::findOrFail($id);

        return view('slider.contact-detile', compact('header'));
    }

    public function abot()
    {
        return view('about.index');
    }

    public function createSummer()
    {
        // return view('slider.create');
        return view('slider.create');
    }

    public function storeSummer(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|max:2048',

        ]);

        // Upload gambar
        $fileName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('slider_images'), $fileName);

        // Simpan ke database
        Header::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $fileName,
            'kategori' => $request->kategori,

        ]);

        return redirect()->route('slider.index')->with('success', 'Slider berhasil ditambahkan');
    }
}
