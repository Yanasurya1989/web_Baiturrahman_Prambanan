<?php

namespace App\Helpers;

use App\Models\SectionSetting;

class SectionVisibility
{
    public static function getVisibleSections()
    {
        return SectionSetting::where('status', 'active')
            ->orderBy('order')
            ->pluck('section_name')
            ->toArray();
    }

    public static function getVisibleSectionsWithOrder()
    {
        return SectionSetting::where('status', 'active')

            ->orderBy('order')
            ->get(); // Ambil semua kolom
    }
}
