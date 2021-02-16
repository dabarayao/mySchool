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
      $table->bigInteger('student_id');
      $table->bigInteger('schoolfees_id');
      $table->integer('paid_amount');
      $table->integer('left_amount');
      $table->date('paid_date');
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
    Schema::dropIfExists('pay_schoolfees');
  }
}
