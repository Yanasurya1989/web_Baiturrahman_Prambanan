<?php

namespace App\Http\Controllers;

use App\Models\Studies;
use Illuminate\Http\Request;

class FStudy extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fstudy = Studies::get();
        return view('detil.kajian', compact('fstudy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Fstudies $fstudies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fstudies $fstudies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fstudies $fstudies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fstudies $fstudies)
    {
        //
    }
}
