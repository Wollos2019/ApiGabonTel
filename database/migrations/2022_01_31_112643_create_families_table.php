<?php

use App\Models\Family;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nom")->nullable();
            $table->string("prenom")->nullable();
            $table->enum("sexe",Family::SEX)->default('HOMME');
            $table->string("birthday")->nullable();
          //  $table->integer('userId')->unsigned();
           // $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');


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
        Schema::dropIfExists('families');
    }
}
