<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelleVehicule')->nullable();
            $table->string('numeroIdentifiant')->nullable();
            $table->string('immatriculation')->nullable();
            $table->string('carteGrise')->nullable();
            $table->integer('nombrePlace')->nullable();
            $table->decimal('longueurVehicule')->nullable();
            $table->integer('dureeVie')->nullable();
            $table->date('dateMiseCirculation')->nullable();
            $table->integer('delaiAlerte')->nullable();
            //$table->foreign("idClient")->references('id')->on('clients')->onDelete('cascade');

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
        Schema::dropIfExists('vehicules');
    }
}
