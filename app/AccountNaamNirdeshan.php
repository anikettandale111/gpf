<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountNaamNirdeshan extends Model
{
  protected $table = 'tbl_account_naam_nirdeshan_forms';

  protected $fillable = [
    'employee_gpf_num',
    'user_name',
    'user_designation',
    'user_joining_date',
    'user_taluka_name',
    'user_department',
    'applicant_relation',
    'applicant_name',
    'applicantion_date',
    'gat_vikas_adhikari_no',
    'zp_adhikari_no',
    'antim_pryojan',
    'antim_pay_month',
    'antim_pay_year',
    'antim_6pay_month',
    'antim_6pay_year',
    'antim_instllment_month',
    'antim_instllment_year',
    'fo_gat_vikas_adhikari_no',
    'fo_zp_adhikari_no',
    'vibhag_samiti_no',
    'transfer_prmotion_office',
    'transfer_office_gpf_no',
    'application_copy_kramanak_one',
    'application_copy_kramanak_two',
    'application_copy_kramanak_three',
    'account_closed_ft_transfer',
    'financial_year',
  ];
}
