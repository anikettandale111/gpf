<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterVetanAyog extends Model
{
     protected $table = 'master_vetan_ayog_received';
      protected $fillable = [
            "GPFNo",
            "Year",
            "Instalment",
            "ChallanNo",
            "DiffAmt ",
            "Interest",
            "TotDiff",
            "INT14",
            "DAMT14",
            "Mnt",
            "Rmk",
            "DtFrom",
            "DtTo",
            "LockDate",
            "TotInt",
            "Total",
            "INTY1",
            "INTY2",
            "INTY3",
            "INTY4",
            "INTY5",
            "INTY6",
            "INTY7",
            "INTY8",
            "INTY9",
            "INTY10",
            "pay_number",
            "created_by"
    ];
}
