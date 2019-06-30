<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentHasCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_has_course', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id'); 
            $table->unsignedBigInteger('course_id'); 
            $table->unique(['student_id', 'course_id']); 

            $table->unsignedInteger('grade'); 
            $table->timestamps(); 

            $table->foreign('student_id')->references('id')->on('student')->onDelete('cascade'); 
            $table->foreign('course_id')->references('id')->on('course')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_has_course');
    }
}
