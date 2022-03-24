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
            $table->string("productName")->nullable();
            $table->integer("quantity")->unsigned();
            $table->integer("idProduct")->unsigned();
            $table->integer("idCommande")->unsigned();
            $table->foreign("idProduct")->references('id')->on('products')->onDelete('cascade');
            //$table->foreign("idCommande")->references('id')->on('commandes')->onDelete('cascade');
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
        Schema::dropIfExists('commandes_details');
    }
}
