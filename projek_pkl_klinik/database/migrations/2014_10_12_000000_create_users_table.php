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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempatlahir');
            $table->date('tgllahir');
            $table->enum('jeniskelamin',['L', 'P']);
            $table->string('alamat');
            $table->string('telp');
            $table->string('email')->unique(); 
            $table->string('password');
            $table->enum('level',['dokterumum', 'doktergigi', 'bidan', 'perawat', 'admin', 'superadmin']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
