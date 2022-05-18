<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisCategorieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permis_categorie', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numeroDossierPermis')->nullable();
            $table->string('typeCategoriePermis')->nullable();
            $table->date('dateDebutPermis')->nullable();
            $table->date('dateFinPermis')->nullable();


            $table->integer('permis_id')->unsigned();
            $table->foreign('permis_id')->references('id')->on('permis');

            $table->integer('categorie_permis_id')->unsigned();
            $table->foreign('categorie_permis_id')->references('id')->on('categorie_permis');
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
        Schema::dropIfExists('permis_categorie');
    }
}
