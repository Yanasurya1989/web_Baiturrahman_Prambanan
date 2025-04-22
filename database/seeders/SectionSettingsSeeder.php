<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SectionSetting;

class SectionSettingsSeeder extends Seeder
{
    public function run()
    {
        SectionSetting::truncate(); // hapus data sebelumnya

        $sections = [
            ['section_name' => 'Header', 'status' => 'active', 'order' => 1],
            ['section_name' => 'About', 'status' => 'active', 'order' => 2],
            ['section_name' => 'Programs', 'status' => 'non-active', 'order' => 3],
            ['section_name' => 'News', 'status' => 'active', 'order' => 4],
            ['section_name' => 'Studies', 'status' => 'active', 'order' => 5],
            ['section_name' => 'Units', 'status' => 'active', 'order' => 6],
            ['section_name' => 'Testimonials', 'status' => 'active', 'order' => 7], // ✅ Tambahan
        ];

        foreach ($sections as $section) {
            SectionSetting::create($section);
        }
    }
}
