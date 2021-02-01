<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaySchoolfeesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pay_schoolfees', function (Blueprint $table) {
      $table->id();
      $table->integer('student_id');
      $table->integer('schoolfees_id');
      $table->integer('paid_amount');
      $table->integer('left_amount');
      $table->date('paid_date');
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
    Schema::dropIfExists('pay_schoolfees');
  }
}
