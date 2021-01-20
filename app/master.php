<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master extends Model
{
    protected $table = 'master_bank';
    
    protected $fillable = [
            
        "bank_name","created_at","updated_at"
    ];
}
