<?php

use App\Models\Recrutement;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecrutementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recrutements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("poste")->nullable();
            $table->float("experienceProfessionnelle")->nullable();
            $table->enum("experiencetype",Recrutement::TYPE_EXPERIENCE)->default('ANNEE');
            $table->enum("typeContrat",Recrutement::TYPE_CONTRAT)->default('CDD');
            $table->string('nationalite')->nullable();
            $table->integer('ageLimite')->nullable();
            $table->integer('nombrePoste')->nullable();
            $table->string('noteServiceDg')->nullable();
            $table->dateTime('dateEntretien')->nullable();
            $table->dateTime('dateLimiteCandidature')->nullable();
            $table->dateTime('dateTestPsychotechnique')->nullable();



            $table->foreign('profilId')->references('id')->on('profils')->onDelete('cascade');
            $table->unsignedBigInteger('profilId')->nullable();

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
        Schema::dropIfExists('recrutements');
    }
}
