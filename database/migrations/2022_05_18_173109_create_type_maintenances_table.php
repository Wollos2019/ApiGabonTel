<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_maintenances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelleTypeEntretien');
            $table->text('descriptionTypeEntretien');

            $table->integer('unitMesureId')->unsigned()->nullable();
            $table->foreign('unitMesureId')->references('id')->on('unit_mesures')->onDelete('cascade');
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
        Schema::dropIfExists('type_maintenances');
    }
}
