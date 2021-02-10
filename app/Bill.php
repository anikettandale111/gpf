<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bill_information";

    protected $fillable = [

           "id", "bill_no", "bill_date", "amount", "bill_check", "check_date",
           "check_no", "created_at", "updated_at"
    ];
}
