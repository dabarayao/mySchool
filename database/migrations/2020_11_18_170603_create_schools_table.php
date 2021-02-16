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
      $table->string('dialcode', 100)->nullable();
      $table->string('phone', 100);
      $table->string('country', 100)->nullable();
      $table->string('area', 256);
      $table->string('address', 256);
      $table->string('type', 100)->nullable();
      $table->integer('nb_room')->nullable();
      $table->string('photo', 256)->nullable();
      $table->date('building_date');
      $table->string('funder', 256);
      $table->integer('quotient')->default(20);;
      $table->boolean('type_monthyear')->default(0);
      $table->boolean('status')->default(1);
      $table->bigInteger('created_user')->nullable();
      $table->bigInteger('updated_user')->nullable();
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
    Schema::dropIfExists('schools');
  }
}
