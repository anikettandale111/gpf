<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class designation extends Model
{
    protected $table = 'designations';
    
    protected $fillable = [
            
            "designation","created_at","updated_at"
    ];
}
