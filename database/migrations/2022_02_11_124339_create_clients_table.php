<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nom")->nullable();
            $table->string("prenom")->nullable();
            $table->string("adresse")->nullable();
            $table->string("email")->unique();
            $table->string("telephone")->nullable();
            $table->enum('gender',User::GENDER)->default('MALE');
            $table->string('town')->nullable();
            $table->string('country')->nullable();

            $table->integer('civilityId')->unsigned()->nullable();
            $table->foreign('civilityId')->references('id')->on('civilities')->onDelete('RESTRICT');
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
        Schema::dropIfExists('clients');
    }
}
