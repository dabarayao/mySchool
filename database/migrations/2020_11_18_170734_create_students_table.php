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
      $table->boolean('gender');
      $table->string('dialcode', 100)->nullable();
      $table->string('phone', 100);
      $table->string('country', 100)->nullable();
      $table->string('address', 256);
      $table->boolean('is_fired')->default(0);
      $table->boolean('is_redoubling')->default(0);
      $table->boolean('is_oriented')->default(0);
      $table->boolean('is_handicap')->default(0);
      $table->integer('oriented_percent')->nullable();
      $table->string('label_handicap', 100)->nullable();
      $table->string('desc_handicap', 256)->nullable();
      $table->bigInteger('classroom_id');
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
    Schema::dropIfExists('students');
  }
}
