<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillExpenses extends Model
{
    protected $table = "bill_expenses_information";

    protected $fillable = [
      "bill_id",
      "bill_number",
      "gpf_no",
      "user_name",
      "user_designation",
      "user_department",
      "user_taluka_name",
      "loan_agrim_niyam",
      "shillak_rakkam",
      "required_rakkam",
      "bank_name",
      "bank_ifsc_name",
      "bank_acc_number",
      "if_installment_no",
    ];
}
