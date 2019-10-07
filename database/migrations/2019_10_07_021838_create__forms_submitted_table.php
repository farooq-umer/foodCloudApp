<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsSubmittedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FormsSubmitted', function (Blueprint $table) {
            $table->bigIncrements('FormSubmittedId');
            $table->unsignedBigInteger('FormId')->index();
            $table->unsignedBigInteger('UserId');
            $table->unsignedBigInteger('FormStatusId')->index();
            $table->string('FormSubmittedUniqueCode');
            $table->text('Comments')->nullable();
            $table->json('FormSubmittedDataJson')->nullable();
            $table->timestamps();
            $table->foreign('FormId')->references('FormId')->on('Forms');
            $table->foreign('UserId')->references('id')->on('users');
            $table->foreign('FormStatusId')->references('FormStatusId')->on('FormStatuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('FormsSubmitted');
    }
}
