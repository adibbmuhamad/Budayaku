<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenimansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senimans', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // Nama Seniman
            $table->text('biography');      // Biografi Seniman
            $table->string('birthplace');    // Tempat Lahir Seniman
            $table->date('birth_date');     // Tanggal Lahir Seniman
            $table->timestamps();           // Waktu dibuat dan diperbarui
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('senimans');
    }
}
