<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_form_statuses', function (Blueprint $table) {
            $table->bigIncrements('form_status_id');
            $table->string('form_status_name', 100);
            $table->string('form_status_description')->nullable();
            $table->string('form_status_code', 50)->unique();
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
        Schema::dropIfExists('FormStatuses');
    }
}
