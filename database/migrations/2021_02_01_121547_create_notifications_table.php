<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('notifications', function (Blueprint $table) {
      $table->id();
      $table->integer('title')->nullable();
      $table->string('message', 256)->nullable();
      $table->integer('kins_id');
      $table->boolean('is_payreminder');
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
    Schema::dropIfExists('notifications');
  }
}
