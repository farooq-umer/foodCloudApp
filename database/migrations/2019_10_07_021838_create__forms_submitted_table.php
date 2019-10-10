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
        Schema::create('tbl_forms_submitted', function (Blueprint $table) {
            $table->bigIncrements('form_submitted_id');
            $table->unsignedBigInteger('form_id')->index();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('form_status_id')->index();
            $table->string('form_submitted_unique_code');
            $table->text('form_submitted_comments')->nullable();
            $table->json('form_submitted_data_json')->nullable();
            $table->timestamps();
            $table->foreign('form_id')->references('form_id')->on('tbl_forms');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('form_status_id')->references('form_status_id')->on('tbl_form_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_forms_submitted');
    }
}
