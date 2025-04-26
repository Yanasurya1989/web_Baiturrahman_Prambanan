<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LogoController extends Controller
{
    public function index()
    {
        // dd(auth()->user());
        $logos = Logo::all();
        return view('logos.index', compact('logos'));
    }

    public function buatLogos()
    {
        $logo = Logo::first(); // Ambil satu logo saja
        return view('4th-fe.partials.navbar', compact('logo'));
    }


    public function create() {}

    public function storeIniBalikinAjaKloStoreLogoGagal(Request $request)
    {
        // input
        $name = $request->name;
        $image_path = $request->image_path;
        $image_path = $request->image_path;


        if ($request->hasFile('image_path')) {
            $path_loc = $request->file('image_path');
            $url = $path_loc->move('storage/image', $path_loc->hashName());
        }

        // dd($request->all());

        // proses
        $simpan = Logo::create([
            'name' => $name,
            'image_path' => $url->getPath() . '/' . $url->getFilename(),
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
        ]);


        // output
        return redirect('/logos');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
            'youtube' => 'nullable|string',
        ]);

        // Proses upload gambar
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = $image->hashName(); // generate nama unik
            $image->move(public_path('storage/image'), $imageName); // simpan ke folder public/storage/image
        }

        // Simpan data ke database
        Logo::create([
            'name' => $request->name,
            'image_path' => 'storage/image/' . $imageName,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
        ]);

        // Redirect
        return redirect('/logos')->with('success', 'Data logo berhasil ditambahkan.');
    }


    public function edit(Logo $logo)
    {
        return view('logos.edit', compact('logo'));
    }

    public function update(Request $request, Logo $logo)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            // 'image_path' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
        ];


        if ($request->hasFile('image_path')) {
            $image_path = $request->file('image_path');

            // Simpan gambar ke storage
            $path = $image_path->store('public/image');

            // Simpan path ke database (hapus 'public/' agar sesuai dengan storage link)
            $data['image_path'] = str_replace('public/', '', $path);
        }

        $updated = $logo->update($data);

        if ($updated) {
            return redirect()->to('/logos')->withSuccess('Berhasil diupdate');
        } else {
            return back()->withErrors('Gagal memperbarui slider');
        }
    }

    public function delete($id)
    {
        $id = decrypt($id);

        $delete = Logo::where('id', $id)->delete();

        return redirect('/logos');
    }
}
