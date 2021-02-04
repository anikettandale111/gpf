<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ganrate extends Model
{
      protected $table = 'ganrate_new_number';

    protected $fillable = ["gpf_no","employee_id","inital_letter","classification","taluka_id","department_id","employee_name",
                            "date_of_birth","designation_id","joining_date","retirement_date","retritment_reason","total_service","profile_photo","c_v_letter","bank_id","bank_account_no","branch_location","ifsc_code","gpf_no_status","is_active","is_delete"
                          ];
}
