<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAveragesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('averages', function (Blueprint $table) {
      $table->id();
      $table->double('value');
      $table->string('congrat', 100);
      $table->integer('coef');
      $table->bigInteger('monthyear_id');
      $table->bigInteger('schoolyear_id');
      $table->bigInteger('monthverage_id');
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
    Schema::dropIfExists('averages');
  }
}
