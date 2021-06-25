<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PDFMonthlyFile extends Model
{
    protected $table = 'tbl_pdf_monthly_data';
    protected $fillable = [ 'file_for_year', 'file_for_month', 'chalan_serial_number', 'file_taluka_id', 'gpf_number', 'employee_name', 'emc_desg_id','emc_dept_id',
                            'monthly_contrubition', 'monthly_received', 'loan_installment', 'monthly_other', 'loan_amonut','remark','is_active','created_by','created_at','updated_at','file_name'];
}
