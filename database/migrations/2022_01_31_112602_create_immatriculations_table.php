<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImmatriculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immatriculations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("cv")->nullable();
            $table->string("cni")->nullable();
            $table->string("contratEmbaiuche")->nullable();
            $table->string("diplome")->nullable();
            $table->string("attestationsCV")->nullable();
            $table->string("acteMariage")->nullable();
            $table->string("photo")->nullable();
            $table->string("matricule")->nullable();

            $table->string("acteNaissance")->nullable();
            $table->string("casierJudiciere")->nullable();
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
        Schema::dropIfExists('immatriculations');
    }
}
