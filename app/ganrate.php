<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ganrate extends Model
{
      protected $table = 'ganrate_new_number';

    protected $fillable = [

            "classification","gpf_no","taluka_id","department","name","designation","account_no","c_v_letter",
            "date_birth","date_dated","date_of_birthday","created_by","modified_by","yes"
    ];
}
