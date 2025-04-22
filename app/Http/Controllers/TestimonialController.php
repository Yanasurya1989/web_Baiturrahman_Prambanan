<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Simpan gambar ke storage
        $imagePath = $request->file('image')->store('testimonials', 'public');

        Testimonial::create([
            'name' => $request->name,
            'profession' => $request->profession,
            'message' => $request->message,
            'image_path' => 'storage/' . $imagePath,
        ]);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'profession' => $request->profession,
            'message' => $request->message,
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($testimonial->image_path && file_exists(public_path($testimonial->image_path))) {
                unlink(public_path($testimonial->image_path));
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('testimonials', 'public');
            $data['image_path'] = 'storage/' . $imagePath;
        }

        $testimonial->update($data);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Hapus gambar dari storage
        if ($testimonial->image_path && file_exists(public_path($testimonial->image_path))) {
            unlink(public_path($testimonial->image_path));
        }

        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil dihapus.');
    }
}
