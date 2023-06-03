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
        Schema::create('pergudangans', function (Blueprint $table) {
            $table->id();
            $table->Integer('row');
            $table->Integer('cell');
            $table->date('waktu');
            $table->unsignedBigInteger('id_ekspor')->unsigned()->nullable();
            $table->foreign('id_ekspor')->references('id')->on('ekspors');
            $table->unsignedBigInteger('id_impor')->unsigned()->nullable();
            $table->foreign('id_impor')->references('id')->on('impors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pergudangans');
    }
};
