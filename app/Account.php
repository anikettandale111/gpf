<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'closed_account';
    
    protected $fillable = [
            
           "gpf_no","taluka","department","name","designation","month_interest_payable","last_due_year","feet_interest_payable_month","feet_interest_payable_year","last_subscription_month","last_subscription_year","created_by","modified_by","created_at","updated_at"
    ];
}
