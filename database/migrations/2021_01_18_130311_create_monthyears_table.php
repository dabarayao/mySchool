<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthyearsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('monthyears', function (Blueprint $table) {
      $table->id();
      $table->date('start_date');
      $table->date('end_date');
      $table->boolean('is_over');
      $table->integer('coef');
      $table->integer('schoolyear_id');
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
    Schema::dropIfExists('monthyears');
  }
}
