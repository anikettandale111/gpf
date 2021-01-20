<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer_registrations';
    
    protected $fillable = [
            
            "gpf_no","taluka","department","name","designation","classification","date_birth","date_dated","retirement_date","bank_name","branch","IFSC_code","account_no","created_at","updated_at"
    ];
}
