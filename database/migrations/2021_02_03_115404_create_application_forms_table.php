<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('application_forms');
        Schema::create('application_forms', function (Blueprint $table) {
            $table->id('app_form_id');
            $table->string('application_number')->nullable();
            $table->string('gpf_no')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('user_empid')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_designation')->nullable();
            $table->integer('user_designation_id')->nullable();
            $table->string('user_department')->nullable();
            $table->integer('user_department_id')->nullable();
            $table->integer('bank_id')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_ifsc')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('required_amount')->nullable();
            $table->string('application_type')->nullable();
            $table->string('application_reason')->nullable();
            $table->string('reason_proof')->nullable();
            $table->boolean('qualify_status')->default(1)->comment('0 NotQualify ,1 Qualify');
            $table->string('total_service_period')->nullable();
            $table->string('user_joining_date')->nullable();
            $table->string('retritment_date')->nullable();
            $table->string('user_account_stmt')->nullable();
            $table->boolean('application_status')->default(1)->comment('1 Pending,2 Approved,3 Rejected');
            $table->boolean('is_active')->default(1)->comment('0 Inactive,1 Active');
            $table->boolean('is_delete')->default(1)->comment('0 deleted,1 deleted');
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
        Schema::dropIfExists('application_forms');
    }
}
