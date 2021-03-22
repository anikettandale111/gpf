/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/
UPDATE `master_emp_monthly_contribution` em,master_employee m SET em.gpf_number=m.employee_id WHERE RIGHT(em.gpf_number,4) = m.employee_id AND m.employee_id=6868


UPDATE `master_emp_monthly_contribution` SET gpf_number=RIGHT(gpf_number,4) WHERE LENGTH(gpf_number) = 5




SELECT CONCAT(emc.gpf_number) AS inital_gpf_number,emc.emc_month,emc.emc_year,mm.month_name_mar AS month_name, tl.taluka_name_mar AS taluka_name,SUM(emc.monthly_contrubition), emc.monthly_received,emc.loan_amonut,emc.monthly_other,emc.remark,emc.loan_installment
FROM master_emp_monthly_contribution emc
LEFT JOIN master_month mm ON mm.id=emc.emc_month
LEFT JOIN taluka tl ON tl.id=emc.taluka_id
WHERE emc.gpf_number="P14860"
AND emc.emc_year=2019
GROUP BY emc.emc_month
ORDER BY emc.emc_month
/****************************************************************************************************************/
SELECT '2019-2020' as finanical_year,gpf_number
(SELECT SUM(monthly_contrubition) FROM master_emp_monthly_contribution WHERE emc_month=4 AND emc_year = 2019 AND master_emp_monthly_contribution.gpf_number=emc.gpf_number ) AS month_april

FROM master_emp_monthly_contribution AS emc WHERE emc.emc_year >= 2019 AND emc.emc_month >= 4 AND emc.gpf_number=14860 GROUP BY gpf_number



UPDATE master_gpf_transaction mgt,employee_yearwise_opening_balance ob SET mgt.opening_balance = ob.opn_balance WHERE ob.gpf_no=mgt.gpf_number AND ob.`year`=2019 AND ob.opn_balance > 1
/****************************************************************************************************************/
// $all_emp = DB::raw('SELECT gpf_no FROM master_employee ORDER BY id DESC LIMIT 20');
// $all_emp_result = DB::select($all_emp);
// // print_r($all_emp_result);dd();
// $all_emp_rec = [];
// if(count($all_emp_result)){
//   foreach($all_emp_result AS $row){
// $query = DB::raw('SELECT emc.gpf_number AS inital_gpf_number,emc.emc_month,emc.emc_year,
//                   mm.month_name_'.$lang.' AS month_name,SUM(emc.monthly_contrubition) AS monthly_contrubition,SUM(emc.monthly_received) AS monthly_received,SUM(emc.loan_amonut) AS loan_amonut,SUM(emc.monthly_other) AS monthly_other,emc.remark,emc.loan_installment,
//                   mm.id AS monthid FROM master_emp_monthly_contribution emc
//                   INNER JOIN master_month mm ON mm.id=emc.emc_month
//                   WHERE emc.gpf_number='.$request->employee_gpf_num.'
//                   AND (emc.emc_month IN (4,5,6,7,8,9,10,11,12) AND emc.emc_year=2019)
//                   GROUP BY emc.emc_month');
// $query_one = DB::raw('SELECT emc.gpf_number AS inital_gpf_number,emc.emc_month,emc.emc_year,
//                   mm.month_name_'.$lang.' AS month_name,SUM(emc.monthly_contrubition) AS monthly_contrubition,SUM(emc.monthly_received) AS monthly_received,SUM(emc.loan_amonut) AS loan_amonut,SUM(emc.monthly_other) AS monthly_other,emc.remark,emc.loan_installment,
//                   mm.id AS monthid FROM master_emp_monthly_contribution emc
//                   INNER JOIN master_month mm ON mm.id=emc.emc_month
//                   WHERE emc.gpf_number='.$request->employee_gpf_num.'
//                   AND (emc.emc_month IN (1,2,3) AND emc.emc_year=2020)
//                   GROUP BY emc.emc_month');
// AND emc.emc_year IN (2019,2020) AND emc.emc_month IN (1,2,3,4,5,6,7,8,9,10,11,12)

