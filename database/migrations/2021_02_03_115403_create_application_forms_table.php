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
            $table->string('application_number');
            $table->string('gpf_no');
            $table->integer('user_id');
            $table->string('user_name');
            $table->integer('user_designation');
            $table->integer('bank_id');
            $table->string('bank_name');
            $table->string('bank_branch');
            $table->string('bank_ifsc');
            $table->double('total_amount',10,2);
            $table->double('required_amount',10,2);
            $table->integer('application_type');
            $table->text('application_reason');
            $table->text('reason_proof');
            $table->boolean('qualify_status')->default(1)->comment('0 NotQualify, 1 Qualify');
            $table->string('total_service_period');
            $table->string('retritment_date');
            $table->integer('staff_id');
            $table->boolean('application_status')->default(1)->comment('1 Pending,2 Approved,3 Rejected');
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
        Schema::dropIfExists('application_forms');
    }
}
