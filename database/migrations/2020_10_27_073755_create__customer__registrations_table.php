<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('customer_registrations');
        Schema::create('customer_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('gpf_no');
            $table->string('taluka');
            $table->string('department');
            $table->string('name');
            $table->string('designation');
            $table->string('classification');
            $table->string('date_birth');
            $table->string('date_dated');
            $table->string('initial_balance');
            $table->string('retirement_date');
            $table->string('bank');
            $table->string('branch');
            $table->string('IFSC_code');
            $table->string('account_no');
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
        Schema::dropIfExists('Customer_Registrations');
    }
}
