<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterRateInterestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('master_rate_interest');
        Schema::create('master_rate_interest', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('year_to');
            $table->string('percent');
            $table->string('from_month');
            $table->string('to_month');
            $table->string('created_by');
            $table->string('modified_by');
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
        Schema::dropIfExists('master_rate_interest');
    }
}
