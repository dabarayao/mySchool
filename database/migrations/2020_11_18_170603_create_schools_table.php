<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('schools', function (Blueprint $table) {
      $table->id();
      $table->string('name', 256);
      $table->integer('phone');
      $table->string('country', 100)->nullable();
      $table->string('area', 256);
      $table->string('town', 256);
      $table->string('city', 256);
      $table->string('type', 100)->nullable();
      $table->integer('nb_room')->nullable();
      $table->string('photo', 256);
      $table->date('building_date');
      $table->string('funder', 256);
      $table->boolean('status')->default(1)->nullable();
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
    Schema::dropIfExists('schools');
  }
}
