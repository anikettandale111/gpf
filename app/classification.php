<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classification extends Model
{
    protected $table = 'classifications';
    
    protected $fillable = [
            
           "classification","created_at","updated_at"
    ];
}
