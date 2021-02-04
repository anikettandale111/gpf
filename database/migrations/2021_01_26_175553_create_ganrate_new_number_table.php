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
        Schema::dropIfExists('ganrate_new_number');
        Schema::create('ganrate_new_number', function (Blueprint $table) {
            $table->id();
            $table->string('gpf_no');
            $table->string('employee_id');
            $table->string('inital_letter');
            $table->string('classification');
            $table->string('taluka_id');
            $table->string('department_id');
            $table->string('employee_name');
            $table->string('date_of_birth');
            $table->string('designation_id');
            $table->string('joining_date');
            $table->string('retirement_date')->nullable();
            $table->string('retritment_reason')->nullable();
            $table->string('total_service')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('c_v_letter');
            $table->string('bank_id');
            $table->string('bank_account_no');
            $table->string('branch_location');
            $table->string('ifsc_code');
            $table->boolean('gpf_no_status')->default(1)->comment('0 No,1 Yes');
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
        Schema::dropIfExists('ganrate_new_number');
    }
}
