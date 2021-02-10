<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [

        "id", "department_name_en", "department_name_mar", "taluka_id", "created_at", "updated_at"
    ];
}

