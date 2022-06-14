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
        Schema::create('mapela', function (Blueprint $table) {
            $table->unsignedBigInteger('mhs_id')->nullable();
            $table->unsignedBigInteger('pelajaran_id')->nullable();
            $table->timestamps();

            $table->foreign('mhs_id')->references('id')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('pelajaran_id')->references('id')->on('pelajaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapela');
    }
};
