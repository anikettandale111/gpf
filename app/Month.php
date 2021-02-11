<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $table = 'master_month';

    protected $fillable = [
     "id","month_name_en","month_name_mar"
    ];
}