<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYearveragesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('yearverages', function (Blueprint $table) {
      $table->id();
      $table->integer('value');
      $table->string('congrat', 100);
      $table->integer('year');
      $table->integer('yearverage_id');
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
    Schema::dropIfExists('yearverages');
  }
}
