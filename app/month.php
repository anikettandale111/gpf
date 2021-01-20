<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class month extends Model
{
    protected $table = 'master_month';
    
    protected $fillable = [
        "name"
    ];
}
