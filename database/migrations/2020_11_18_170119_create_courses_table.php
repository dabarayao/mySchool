<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('courses', function (Blueprint $table) {

      $table->bigInteger('teacher_id');
      $table->bigInteger('student_id');
      $table->bigInteger('discipline_id');
      $table->integer('status_teacher');
      $table->integer('status_student');
      $table->string('com_status_teacher', 256)->nullable();
      $table->string('com_status_student', 256)->nullable();
      $table->boolean('iscustomcourse')->default(0);
      $table->string('customtitle', 100)->nullable();
      $table->time('custom_start')->nullable();
      $table->time('custom_end')->nullable();
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
    Schema::dropIfExists('courses');
  }
}
