<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('deposits');
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('chalan_no');
            $table->string('app_no');
            $table->string('chalan_date');
            $table->string('classification');
            $table->string('total_waste');
            $table->string('taluka_code');
            $table->string('taluka');
            $table->string('amount');
            $table->text('shera');
            $table->string('diff_amount');
            $table->string('primary_number');
            $table->string('created_by')->nullable();
            $table->string('modified_by')->nullable();
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
        Schema::dropIfExists('deposits');
    }
}
