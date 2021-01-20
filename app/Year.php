<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = 'master_rate_interest';
    
    protected $fillable = [
        "year","percent","from_month","to_month","created_by","modified_by","created_at","updated_at"
    ];

}
