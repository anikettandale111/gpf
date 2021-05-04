<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chalan extends Model
{
    protected $table = "chalan";

    protected $fillable = [

           "id", "year", "primary_number", "taluka", "classification", "gpf_no", "deposit", "partava", "pending_amt", "total", "final_amt_diff", "created_by", "modified_by", "created_at", "updated_at","app_no","month"
    ];
}
