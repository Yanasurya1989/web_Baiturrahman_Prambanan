<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSosmedLinksToStructursTable extends Migration
{
    public function up(): void
    {
        Schema::table('structurs', function (Blueprint $table) {
            $table->string('fb')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('structurs', function (Blueprint $table) {
            $table->dropColumn(['fb', 'twitter', 'instagram', 'youtube']);
        });
    }
}
