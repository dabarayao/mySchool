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
      $table->string('dialcode', 100)->nullable();
      $table->integer('phone');
      $table->date('birthdate');
      $table->string('country', 100)->nullable();
      $table->string('address', 256)->nullable();
      $table->string('job', 100)->nullable();
      $table->boolean('state')->default(0)->nullable();
      $table->bigInteger('school_id');
      $table->bigInteger('created_user');
      $table->bigInteger('updated_user');
      $table->bigInteger('deleted_user')->nullable();
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
