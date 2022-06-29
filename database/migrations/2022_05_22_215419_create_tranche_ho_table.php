<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrancheHoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranche_Horaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string("designation")->nullable();
            $table->string("occupied")->nullable();
            $table->bigInteger("idCommande")->unsigned()->nullable()->default('0');
            $table->foreign("idCommande")->references('id')->on('commandes')->onDelete('cascade');
            $table->timestamps();
            $table->timestamp('heure_debut')->nullable();
            $table->timestamp('heure_fin')->nullable();
            $table->text('contenu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tranche_ho');
    }
}
