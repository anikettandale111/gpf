<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vetan extends Model
{
     protected $table = 'vetan';
      protected $fillable = [

           "vetan","gpf_no","taluka","department","name","designation","hapta_no","chalna_no","month_hapta","chalna_amount","digging","difference","from_interest_date","until_date","difference_amount","different_interest","charging_interest","created_by","modified_by","created_by","modified_by","created_at","updated_at",'financial_year'
    ];
}
