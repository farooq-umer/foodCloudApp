<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormSubmittedQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FormSubmittedQuestions', function (Blueprint $table) {
            $table->bigIncrements('FormSubmittedQuestionId');
            $table->unsignedBigInteger('FormQuestionId')->index();
            $table->unsignedBigInteger('FormAnswerId')->index();
            $table->unsignedBigInteger('FormSubmittedId');
            $table->foreign('FormQuestionId')->references('FormQuestionId')->on('FormQuestions');
            $table->foreign('FormAnswerId')->references('FormAnswerId')->on('FormAnswers');
            $table->foreign('FormSubmittedId')->references('FormSubmittedId')->on('FormsSubmitted');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('FormSubmittedQuestions');
    }
}
