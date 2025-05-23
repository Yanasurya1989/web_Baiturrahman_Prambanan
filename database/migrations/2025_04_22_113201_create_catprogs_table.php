<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('catprogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_path');
            $table->string('course_count')->nullable(); // "49 Courses" bisa ditaruh sini
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catprogs');
    }
};
