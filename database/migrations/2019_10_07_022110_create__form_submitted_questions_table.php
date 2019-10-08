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
        Schema::create('tbl_form_submitted_questions', function (Blueprint $table) {
            $table->bigIncrements('form_submitted_question_id');
            $table->unsignedBigInteger('form_question_id')->index();
            $table->unsignedBigInteger('form_answer_id')->index();
            $table->unsignedBigInteger('form_submitted_id');
            $table->foreign('form_question_id')->references('form_question_id')->on('tbl_form_questions');
            $table->foreign('form_answer_id')->references('form_answer_id')->on('tbl_form_answers');
            $table->foreign('form_submitted_id')->references('form_submitted_id')->on('tbl_forms_submitted');
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
