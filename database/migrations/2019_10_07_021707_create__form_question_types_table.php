<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormQuestionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_form_question_types', function (Blueprint $table) {
            $table->bigIncrements('form_question_type_id');
            $table->string('form_question_type_name');
            $table->string('form_question_type_description')->nullable();
            $table->string('form_question_type_code', 50)->unique();
            $table->json('form_question_type_data_json')->nullable();
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
        Schema::dropIfExists('tbl_form_question_types');
    }
}
