<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDepartmentFonctionContract extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_department_fonction_contract', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->unsigned()->nullable();
            $table->foreign('userId')->references('id')->on('users');

            $table->integer('contractId')->unsigned()->nullable();
            $table->foreign('contractId')->references('id')->on('contracts');
            $table->integer('fonctionId')->unsigned()->nullable();
            $table->foreign('fonctionId')->references('id')->on('fonctions');
            $table->integer('departmentId')->unsigned()->nullable();
            $table->foreign('departmentId')->references('id')->on('departments');

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
        Schema::dropIfExists('user_department_fonction_contract');
    }
}
