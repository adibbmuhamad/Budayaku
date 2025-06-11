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
        Schema::table('budayas', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained('categories'); // Menambahkan kolom category_id yang terhubung ke tabel categories
        });
    }

    public function down()
    {
        Schema::table('budayas', function (Blueprint $table) {
            $table->dropColumn('category_id'); // Drop column saat rollback
        });
    }

};
