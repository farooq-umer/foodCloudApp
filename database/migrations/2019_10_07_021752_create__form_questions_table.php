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
        Schema::create('tbl_form_questions', function (Blueprint $table) {
            $table->bigIncrements('form_question_id');
            $table->string('form_question');
            $table->unsignedBigInteger('form_question_type_id');
            $table->unsignedBigInteger('form_id')->index();
            $table->boolean('is_mandatory')->default(0);
            $table->boolean('is_active')->default(1);
            $table->json('form_question_data_json')->nullable();
            $table->timestamps();
            $table->foreign('form_question_type_id')->references('form_question_type_id')->on('tbl_form_question_types');
            $table->foreign('form_id')->references('form_id')->on('tbl_forms');
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
