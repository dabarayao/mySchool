<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('teaches', function (Blueprint $table) {
      $table->integer('teacher_id');
      $table->integer('discipline_id');
      $table->integer('nb_classroom')->nullable();
      $table->integer('created_user');
      $table->integer('updated_user');
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
    Schema::dropIfExists('teaches');
  }
}
