<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChalanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chalan', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('month');
            $table->string('app_no');
            $table->string('primary_number');
            $table->string('taluka');
            $table->string('department');
            $table->string('gpf_no');
            $table->string('deposit');
            $table->string('partava');
            $table->string('pending_amt');
            $table->string('total');
            $table->string('final_amt_diff');
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
        Schema::dropIfExists('chalan');
    }
}
