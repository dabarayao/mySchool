<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentKinsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('student_kins', function (Blueprint $table) {
      $table->id();
      $table->integer('student_id');
      $table->integer('kins_id');
      $table->integer('relationship')->nullable();
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
    Schema::dropIfExists('student_kins');
  }
}
