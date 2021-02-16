<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchooleventsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('schoolevents', function (Blueprint $table) {
      $table->id();
      $table->string('title', 100);
      $table->date('date');
      $table->time('start_hour');
      $table->time('end_hour');
      $table->string('type', 100);
      $table->boolean('ismark')->default(0);
      $table->bigInteger('school_id')->nullable();
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
    Schema::dropIfExists('schoolevents');
  }
}
