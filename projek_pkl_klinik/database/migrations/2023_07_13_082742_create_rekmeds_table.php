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
        Schema::create('rekmeds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pasien_id');
            $table->bigInteger('user_id');
            $table->date('tglinput');
            $table->string('photo');
            $table->text('catatan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekmeds');
    }
};
