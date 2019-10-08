<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_forms', function (Blueprint $table) {
            $table->bigIncrements('form_id');
            $table->string('form_name');
            $table->string('form_description')->nullable();
            $table->boolean('is_active');
            $table->unsignedBigInteger('form_type_id')->index();
            $table->json('form_data_json')->nullable();
            $table->timestamps();
            $table->foreign('form_type_id')->references('form_type_id')->on('tbl_form_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Forms');
    }
}
