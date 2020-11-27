<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kins', function (Blueprint $table) {
            $table->id();
            $table->string('familyname', 100);
            $table->string('givenname', 256);
            $table->string('photo', 100)->nullable();
            $table->string('email')->unique();
            $table->string('password', 100);
            $table->boolean('gender');
            $table->integer('phone');
            $table->date('birthdate');
            $table->string('address', 256);
            $table->boolean('state')->default(0)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('kins');
    }
}
