<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationsForms extends Model
{
    protected $table = 'application_forms';

    protected $fillable = [

        "app_form_id",
        "application_number",
        "gpf_no",
        "user_id",
        "user_empid",
        "user_name",
        "user_designation",
        "user_designation_id",
        "user_department",
        "user_department_id",
        "bank_id",
        "bank_account_no",
        "bank_name",
        "bank_branch",
        "bank_ifsc",
        "total_amount",
        "required_amount",
        "application_type",
        "application_reason",
        "reason_proof",
        "qualify_status",
        "total_service_period",
        "user_joining_date",
        "retritment_date",
        "user_account_stmt",
        "application_status",
        "is_active",
        "is_delete",
        "created_at",
        "updated_at"
    ];
}
