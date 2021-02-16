<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassDisciplinesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('class_disciplines', function (Blueprint $table) {
      $table->bigInteger('classroom_id');
      $table->bigInteger('discipline_id');
      $table->integer('coef');
      $table->integer('nb_student');
      $table->integer('day');
      $table->time('start_hour');
      $table->time('end_hour');
      $table->bigInteger('schoolyear_id');
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
    Schema::dropIfExists('class_disciplines');
  }
}
