<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('teachers', function (Blueprint $table) {
      $table->id();
      $table->string('familyname', 100);
      $table->string('givename', 256);
      $table->string('photo', 100)->nullable();
      $table->date('birthdate');
      $table->boolean('gender');
      $table->string('dialcode', 100)->nullable();
      $table->integer('phone');
      $table->string('country', 100)->nullable();
      $table->string('address', 256);
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
    Schema::dropIfExists('teachers');
  }
}
