<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('chats', function (Blueprint $table) {
      $table->id();
      $table->integer('school_id');
      $table->integer('kins_id');
      $table->text('message');
      $table->boolean('read_status')->default(0);
      $table->integer('datatype')->default(1);
      $table->integer('chats_id')->nullable();
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
    Schema::dropIfExists('chats');
  }
}
