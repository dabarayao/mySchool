<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

          Schema::table('averages', function (Blueprint $table) {
            //
            $table->foreign('monthverage_id')
            ->references('id')
            ->on('monthverages')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });


        Schema::table('chats', function (Blueprint $table) {
          //
          $table->foreign('school_id')
          ->references('id')
          ->on('schools')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->foreign('kins_id')
          ->references('id')
          ->on('kins')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->foreign('chats_id')
          ->references('id')
          ->on('chats')
          ->onDelete('cascade')
          ->onUpdate('cascade');
      });


        Schema::table('monthverages', function (Blueprint $table) {
          //
          $table->foreign('yearverage_id')
          ->references('id')
          ->on('yearverages')
          ->onDelete('cascade')
          ->onUpdate('cascade');
      });


        Schema::table('classrooms', function (Blueprint $table) {
          //
          $table->foreign('school_id')
          ->references('id')
          ->on('schools')
          ->onDelete('cascade')
          ->onUpdate('cascade');
        });


        Schema::table('courses', function (Blueprint $table) {
          //
          $table->foreign('teacher_id')
          ->references('id')
          ->on('teachers')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->foreign('student_id')
          ->references('id')
          ->on('students')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->foreign('discipline_id')
          ->references('id')
          ->on('disciplines')
          ->onDelete('cascade')
          ->onUpdate('cascade');
        });


        Schema::table('fills', function (Blueprint $table) {
          //
          $table->foreign('teacher_id')
          ->references('id')
          ->on('teachers')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->foreign('textbook_id')
          ->references('id')
          ->on('textbooks')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->foreign('discipline_id')
          ->references('id')
          ->on('disciplines')
          ->onDelete('cascade')
          ->onUpdate('cascade');
        });


        Schema::table('follows', function (Blueprint $table) {
          //
          $table->foreign('teacher_id')
          ->references('id')
          ->on('teachers')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->foreign('classroom_id')
          ->references('id')
          ->on('classrooms')
          ->onDelete('cascade')
          ->onUpdate('cascade');
        });


        Schema::table('marks', function (Blueprint $table) {
          //
          $table->foreign('teacher_id')
          ->references('id')
          ->on('teachers')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->foreign('student_id')
          ->references('id')
          ->on('students')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->foreign('discipline_id')
          ->references('id')
          ->on('disciplines')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->foreign('classroom_id')
          ->references('id')
          ->on('classrooms')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->foreign('average_id')
          ->references('id')
          ->on('classrooms')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->foreign('typemark_id')
          ->references('id')
          ->on('classrooms')
          ->onDelete('cascade')
          ->onUpdate('cascade');
        });


        Schema::table('students', function (Blueprint $table) {
          //
          $table->foreign('classroom_id')
          ->references('id')
          ->on('classrooms')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->foreign('kins_id')
          ->references('id')
          ->on('kins')
          ->onDelete('cascade')
          ->onUpdate('cascade');
        });


        Schema::table('teaches', function (Blueprint $table) {
          //
          $table->foreign('teacher_id')
          ->references('id')
          ->on('teachers')
          ->onDelete('cascade')
          ->onUpdate('cascade');

          $table->foreign('discipline_id')
          ->references('id')
          ->on('disciplines')
          ->onDelete('cascade')
          ->onUpdate('cascade');
        });


        Schema::table('textbooks', function (Blueprint $table) {
          //
          $table->foreign('classroom_id')
          ->references('id')
          ->on('classrooms')
          ->onDelete('cascade')
          ->onUpdate('cascade');
        });


        Schema::table('users', function (Blueprint $table) {
          //
          $table->foreign('school_id')
          ->references('id')
          ->on('users')
          ->onDelete('cascade')
          ->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('tables', function (Blueprint $table) {
        //
      });
    }
}
