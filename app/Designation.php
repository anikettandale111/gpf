<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $table = 'designations';

    protected $fillable = [

            "id","designation_name_en","designation_name_mar","created_at","updated_at"
    ];
}
