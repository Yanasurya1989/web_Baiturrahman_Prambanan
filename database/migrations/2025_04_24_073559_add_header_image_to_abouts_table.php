<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('header_image')->nullable()->after('title');
        });
    }

    public function down()
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn('header_image');
        });
    }
};
