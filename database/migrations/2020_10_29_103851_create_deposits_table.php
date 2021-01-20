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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->string('Currency_number');
            $table->string('App_number');
            $table->string('Currency_date');
            $table->string('Classification');
            $table->string('Total_waste');
            $table->string('Taluka_code');
            $table->string('Select_taluka');
            $table->string('The_amount');
            $table->text('Shera');
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
