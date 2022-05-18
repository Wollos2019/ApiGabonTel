<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permit_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numeroDossierPermis')->nullable();
            $table->string('typeCategoriePermis')->nullable();
            $table->date('dateDebutPermis')->nullable();
            $table->date('dateFinPermis')->nullable();


            $table->integer('permis_id')->unsigned();
            $table->foreign('permis_id')->references('id')->on('permits');

            $table->integer('categorie_permis_id')->unsigned();
            $table->foreign('categorie_permis_id')->references('id')->on('category_permits');
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
        Schema::dropIfExists('permit_category');
    }
}
