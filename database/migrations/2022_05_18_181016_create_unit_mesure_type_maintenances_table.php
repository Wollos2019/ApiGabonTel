<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitMesureTypeMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_mesure_type_maintenances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unitMesureId')->unsigned()->nullable();
            $table->foreign('unitMesureId')->references('id')->on('unit_mesures')->onDelete('cascade');
            $table->integer('typeEntretienId')->unsigned()->nullable();
            $table->foreign('typeEntretienId')->references('id')->on('type_maintenances')->onDelete('cascade');
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
        Schema::dropIfExists('unit_mesure_type_maintenances');
    }
}
