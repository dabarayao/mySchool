<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('students', function (Blueprint $table) {
      $table->id();
      $table->string('reg_number', 100);
      $table->string('familyname', 100);
      $table->string('givenname', 256);
      $table->string('photo', 100)->nullable();
      $table->date('birthdate');
      $table->string('dialcode', 100)->nullable();
      $table->integer('phone');
      $table->string('country', 100)->nullable();
      $table->string('address', 256);
      $table->boolean('is_oriented')->nullable();
      $table->boolean('is_handicap')->nullable();
      $table->integer('oriented_percent')->nullable();
      $table->string('label_handicap', 100)->nullable();
      $table->string('desc_handicap', 256)->nullable();
      $table->integer('classroom_id');
      $table->integer('created_user');
      $table->integer('updated_user');
      $table->integer('deleted_user')->nullable();
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
    Schema::dropIfExists('students');
  }
}
