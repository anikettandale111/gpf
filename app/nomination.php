<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nomination extends Model
{
     protected $table = 'nomination_record';
    
    protected $fillable = [
            
        "p_no","taluka","department","name","designation","application_date","letter_no","order_no","dismissal_no","office_transfer","money_name","replacement_p_no","carbin_copy_a","carbin_copy_b","carbin_copy_c","last_purpose","district_transfer_date","created_by","modified_by","created_at","updated_at"
    ];
}
