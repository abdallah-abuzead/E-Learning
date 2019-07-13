<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_option', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value'); 
            $table->unsignedBigInteger('quest_id');
            $table->boolean('true_false')->default(0);
            $table->timestamps();

            $table->foreign('quest_id')->references('id')->on('question')->onDelete('cascade')->onUpdate('cascade'); 
        });

        Schema::table('question', function (Blueprint $table) {
            $table->foreign('correct_ans')->references('id')->on('question_option')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_option');
    }
}
