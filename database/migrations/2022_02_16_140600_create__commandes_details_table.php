<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes_details', function (Blueprint $table) {
            $table->id();
            $table->string("productName", 191)->nullable();
            $table->integer("quantity")->unsigned();
            $table->integer("idProduct")->unsigned();
            $table->unsignedBigInteger("idCommande");
            $table->unsignedInteger('prix')->nullable();
            $table->date('date_debut')->nullable();
            $table->time('heure_debut')->nullable();
            $table->unsignedInteger('duree')->nullable();
            $table->text('frequence')->nullable();
            $table->foreign("idProduct")->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes_details');
    }
}
