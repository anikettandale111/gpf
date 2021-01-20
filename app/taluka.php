<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class taluka extends Model
{
    protected $table = 'taluka';
    
    protected $fillable = [
        "name","created_by","modified_by","created_at","updated_at"
    ];

}
