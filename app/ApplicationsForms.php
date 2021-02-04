<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationsForms extends Model
{
    protected $table = 'application_forms';

    protected $fillable = [
        "dsitrict_id ","district_name_en","district_name_mar","dsitrict_status","created_at","updated_at"
    ];
}
