<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deposit extends Model
{
    protected $table = 'deposits';

    protected $fillable = [

           "year","chalan_no","App_no","trend_no","chalan_date","classification","total_waste",
            "taluka_code","select_taluka","amount","shera","created_at","updated_at",'diff_amount','primary_number'
    ];
}
