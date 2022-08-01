<?php

use App\Models\commande;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->text('contenu')->nullable();
            $table->string("nomClient", 191)->nullable();
            $table->unsignedInteger('idClient');
            $table->foreign('idClient')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('idComDet')->nullable();
            
            $table->timestamps();
            $table->string('evaluated', 50)->nullable();
            $table->string('invoiced', 50)->nullable();
            $table->string('selected', 50)->nullable();
            $table->enum('status',commande::STATUS)->default('ENABLE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
