<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chalan extends Model
{
    protected $table = "chalan";
    
    protected $fillable = [
            
           "id", "year", "primary_number", "taluka", "department", "gpf_number", "deposit", "partava", "pending_amt", "total", "final_amt_diff", "created_by", "modified_by", "created_at", "updated_at","trend_no","month"
    ];
}
