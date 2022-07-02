<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_vehicules', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dateEntretien')->nullable();
            $table->integer('cout')->nullable();
            $table->date('nextDateEntretien')->nullable();
            $table->integer('kilometrageEntretien')->nullable();
            $table->string('kilometrageNextEntretien')->nullable();
            $table->integer('quantiteTypeEntretien')->nullable();

            $table->integer('vehiculeId')->unsigned()->nullable();
            $table->foreign('vehiculeId')->references('id')->on('vehicules')->onDelete('cascade');

            $table->integer('fournisseurId')->unsigned()->nullable();
            $table->foreign('fournisseurId')->references('id')->on('vendors')->onDelete('cascade');

            $table->integer('typeEntretienId')->unsigned();
            $table->foreign('typeEntretienId')->references('id')->on('type_maintenances')->onDelete('cascade');

            $table->integer('unitMesureId')->unsigned()->nullable();
            $table->foreign('unitMesureId')->references('id')->on('unit_mesures')->onDelete('cascade');
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
        Schema::dropIfExists('maintenance_vehicules');
    }
}
