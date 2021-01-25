<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class taluka extends Model
{
    protected $table = 'taluka';

    protected $fillable = [
        "id","taluka_name_en","taluka_name_mar","district_id","created_at","updated_at"
    ];

}
