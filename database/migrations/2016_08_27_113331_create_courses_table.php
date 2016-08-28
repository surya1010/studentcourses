<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('instructor_id')->unsigned();
             $table->integer('payment_id')->unsigned();
             $table->integer('student_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
            $table->foreign('instructor_id')
                    ->references('id')
                    ->on('instructors')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('payment_id')
                    ->references('id')
                    ->on('payments')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('student_id')
                    ->references('id')
                    ->on('students')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
