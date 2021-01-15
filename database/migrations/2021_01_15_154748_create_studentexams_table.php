<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentexamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentexams', function (Blueprint $table) {
            $table->integer('exam_id');
            $table->integer('student_id');
            $table->double('total');
            $table->double('avg');
            $table->boolean('ispass');
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
        Schema::dropIfExists('studentexams');
    }
}
