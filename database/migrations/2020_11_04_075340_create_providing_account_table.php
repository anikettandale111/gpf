<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidingAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providing_account', function (Blueprint $table) {
            $table->id();
            $table->string('gpf_no');
            $table->string('classification');
            $table->string('taluka');
            $table->string('department');
            $table->string('name');
            $table->string('designation');
            $table->string('account_no');
            $table->string('date_of_birthday');
            $table->string('date_birth');
            $table->string('date_dated');
            $table->string('c_v_letter');
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
        Schema::dropIfExists('providing_account');
    }
}
