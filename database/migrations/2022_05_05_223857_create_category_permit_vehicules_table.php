<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriePermiVehiculeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_permi_vehicule', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('categorie_permis_Id')->unsigned();
            $table->foreign('categorie_permis_Id')->references('id')->on('categorie_permis')->onDelete('CASCADE');

            $table->integer('vehicule_Id')->unsigned();
            $table->foreign('vehicule_Id')->references('id')->on('vehicules')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorie_permi_vehicule');
    }
}
