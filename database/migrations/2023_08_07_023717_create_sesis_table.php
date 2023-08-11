<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('jam_mulai');
            $table->string("jam_selesai");
            $table->date("tanggal");
            $table->enum("status", ['tersedia', 'dipesan'])->default('tersedia');
            $table->foreignId('price_id')->constrained('prices')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sesis');
    }
};
