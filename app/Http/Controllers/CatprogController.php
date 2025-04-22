<?php

namespace App\Http\Controllers;

use App\Models\Catprog;
use Illuminate\Http\Request;

class CatprogController extends Controller
{

    public function index()
    {
        $catprogs = Catprog::all();
        return view('4th-fe.partials.catprog', compact('catprogs'));
    }

    public function create()
    {
        return view('catprog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
            'course_count' => 'nullable'
        ]);

        $imagePath = $request->file('image')->store('catprogs', 'public');

        Catprog::create([
            'title' => $request->title,
            'image_path' => 'storage/' . $imagePath,
            'course_count' => $request->course_count,
        ]);

        return redirect()->route('4th-fe.index');
    }


    public function show(Catprog $catprog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catprog $catprog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catprog $catprog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catprog $catprog)
    {
        //
    }
}
