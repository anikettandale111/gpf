<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGanrateNewNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ganrate_new_number', function (Blueprint $table) {
            $table->id();
            $table->string('classification');
            $table->string('b_no');
            $table->string('taluka');
            $table->string('department');
            $table->string('name');
            $table->string('designation');
            $table->string('account_no');
            $table->string('c_v_letter');
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
        Schema::dropIfExists('ganrate_new_number');
    }
}
