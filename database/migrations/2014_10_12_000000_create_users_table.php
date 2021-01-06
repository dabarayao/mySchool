<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
      $table->bigIncrements('id');
      $table->string('familyname', 256);
      $table->string('givenname', 256);
      $table->string('email', 256)->unique();
      $table->string('password');
      $table->string('photo', 256)->nullable();
      $table->boolean('gender');
      $table->date('birthdate')->nullable();
      $table->string('dialcode', 100)->nullable();
      $table->integer('phone')->nullable();
      $table->string('country', 100)->nullable();
      $table->string('address')->nullable();
      $table->string('job', 100)->nullable();
      $table->boolean('state')->default(0)->nullable();
      $table->boolean('status')->default(0)->nullable();
      $table->boolean('root')->default(0);
      $table->integer('school_id')->nullable();
      $table->timestamp('email_verified_at')->nullable();
      $table->integer('created_user')->nullable();
      $table->integer('updated_user')->nullable();
      $table->rememberToken();
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

    Schema::dropIfExists('users');
  }
}
