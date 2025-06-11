<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
        {
            Schema::create('budayas', function (Blueprint $table) {
                $table->id();
                $table->string('name'); // Nama budaya
                $table->text('description'); // Deskripsi budaya
                $table->string('origin'); // Asal budaya
                $table->timestamps();
            });
        }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budayas');
    }
};
