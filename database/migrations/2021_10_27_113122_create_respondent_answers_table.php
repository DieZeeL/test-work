<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespondentAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respondent_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('respondent_id')->index();
            $table->foreign('respondent_id')
                ->references('id')
                ->on('respondents')
                ->onDelete('cascade');
            $table->unsignedBigInteger('survey_id');
            $table->foreign('survey_id')
                ->references('id')
                ->on('surveys')
                ->onDelete('cascade');
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');
            $table->unsignedBigInteger('answer_id');
            $table->foreign('answer_id')
                ->references('id')
                ->on('answers')
                ->onDelete('cascade');
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
        Schema::dropIfExists('respondent_answers');
    }
}
