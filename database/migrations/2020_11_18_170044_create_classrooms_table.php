<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('classrooms', function (Blueprint $table) {
      $table->id();
      $table->string('label', 100);
      $table->string('code', 100);
      $table->string('description', 100);
      $table->integer('nb_student')->nullable();
      $table->integer('nb_teacher')->nullable();
      $table->boolean('isexam')->default(0);
      $table->bigInteger('school_id');
      $table->bigInteger('exam_id')->nullable();
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
    Schema::dropIfExists('classrooms');
  }
}
