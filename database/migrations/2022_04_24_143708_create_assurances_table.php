<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assurances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numeroPoliceAssurance')->nullable();
            $table->date('dateDebutAssurance')->nullable();
            $table->date('dateFinAssurance')->nullable();
            $table->string('scanAssurance')->nullable();
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
        Schema::dropIfExists('assurances');
    }
}
