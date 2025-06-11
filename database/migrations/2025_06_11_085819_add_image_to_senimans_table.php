<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('senimans', function (Blueprint $table) {
            $table->string('image')->nullable(); // Menambahkan kolom 'image'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('senimans', function (Blueprint $table) {
            $table->dropColumn('image'); // Menambahkan drop untuk rollback jika diperlukan
        });
    }
};
