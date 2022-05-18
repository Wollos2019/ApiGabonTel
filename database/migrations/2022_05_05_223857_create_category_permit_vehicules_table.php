<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPermitVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_permit_vehicules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('category_permits_Id')->unsigned()->nullable();
            $table->foreign('category_permits_Id')->references('id')->on('category_permits')->onDelete('CASCADE');

            $table->integer('vehicule_Id')->unsigned()->nullable();
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
        Schema::dropIfExists('category_permit_vehicules');
    }
}
