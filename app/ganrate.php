<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ganrate extends Model
{
    protected $table = 'ganrate_new_number';

    protected $fillable = [
        "id",
        "gpf_n",
        "employee_i",
        "inital_lette",
        "classification_i",
        "taluka_i",
        "department_i",
        "employee_nam",
        "date_of_birt",
        "designation_i",
        "joining_dat",
        "retirement_dat",
        "retritment_reaso",
        "total_servic",
        "profile_phot",
        "c_v_lette",
        "bank_i",
        "bank_account_n",
        "branch_locatio",
        "ifsc_cod",
        "gpf_no_statu",
        "is_activ",
        "is_delet",
        "created_at",
        "updated_at"
    ];
}