$q_one = DB::table('master_emp_monthly_contribution')
          ->select('master_emp_monthly_contribution.gpf_number AS inital_gpf_number','master_emp_monthly_contribution.emc_month','master_emp_monthly_contribution.emc_year',DB::raw('master_month.month_name_'.$lang.' AS month_name'),DB::raw('SUM(master_emp_monthly_contribution.monthly_contrubition) AS monthly_contrubition'),DB::raw('SUM(master_emp_monthly_contribution.monthly_received) AS monthly_received'),DB::raw('SUM(master_emp_monthly_contribution.loan_amonut) AS loan_amonut'),DB::raw('SUM(master_emp_monthly_contribution.monthly_other) AS monthly_other'),'master_emp_monthly_contribution.remark','master_emp_monthly_contribution.loan_installment')
          ->join('master_month', 'master_month.id','=','master_emp_monthly_contribution.emc_month')
          ->where('master_emp_monthly_contribution.gpf_number',$request->employee_gpf_num)
          ->where('master_emp_monthly_contribution.emc_month','>=',4)
          ->where('master_emp_monthly_contribution.emc_year','=',2019);
$q_two = DB::table('master_emp_monthly_contribution')
                    ->select('master_emp_monthly_contribution.gpf_number AS inital_gpf_number','master_emp_monthly_contribution.emc_month','master_emp_monthly_contribution.emc_year',DB::raw('master_month.month_name_'.$lang.' AS month_name'),DB::raw('SUM(master_emp_monthly_contribution.monthly_contrubition) AS monthly_contrubition'),DB::raw('SUM(master_emp_monthly_contribution.monthly_received) AS monthly_received'),DB::raw('SUM(master_emp_monthly_contribution.loan_amonut) AS loan_amonut'),DB::raw('SUM(master_emp_monthly_contribution.monthly_other) AS monthly_other'),'master_emp_monthly_contribution.remark','master_emp_monthly_contribution.loan_installment')
                    ->join('master_month', 'master_month.id','=','master_emp_monthly_contribution.emc_month')
                    ->where('master_emp_monthly_contribution.gpf_number',$request->employee_gpf_num)
                    ->where('master_emp_monthly_contribution.emc_month','<=',3)
                    ->where('master_emp_monthly_contribution.emc_year','=',2020);
