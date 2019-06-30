<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject');
            $table->string('pdf_material_url')->nullable();
            $table->string('video_material_url')->nullable(); 
            $table->unsignedBigInteger('exam_id'); 
            $table->unsignedBigInteger('lec_id'); 
            $table->timestamps();

            $table->foreign('exam_id')->references('id')->on('exam')->onDelete('cascade'); 
            $table->foreign('lec_id')->references('id')->on('lecturer')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }
}
