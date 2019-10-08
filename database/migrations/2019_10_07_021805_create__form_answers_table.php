<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_form_answers', function (Blueprint $table) {
            $table->bigIncrements('form_answer_id');
            $table->json('form_answer');
            $table->json('form_answer_default_value')->nullable();
            $table->unsignedBigInteger('form_question_id')->index();
            $table->unsignedBigInteger('form_id')->index();
            $table->json('form_answer_data_json')->nullable();
            $table->timestamps();
            $table->foreign('form_question_id')->references('form_question_id')->on('tbl_form_questions');
            $table->foreign('form_id')->references('form_id')->on('tbl_forms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('FormAnswers');
    }
}