// $query_three  = $q_one->union($q_two)->groupBY('master_emp_monthly_contribution.emc_month')->get();
// $result = DB::select($query_three);
print_r($query_three);dd();
// $all_emp_rec[] = DB::select($query);
//   }
// }
// print_r($all_emp_rec);
// dd();
$employee_name = DB::raw('SELECT me.employee_name,op.opn_balance AS opening_balance,tl.taluka_name_'.$lang.' AS taluka_name,
                  dp.department_name_'.$lang.' AS department_name,dg.designation_name_'.$lang.' AS designation_name
                  FROM master_employee me
                  LEFT JOIN employee_yearwise_opening_balance op ON op.gpf_no='.$request->employee_gpf_num.'
                  LEFT JOIN taluka tl ON tl.id=me.taluka_id
                  LEFT JOIN departments dp ON dp.department_code=me.department_id
                  LEFT JOIN designations dg ON dg.id=me.designation_id
                  WHERE me.gpf_no='.$request->employee_gpf_num.' AND op.year=2019');
$emp_name = DB::select($employee_name);
/****************************************************************************************************************/
BEGIN
 UPDATE master_gpf_transaction
	SET

    month_april_contri = (month_april_contri + (CASE  WHEN new.emc_month=4 THEN new.monthly_contrubition ELSE 0 END)),
		month_may_contri = (month_may_contri + (CASE  WHEN new.emc_month=5 THEN new.monthly_contrubition ELSE 0 END)),
		month_june_contri = (month_june_contri + (CASE  WHEN new.emc_month=6 THEN new.monthly_contrubition ELSE 0 END)),
		month_july_contri = (month_july_contri + (CASE  WHEN new.emc_month=7 THEN new.monthly_contrubition ELSE 0 END)),
		month_aug_contri = (month_aug_contri + (CASE  WHEN new.emc_month=8 THEN new.monthly_contrubition ELSE 0 END)),
		month_september_contri = (month_september_contri + (CASE  WHEN new.emc_month=9 THEN new.monthly_contrubition ELSE 0 END)),
    month_octomber_contri = (month_octomber_contri + (CASE  WHEN new.emc_month=10 THEN new.monthly_contrubition ELSE 0 END)),
    month_november_contri = (month_november_contri + (CASE  WHEN new.emc_month=11 THEN new.monthly_contrubition ELSE 0 END)),
    month_december_contri = (month_december_contri + (CASE  WHEN new.emc_month=12 THEN new.monthly_contrubition ELSE 0 END)),
    month_jan_contri = (month_jan_contri + (CASE  WHEN new.emc_month=1 THEN new.monthly_contrubition ELSE 0 END)),
    month_feb_contri = (month_feb_contri + (CASE  WHEN new.emc_month=2 THEN new.monthly_contrubition ELSE 0 END)),
    month_march_contri = (month_march_contri + (CASE  WHEN new.emc_month=3 THEN new.monthly_contrubition ELSE 0 END)),

	WHERE gpf_number = new.gpf_number ;

/****************************************************************************************************************/
ALTER TABLE `tbl_monthly_total_chalan` CHANGE `voucher_no` `chalan_month_id` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `tbl_monthly_total_chalan` CHANGE `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP, CHANGE `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP;

UPDATE master_emp_monthly_contribution AS emc LEFT JOIN master_employee AS me ON me.gpf_no=emc.gpf_number SET emc.emc_emp_id=me.id , emc.emc_desg_id= me.designation_id;
/****************************************************************************************************************/
`month_jan_loan_emi` double(10,2) NOT NULL DEFAULT 0,
`month_feb_loan_emi` double(10,2) NOT NULL DEFAULT 0,
`month_march_loan_emi` double(10,2) NOT NULL DEFAULT 0,
`month_april_loan_emi` double(10,2) NOT NULL DEFAULT 0,
`month_may_loan_emi` double(10,2) NOT NULL DEFAULT 0,
`month_june_loan_emi` double(10,2) NOT NULL DEFAULT 0,
`month_july_loan_emi` double(10,2) NOT NULL DEFAULT 0,
`month_aug_loan_emi` double(10,2) NOT NULL DEFAULT 0,
`month_september_loan_emi` double(10,2) NOT NULL DEFAULT 0,
`month_octomber_loan_emi` double(10,2) NOT NULL DEFAULT 0,
`month_november_loan_emi` double(10,2) NOT NULL DEFAULT 0,
`month_december_loan_emi` double(10,2) NOT NULL DEFAULT 0,




ALTER TABLE `master_gpf_transaction` ADD `month_jan_loan_emi` DOUBLE(10,2) NOT NULL DEFAULT '0' AFTER `month_march_loan`, ADD `month_feb_loan_emi` DOUBLE(10,2) NOT NULL DEFAULT '0' AFTER `month_jan_loan_emi`, ADD `month_march_loan_emi` DOUBLE(10,2) NOT NULL DEFAULT '0' AFTER `month_feb_loan_emi`, ADD `month_april_loan_emi` DOUBLE(10,2) NOT NULL DEFAULT '0' AFTER `month_march_loan_emi`, ADD `month_may_loan_emi` DOUBLE(10,2) NOT NULL DEFAULT '0' AFTER `month_april_loan_emi`, ADD `month_june_loan_emi` DOUBLE(10,2) NOT NULL DEFAULT '0' AFTER `month_may_loan_emi`, ADD `month_july_loan_emi` DOUBLE(10,2) NOT NULL DEFAULT '0' AFTER `month_june_loan_emi`, ADD `month_aug_loan_emi` DOUBLE(10,2) NOT NULL DEFAULT '0' AFTER `month_july_loan_emi`, ADD `month_september_loan_emi` DOUBLE(10,2) NOT NULL DEFAULT '0' AFTER `month_aug_loan_emi`, ADD `month_octomber_loan_emi` DOUBLE(10,2) NOT NULL DEFAULT '0' AFTER `month_september_loan_emi`, ADD `month_november_loan_emi` DOUBLE(10,2) NOT NULL DEFAULT '0' AFTER `month_octomber_loan_emi`, ADD `month_december_loan_emi` DOUBLE(10,2) NOT NULL DEFAULT '0' AFTER `month_november_loan_emi`, ADD `remark` TEXT NULL DEFAULT NULL AFTER `month_december_loan_emi`;

/****************************************************************************************************************/
SELECT GPFNO,'2019-2020' AS finanical_year,
IF (PartavaAgrim > 0 , "Partava" ,IF ( NaPartavaAgrim > 0 , "Na Partava Agrim","") ) AS Remark,

	SUM(CASE WHEN YEAR=2019 AND Mont=4 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_april_partava_agrim,
	SUM(CASE WHEN YEAR=2019 AND Mont=5 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_may_partava_agrim,
	SUM(CASE WHEN YEAR=2019 AND Mont=6 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_june_partava_agrim,
	SUM(CASE WHEN YEAR=2019 AND Mont=7 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_jully_partava_agrim,
	SUM(CASE WHEN YEAR=2019 AND Mont=8 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_aug_partava_agrim,
	SUM(CASE WHEN YEAR=2019 AND Mont=9 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_sept_partava_agrim,
	SUM(CASE WHEN YEAR=2019 AND Mont=10 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_oct_partava_agrim,
	SUM(CASE WHEN YEAR=2019 AND Mont=11 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_nov_partava_agrim,
	SUM(CASE WHEN YEAR=2019 AND Mont=12 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_dec_partava_agrim,
	SUM(CASE WHEN YEAR=2019 AND Mont=1 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_jan_partava_agrim,
	SUM(CASE WHEN YEAR=2019 AND Mont=2 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_feb_partava_agrim,
	SUM(CASE WHEN YEAR=2019 AND Mont=3 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_march_partava_agrim

	FROM master_loan_transaction GROUP BY GPFNO




  SELECT GPFNO,'2019-2020' AS finanical_year,
	IF (PartavaAgrim > 0 , "Partava" ,IF ( NaPartavaAgrim > 0 , "Na Partava Afrim","") ) AS Remark,
	SUM(CASE WHEN YEAR=2018 AND Mont=4 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_april_partava_agrim,
	SUM(CASE WHEN YEAR=2018 AND Mont=5 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_may_partava_agrim,
	SUM(CASE WHEN YEAR=2018 AND Mont=6 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_june_partava_agrim,
	SUM(CASE WHEN YEAR=2018 AND Mont=7 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_jully_partava_agrim,
	SUM(CASE WHEN YEAR=2018 AND Mont=8 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_aug_partava_agrim,
	SUM(CASE WHEN YEAR=2018 AND Mont=9 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_sept_partava_agrim,
	SUM(CASE WHEN YEAR=2018 AND Mont=10 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_oct_partava_agrim,
	SUM(CASE WHEN YEAR=2018 AND Mont=11 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_nov_partava_agrim,
	SUM(CASE WHEN YEAR=2018 AND Mont=12 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_dec_partava_agrim,
	SUM(CASE WHEN YEAR=2018 AND Mont=1 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_jan_partava_agrim,
	SUM(CASE WHEN YEAR=2018 AND Mont=2 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_feb_partava_agrim,
	SUM(CASE WHEN YEAR=2018 AND Mont=3 THEN (PartavaAgrim + NaPartavaAgrim) ELSE 0 END) as total_march_partava_agrim

	FROM master_loan_transaction WHERE GPFNO = 020995



  =CONCATENATE("UPDATE master_gpf_transaction SET month_april_loan=",D2,",month_may_loan =",E2,",month_june_loan=",F2, ",month_july_loan=",G2,",month_aug_loan=",H2,",month_september_loan=",I2,",month_octomber_loan=",J2,",month_november_loan=",K2,",month_december_loan=",L2,",month_jan_loan=",M2,",month_feb_loan=",N2,",month_march_loan=",O2,";")
/****************************************************************************************************************/
INSERT INTO master_gpf_transaction (`gpf_number`,  `financial_year`,`month_april_other`, `month_may_other`, `month_june_other`, `month_july_other`, `month_aug_other`, `month_september_other`, `month_octomber_other`, `month_november_other`, `month_december_other`, `month_jan_other`, `month_feb_other`, `month_march_other`, `month_april_recive`, `month_may_recive`, `month_june_recive`, `month_july_recive`, `month_aug_recive`, `month_september_recive`, `month_octomber_recive`, `month_november_recive`, `month_december_recive`, `month_jan_recive`, `month_feb_recive`, `month_march_recive`, `month_april_loan`, `month_may_loan`, `month_june_loan`, `month_july_loan`, `month_aug_loan`, `month_september_loan`, `month_octomber_loan`, `month_november_loan`, `month_december_loan`, `month_jan_loan`, `month_feb_loan`, `month_march_loan`, `month_april_contri`, `month_may_contri`, `month_june_contri`, `month_july_contri`, `month_aug_contri`, `month_september_contri`, `month_octomber_contri`, `month_november_contri`, `month_december_contri`, `month_jan_contri`, `month_feb_contri`, `month_march_contri`) SELECT gpf_number,'2019-2020' AS finanical_year,
	SUM(CASE WHEN emc_year=2019 AND emc_month=4 THEN monthly_other ELSE 0 END) as total_april_other,
	SUM(CASE WHEN emc_year=2019 AND emc_month=5 THEN monthly_other ELSE 0 END) as total_may_other,
	SUM(CASE WHEN emc_year=2019 AND emc_month=6 THEN monthly_other ELSE 0 END) as total_june_other,
	SUM(CASE WHEN emc_year=2019 AND emc_month=7 THEN monthly_other ELSE 0 END) as total_jully_other,
	SUM(CASE WHEN emc_year=2019 AND emc_month=8 THEN monthly_other ELSE 0 END) as total_aug_other,
	SUM(CASE WHEN emc_year=2019 AND emc_month=9 THEN monthly_other ELSE 0 END) as total_sept_other,
	SUM(CASE WHEN emc_year=2019 AND emc_month=10 THEN monthly_other ELSE 0 END) as total_oct_other,
	SUM(CASE WHEN emc_year=2019 AND emc_month=11 THEN monthly_other ELSE 0 END) as total_nov_other,
	SUM(CASE WHEN emc_year=2019 AND emc_month=12 THEN monthly_other ELSE 0 END) as total_dec_other,
	SUM(CASE WHEN emc_year=2019 AND emc_month=1 THEN monthly_other ELSE 0 END) as total_jan_other,
	SUM(CASE WHEN emc_year=2019 AND emc_month=2 THEN monthly_other ELSE 0 END) as total_feb_other,
	SUM(CASE WHEN emc_year=2019 AND emc_month=3 THEN monthly_other ELSE 0 END) as total_march_other,

	SUM(CASE WHEN emc_year=2019 AND emc_month=4 THEN monthly_received ELSE 0 END) as total_april_received,
	SUM(CASE WHEN emc_year=2019 AND emc_month=5 THEN monthly_received ELSE 0 END) as total_may_received,
	SUM(CASE WHEN emc_year=2019 AND emc_month=6 THEN monthly_received ELSE 0 END) as total_june_received,
	SUM(CASE WHEN emc_year=2019 AND emc_month=7 THEN monthly_received ELSE 0 END) as total_jully_received,
	SUM(CASE WHEN emc_year=2019 AND emc_month=8 THEN monthly_received ELSE 0 END) as total_aug_received,
	SUM(CASE WHEN emc_year=2019 AND emc_month=9 THEN monthly_received ELSE 0 END) as total_sept_received,
	SUM(CASE WHEN emc_year=2019 AND emc_month=10 THEN monthly_received ELSE 0 END) as total_oct_received,
	SUM(CASE WHEN emc_year=2019 AND emc_month=11 THEN monthly_received ELSE 0 END) as total_nov_received,
	SUM(CASE WHEN emc_year=2019 AND emc_month=12 THEN monthly_received ELSE 0 END) as total_dec_received,
	SUM(CASE WHEN emc_year=2019 AND emc_month=1 THEN monthly_received ELSE 0 END) as total_jan_received,
	SUM(CASE WHEN emc_year=2019 AND emc_month=2 THEN monthly_received ELSE 0 END) as total_feb_received,
	SUM(CASE WHEN emc_year=2019 AND emc_month=3 THEN monthly_received ELSE 0 END) as total_march_received,

	SUM(CASE WHEN emc_year=2019 AND emc_month=4 THEN loan_installment ELSE 0 END) as total_april_installment,
	SUM(CASE WHEN emc_year=2019 AND emc_month=5 THEN loan_installment ELSE 0 END) as total_may_installment,
	SUM(CASE WHEN emc_year=2019 AND emc_month=6 THEN loan_installment ELSE 0 END) as total_june_installment,
	SUM(CASE WHEN emc_year=2019 AND emc_month=7 THEN loan_installment ELSE 0 END) as total_jully_installment,
	SUM(CASE WHEN emc_year=2019 AND emc_month=8 THEN loan_installment ELSE 0 END) as total_aug_installment,
	SUM(CASE WHEN emc_year=2019 AND emc_month=9 THEN loan_installment ELSE 0 END) as total_sept_installment,
	SUM(CASE WHEN emc_year=2019 AND emc_month=10 THEN loan_installment ELSE 0 END) as total_oct_installment,
	SUM(CASE WHEN emc_year=2019 AND emc_month=11 THEN loan_installment ELSE 0 END) as total_nov_installment,
	SUM(CASE WHEN emc_year=2019 AND emc_month=12 THEN loan_installment ELSE 0 END) as total_dec_installment,
	SUM(CASE WHEN emc_year=2019 AND emc_month=1 THEN loan_installment ELSE 0 END) as total_jan_installment,
	SUM(CASE WHEN emc_year=2019 AND emc_month=2 THEN loan_installment ELSE 0 END) as total_feb_installment,
	SUM(CASE WHEN emc_year=2019 AND emc_month=3 THEN loan_installment ELSE 0 END) as total_march_installment,

	SUM(CASE WHEN emc_year=2019 AND emc_month=4 THEN monthly_contrubition ELSE 0 END) as total_april_contrubition,
	SUM(CASE WHEN emc_year=2019 AND emc_month=5 THEN monthly_contrubition ELSE 0 END) as total_may_contrubition,
	SUM(CASE WHEN emc_year=2019 AND emc_month=6 THEN monthly_contrubition ELSE 0 END) as total_june_contrubition,
	SUM(CASE WHEN emc_year=2019 AND emc_month=7 THEN monthly_contrubition ELSE 0 END) as total_jully_contrubition,
	SUM(CASE WHEN emc_year=2019 AND emc_month=8 THEN monthly_contrubition ELSE 0 END) as total_aug_contrubition,
	SUM(CASE WHEN emc_year=2019 AND emc_month=9 THEN monthly_contrubition ELSE 0 END) as total_sept_contrubition,
	SUM(CASE WHEN emc_year=2019 AND emc_month=10 THEN monthly_contrubition ELSE 0 END) as total_oct_contrubition,
	SUM(CASE WHEN emc_year=2019 AND emc_month=11 THEN monthly_contrubition ELSE 0 END) as total_nov_contrubition,
	SUM(CASE WHEN emc_year=2019 AND emc_month=12 THEN monthly_contrubition ELSE 0 END) as total_dec_contrubition,
	SUM(CASE WHEN emc_year=2019 AND emc_month=1 THEN monthly_contrubition ELSE 0 END) as total_jan_contrubition,
	SUM(CASE WHEN emc_year=2019 AND emc_month=2 THEN monthly_contrubition ELSE 0 END) as total_feb_contrubition,
	SUM(CASE WHEN emc_year=2019 AND emc_month=3 THEN monthly_contrubition ELSE 0 END) as total_marc_contrubitionh

	FROM master_emp_monthly_contribution GROUP BY gpf_number
