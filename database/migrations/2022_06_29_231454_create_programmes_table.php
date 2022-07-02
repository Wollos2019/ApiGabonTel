<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmes', function (Blueprint $table) {
            $table->increments('id');
            $table->time('heure_debut');
            $table->date('date');
            $table->integer('duree')->default('0');
            $table->string('denomination')->nullable();
            $table->text('description');
            $table->unsignedBigInteger("idCommande")->nullable();
            $table->foreign('idCommande')->references('id')->on('commandes')->onDelete('cascade');
            $table->integer("idProduct")->unsigned()->nullable();
            $table->foreign("idProduct")->references('id')->on('products')->onDelete('cascade');
            $table->integer("conducteur_id")->unsigned();
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
        Schema::dropIfExists('programmes');
    }
}
