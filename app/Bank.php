<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';

    protected $fillable = [

        "id","bank_name_en","bank_name_mar","created_at","updated_at"
    ];
}
