<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('familyname', 256);
            $table->string('givenname', 256);
            $table->string('email', 256)->unique();
            $table->string('password');
            $table->string('photo', 256)->nullable();
            $table->boolean('gender');
            $table->date('birthdate')->nullable();
            $table->integer('phone')->nullable();
            $table->string('address')->nullable();
            $table->boolean('state')->default(0)->nullable();
            $table->boolean('status')->default(1)->nullable();
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
        Schema::dropIfExists('admins');
    }
}
