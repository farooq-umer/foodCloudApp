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
        Schema::create('FormQuestionTypes', function (Blueprint $table) {
            $table->bigIncrements('FormQuestionTypeId');
            $table->string('FormQuestionType');
            $table->string('FormQuestionTypeDescription')->nullable();
            $table->string('FormQuestionTypeCode', 50);
            $table->json('FormQuestionTypeDataJson')->nullable();
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
        Schema::dropIfExists('FormQuestionTypes');
    }
}
