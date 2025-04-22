<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SectionSetting;

class SectionSettingController extends Controller
{
    public function index()
    {
        $sections = SectionSetting::all()->keyBy('section_name');

        return view('admin.section-settings', compact('sections'));
    }

    public function toggle(Request $request)
    {
        $request->validate([
            'section_name' => 'required|string|exists:section_settings,section_name',
        ]);

        $section = SectionSetting::where('section_name', $request->section_name)->first();

        if ($section) {
            $section->status = $section->status === 'active' ? 'non-active' : 'active';
            $section->save();

            return response()->json([
                'success' => true,
                'new_status' => $section->status,
                'section_name' => $section->section_name
            ]);
        }

        return response()->json(['success' => false], 404);
    }

    public function updateOrder(Request $request)
    {
        $order = $request->order;
        foreach ($order as $index => $sectionName) {
            SectionSetting::where('section_name', $sectionName)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
