<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('marks', function (Blueprint $table) {
      $table->id();
      $table->double('value');
      $table->integer('coef');
      $table->double('total');
      $table->integer('teacher_id');
      $table->integer('student_id');
      $table->integer('discipline_id');
      $table->integer('classroom_id');
      $table->integer('average_id');
      $table->integer('schoolyear_id');
      $table->integer('typemark_id');
      $table->string('remark', 100);
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
    Schema::dropIfExists('marks');
  }
}
