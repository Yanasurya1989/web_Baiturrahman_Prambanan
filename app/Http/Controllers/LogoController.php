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

    public function create() {}

    public function store(Request $request)
    {
        // input
        $name = $request->name;
        $deskripsi = $request->deskripsi;

        if ($request->hasFile('image_path')) {
            $path_loc = $request->file('image_path');
            $url = $path_loc->move('storage/image', $path_loc->hashName());
        }

        // dd($request->all());

        // proses
        $simpan = Logo::create([
            'name' => $name,
            'image_path' => $url->getPath() . '/' . $url->getFilename(),
        ]);

        // output
        return redirect('/logos');
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

    // public function destroy(Logo $logo)
    // {
    //     $logo = decrypt($logo);
    //     $delete = Logo::where('id', $logo)->delete();
    //     return redirect('/logos');
    // }

    public function delete($id)
    {
        $id = decrypt($id);

        $delete = Logo::where('id', $id)->delete();

        return redirect('/logos');
    }
}
