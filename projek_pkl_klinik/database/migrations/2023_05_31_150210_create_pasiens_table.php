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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('noNIK');
            $table->string('noBpjs');
            $table->string('tempatlahir');
            $table->date('tgllahir');
            $table->enum('jeniskelamin',['L', 'P']);
            $table->string('alamat');
            $table->string('telp');
            $table->enum('alergiobat',['Y', 'N']);
            $table->string('namaayah');
            $table->string('namaibu');
            $table->string('namasuami');
            $table->string('namaisteri');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
