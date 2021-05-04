<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClosedAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('closed_account', function (Blueprint $table) {
            $table->id();
            $table->string('gpf_no');
            $table->string('taluka')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('month_interest_payable')->nullable();
            $table->string('last_due_year')->nullable();
            $table->string('feet_interest_payable_month')->nullable();
            $table->string('feet_interest_payable_year')->nullable();
            $table->string('last_subscription_month')->nullable();
            $table->string('last_subscription_year')->nullable();
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
        Schema::dropIfExists('closed_account');
    }
}
