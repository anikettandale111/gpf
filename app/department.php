<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    protected $table = 'departments';
    
    protected $fillable = [
            
            "department","created_at","updated_at"
    ];
}
