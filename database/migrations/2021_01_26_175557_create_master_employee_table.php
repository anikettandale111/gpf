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
        Schema::dropIfExists('master_employee');
        Schema::create('master_employee', function (Blueprint $table) {
            $table->id();
             $table->string('gpf_no')->nullable();
             $table->integer('employee_id')->nullable();
             $table->string('inital_letter')->nullable();
             $table->integer('classification_id')->nullable();
             $table->integer('taluka_id')->nullable();
             $table->integer('department_id')->nullable();
             $table->string('employee_name')->nullable();
             $table->string('date_of_birth')->nullable();
             $table->integer('designation_id')->nullable();
             $table->string('joining_date')->nullable();
             $table->string('retirement_date')->nullable();
             $table->string('retritment_reason')->nullable();
             $table->string('total_service')->nullable();
             $table->string('profile_photo')->nullable();
             $table->string('c_v_letter')->nullable();
             $table->integer('bank_id')->nullable();
             $table->string('bank_account_no')->nullable();
             $table->string('branch_location')->nullable();
             $table->string('ifsc_code')->nullable();
             $table->double('opening_balance', 10, 2);
             $table->boolean('gpf_no_status')->default(1)->comment('0 No,1 Yes');
             $table->string('attachment_one')->nullable();
             $table->string('attachment_two')->nullable();
             $table->string('attachment_three')->nullable();
             $table->string('attachment_four')->nullable();
             $table->boolean('is_active')->default(1)->comment('0 Inactive,1 Active');
             $table->boolean('is_delete')->default(1)->comment('0 deleted,1 not-deleted');
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
        Schema::dropIfExists('master_employee');
    }
}
