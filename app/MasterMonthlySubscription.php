<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterMonthlySubscription extends Model
{
    protected $table = 'master_emp_monthly_contribution_two';
    public $fillable = [ "gpf_number", "classification_id", "taluka_id", "challan_id", "challan_number", "emc_month", "emc_year","emc_emp_id", "emc_desg_id", "emc_dept_id", "monthly_contrubition", "monthly_received", "loan_installment", "monthly_other", "loan_amonut","remark"];
}
