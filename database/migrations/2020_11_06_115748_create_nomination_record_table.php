<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominationRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomination_record', function (Blueprint $table) {
            $table->id();
            $table->string('p_no')->nullable();
            $table->string('taluka')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('application_date')->nullable();
            $table->string('letter_no')->nullable();
            $table->string('order_no')->nullable();
            $table->string('dismissal_no')->nullable();
            $table->string('office_transfer')->nullable();
            $table->string('money_name')->nullable();
            $table->string('replacement_p_no')->nullable();
            $table->text('carbin_copy_a')->nullable();
            $table->text('carbin_copy_b')->nullable();
            $table->text('carbin_copy_c')->nullable();
            $table->string('last_purpose')->nullable();
            $table->string('district_transfer_date')->nullable();
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
        Schema::dropIfExists('nomination_record');
    }
}
