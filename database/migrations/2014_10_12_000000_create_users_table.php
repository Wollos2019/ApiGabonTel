<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('birthday')->nullable();
            $table->string('placeBirth')->nullable();

            $table->enum('marital',User::MARITAL)->default('SINGLE');

            $table->string('phone')->nullable();
            $table->integer('numberChild')->nullable();
            $table->string('address')->nullable();
            $table->string('courriel')->nullable();

            $table->string('town')->nullable();
            $table->string('country')->nullable();
            $table->string('cni')->nullable();
            $table->string('cnps')->nullable();
            $table->boolean('isAdmin')->default(0);
            $table->enum('status',User::STATUS)->default('ENABLE');
            $table->string('email')->unique();
            $table->float('salary',20)->nullable();


            $table->string('photo')->nullable();

            $table->date('dateStart')->nullable();
            $table->date('dateEnd')->nullable();


            $table->enum('gender',User::GENDER)->default('MALE');
            $table->string('password')->nullable();

            $table->timestamp('email_verified_at')->nullable();



            $table->integer('civilityId')->unsigned()->nullable();
            $table->foreign('civilityId')->references('id')->on('civilities')->onDelete('RESTRICT');
            $table->integer('regionId')->unsigned()->nullable();
            $table->foreign('regionId')->references('id')->on('regions')->onDelete('RESTRICT');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
