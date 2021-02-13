<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'master_employee';

    protected $fillable = [
        "id", "gpf_no", "employee_id", "inital_letter", "classification_id", "taluka_id", "department_id", "employee_name", "date_of_birth", "designation_id", "joining_date", "retirement_date", "retritment_reason", "total_service", "profile_photo", "c_v_letter", "bank_id", "bank_account_no", "branch_location", "ifsc_code",
        "opening_balance", "gpf_no_status", "attachment_one", "attachment_two", "attachment_three", "attachment_four", "is_active", "is_delete", "created_at", "updated_at"
    ];
}
