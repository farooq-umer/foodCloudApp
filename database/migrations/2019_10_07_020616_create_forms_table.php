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
        Schema::create('Forms', function (Blueprint $table) {
            $table->bigIncrements('FormId');
            $table->string('FormName');
            $table->string('FormDescription')->nullable();
            $table->boolean('IsActive');
            $table->unsignedBigInteger('FormTypeId')->index();
            $table->json('FormDataJson')->nullable();
            $table->timestamps();
            $table->foreign('FormTypeId')->references('FormTypeId')->on('FormTypes');
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
