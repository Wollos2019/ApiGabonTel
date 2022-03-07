<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->nullable();
            $table->text("description")->nullable();

            $table->integer("test")->nullable()->comment('nombre essai');
            $table->integer("term")->nullable()->comment('duree de essai');
            $table->enum("termMeasure",['d','s','m','y'])->default('m')->comment('mesure de la duree ');
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
        Schema::dropIfExists('contracts');
    }
}
