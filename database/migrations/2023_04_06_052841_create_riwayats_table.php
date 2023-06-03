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
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            
            $table->unsignedBigInteger('kapal_id')->nullable();
            $table->foreign('kapal_id')->references('id')->on('kapals');
            
            $table->unsignedBigInteger('trucking_id')->nullable();
            $table->foreign('trucking_id')->references('id')->on('truckings');
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('riwayats');
    }
};
