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
      $table->boolean('isbonus')->nullable();
      $table->bigInteger('teacher_id');
      $table->bigInteger('student_id');
      $table->bigInteger('discipline_id');
      $table->bigInteger('classroom_id');
      $table->bigInteger('average_id')->nullable();
      $table->bigInteger('monthyear_id');
      $table->bigInteger('schoolyear_id');
      $table->bigInteger('typemark_id');
      $table->string('remark', 100);
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
    Schema::dropIfExists('marks');
  }
}
