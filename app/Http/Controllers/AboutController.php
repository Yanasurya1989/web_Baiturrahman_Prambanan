<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('about.index', compact('abouts'));
    }

    public function toggleStatus($id)
    {
        $about = About::findOrFail($id);
        $about->status = $about->status === 'active' ? 'non-active' : 'active';
        $about->save();

        return redirect()->back()->with('success', 'Status berhasil diubah.');
    }


    public function create()
    {
        return view('about.create');
    }

    public function storeBentarLagiNambahGambar(Request $request)
    {
        // input
        $title = $request->title;
        $description = $request->description;
        $video_url = $request->video_url;
        $status = $request->status;

        if ($request->hasFile('header_image')) {
            $path = $request->file('header_image')->store('about_headers', 'public');
            $header_image = $path;
        }


        // dd($request->all());

        // proses
        $simpan = About::create([
            'title' => $title,
            'description' => $description,
            'video_url' => $video_url,
            'status' => $status,
            'header_image' => $header_image ?? null,
        ]);

        // output
        return redirect('/about');
    }

    public function store(Request $request)
    {
        $title = $request->title;
        $description = $request->description;
        $video_url = $request->video_url;
        $status = $request->status;

        // handle upload file
        $header_image = null;
        if ($request->hasFile('header_image')) {
            $header_image = $request->file('header_image')->store('about_headers', 'public');
        }

        // proses simpan
        About::create([
            'title' => $title,
            'description' => $description,
            'video_url' => $video_url,
            'status' => $status,
            'header_image' => $header_image
        ]);

        return redirect('/about');
    }

    public function show($id)
    {
        $about = About::findOrFail($id);
        return view('about.show', compact('about'));
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'video_url' => 'nullable|url',
        ]);

        $about = About::findOrFail($id);
        $about->update($request->all());

        return redirect()->route('about.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();

        return redirect()->route('about.index')->with('success', 'Data berhasil dihapus');
    }

    public function aboutDetail()
    {
        return view('about.detil');
    }
}
