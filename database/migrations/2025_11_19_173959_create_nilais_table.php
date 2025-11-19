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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_event');
            $table->unsignedBigInteger('id_lomba');
            $table->unsignedBigInteger('id_peserta');
            $table->unsignedBigInteger('id_juri');

            $table->integer('nilai');

            $table->timestamps();

            // RELASI
            $table->foreign('id_event')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('id_lomba')->references('id')->on('lombas')->onDelete('cascade');
            $table->foreign('id_peserta')->references('id')->on('pesertas')->onDelete('cascade');
            $table->foreign('id_juri')->references('id')->on('juris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
