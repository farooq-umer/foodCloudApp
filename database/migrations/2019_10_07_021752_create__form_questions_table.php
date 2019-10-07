<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FormQuestions', function (Blueprint $table) {
            $table->bigIncrements('FormQuestionId');
            $table->string('FormQuestion');
            $table->unsignedBigInteger('FormQuestionTypeId');
            $table->unsignedBigInteger('FormId')->index();
            $table->boolean('IsMandatory');
            $table->boolean('IsActive');
            $table->json('FormQuestionDataJson')->nullable();
            $table->timestamps();
            $table->foreign('FormQuestionTypeId')->references('FormQuestionTypeId')->on('FormQuestionTypes');
            $table->foreign('FormId')->references('FormId')->on('Forms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('FormQuestions');
    }
}
