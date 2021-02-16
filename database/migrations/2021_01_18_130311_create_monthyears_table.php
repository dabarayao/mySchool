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
      $table->date('start_date')->nullable();
      $table->date('end_date')->nullable();
      $table->boolean('is_over')->default(0);
      $table->integer('coef');
      $table->integer('rank')->nullable();
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
    Schema::dropIfExists('monthyears');
  }
}
