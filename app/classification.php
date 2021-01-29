<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    protected $table = 'classifications';

    protected $fillable = [

           "id","classification_name_en","classification_name_mar","created_at","updated_at"
    ];
}
