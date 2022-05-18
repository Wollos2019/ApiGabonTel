<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePannesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pannes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libellePanne')->nullable();
            $table->text('descriptionPanne')->nullable();
            $table->date('dateDebutPanne')->nullable();
            $table->date('dateFinPanne')->nullable();
            $table->integer('coutMainOeuvre')->nullable();
            $table->string('factureMainOeuvre')->nullable();
            $table->integer('vehiculeId')->unsigned();
            $table->foreign('vehiculeId')->references('id')->on('vehicules');
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
        Schema::dropIfExists('pannes');
    }
}
