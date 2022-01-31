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
            $table->bigIncrements('id');
            $table->string("nom")->nullable();
            $table->string("prenom")->nullable();
            $table->enum("sexe",Family::SEX)->default('HOMME');
            $table->string("acteNaissance")->nullable();
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('userId')->nullable();

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
