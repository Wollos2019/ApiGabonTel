<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriseVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prise_vehicules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objetPriseVehicule')->nullable();
            $table->date('datePriseVehicule')->nullable();
            $table->time('heurePriseVehicule');
            $table->integer('idVehicule')->unsigned();
            $table->foreign("idVehicule")->references('id')->on('vehicules')->onDelete('cascade');

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
        Schema::dropIfExists('prise_vehicules');
    }
}
