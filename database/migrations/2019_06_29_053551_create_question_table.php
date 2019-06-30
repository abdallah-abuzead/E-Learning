<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('head'); 
            $table->string('correct_ans'); 
            $table->unsignedInteger('mark'); 
            $table->unsignedBigInteger('exam_id'); 
            $table->timestamps(); 

            $table->foreign('exam_id')->references('id')->on('exam')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question');
    }
}
