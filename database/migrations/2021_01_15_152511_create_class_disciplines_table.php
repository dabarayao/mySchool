<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_disciplines', function (Blueprint $table) {
            $table->integer('classroom_id');
            $table->integer('discipline_id');
            $table->integer('nb_student');
            $table->integer('day');
            $table->time('start_hour');
            $table->time('end_hour');
            $table->integer('schoolyear_id');
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
        Schema::dropIfExists('class_disciplines');
    }
}
