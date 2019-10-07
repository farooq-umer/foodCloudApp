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
        Schema::create('FormAnswers', function (Blueprint $table) {
            $table->bigIncrements('FormAnswerId');
            $table->json('FormAnswer');
            $table->json('FormAnswerDefaultValue')->nullable();
            $table->unsignedBigInteger('FormQuestionId')->index();
            $table->unsignedBigInteger('FormId')->index();
            $table->json('FormAnswerDataJson')->nullable();
            $table->timestamps();
            $table->foreign('FormQuestionId')->references('FormQuestionId')->on('FormQuestions');
            $table->foreign('FormId')->references('FormId')->on('Forms');
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
