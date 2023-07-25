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
        Schema::create('observasiawals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pasien_id');
            $table->bigInteger('user_id');
            $table->date('tglhadir');
            $table->string('suhutubuh');
            $table->string('sistole');
            $table->string('diastole');
            $table->string('beratbadan');
            $table->string('tinggibadan');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observasiawals');
    }
};
