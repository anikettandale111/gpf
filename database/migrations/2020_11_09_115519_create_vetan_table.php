<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVetanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vetan', function (Blueprint $table) {
            $table->id();
            $table->string('vetan')->nullable();
            $table->string('gpf_no');
            $table->string('taluka')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('hapta_no')->nullable();
            $table->string('chalna_no')->nullable();
            $table->string('month_hapta')->nullable();
            $table->string('chalna_amount')->nullable();
            $table->string('digging')->nullable();
            $table->string('difference')->nullable();
            $table->string('from_interest_date')->nullable(); 
            $table->string('until_date')->nullable();
            $table->string('difference_amount')->nullable();
            $table->string('different_interest')->nullable();
            $table->string('charging_interest')->nullable();
            $table->string('created_by')->nullable();
            $table->string('modified_by')->nullable();
            $table->text('shera')->nullable();
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
        Schema::dropIfExists('vetan');
    }
}
