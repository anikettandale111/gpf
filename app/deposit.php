<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deposit extends Model
{
    protected $table = 'deposits';
    
    protected $fillable = [
            
            "Currency_number","App_number","trend_no","Currency_date","Classification","Total_waste","Taluka_code","Select_taluka","amount","Shera","created_at","updated_at",'diff_amount','primary_number'
    ];
}
