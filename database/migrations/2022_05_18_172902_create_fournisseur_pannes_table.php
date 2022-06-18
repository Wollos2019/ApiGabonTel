<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFournisseurPannesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseur_pannes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facture')->nullable();
            $table->integer('coutPiece')->nullable();

            $table->integer('panneId')->unsigned()->nullable();
            $table->foreign("panneId")->references('id')->on('pannes')->onDelete('cascade');

            $table->integer('fournisseurId')->unsigned()->nullable();
            $table->foreign("fournisseurId")->references('id')->on('vendors')->onDelete('cascade');

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
        Schema::dropIfExists('fournisseur_pannes');
    }
}
