/****************************************************************************************************************/
UPDATE master_gpf_transaction
INNER JOIN employee_yearwise_opening_balance ON employee_yearwise_opening_balance.gpf_no = master_gpf_transaction.gpf_number
SET
master_gpf_transaction.opening_balance = employee_yearwise_opening_balance.opn_balance
WHERE
employee_yearwise_opening_balance.year=2020

/****************************************************************************************************************/
UPDATE bill_expenses_information
INNER JOIN master_employee ON bill_expenses_information.gpf_no = master_employee.gpf_no
INNER JOIN designations ON master_employee.designation_id = designations.id
INNER JOIN departments ON master_employee.department_id = departments.department_code
INNER JOIN taluka ON master_employee.taluka_id = taluka.id
SET
bill_expenses_information.user_name = master_employee.employee_name,
bill_expenses_information.user_designation = designations.designation_name_mar,
bill_expenses_information.user_department = departments.department_name_mar,
bill_expenses_information.taluka_id = taluka.id,
bill_expenses_information.user_taluka_name = taluka.taluka_name_mar
WHERE
bill_expenses_information.bill_number=3
AND
bill_expenses_information.gpf_no = master_employee.gpf_no


/****************************************************************************************************************/
ALTER TABLE `bill_expenses_information` ADD `loan_agrim_pryojan` VARCHAR(255) NULL DEFAULT NULL AFTER `user_taluka_name`;
ALTER TABLE `common_reasons` ADD `withdrawn+percent` DOUBLE(10,2) NOT NULL DEFAULT '0' AFTER `reason_description_mar`;
ALTER TABLE `common_reasons` CHANGE `withdrawn+percent` `withdrawn_percent` DOUBLE(10,2) NOT NULL DEFAULT '0.00';


/****************************************************************************************************************/
UPDATE `master_gpf_transaction` SET
`month_april_other`=0.00,
`month_may_other`=0.00,
`month_june_other`=0.00,
`month_july_other`=0.00,
`month_aug_other`=0.00,
`month_september_other`=0.00,
`month_octomber_other`=0.00,
`month_november_other`=0.00,
`month_december_other`=0.00,
`month_jan_other`=0.00,
`month_feb_other`=0.00,
`month_march_other`=0.00,
`month_april_recive`=0.00,
`month_may_recive`=0.00,
`month_june_recive`=0.00,
`month_july_recive`=0.00,
`month_aug_recive`=0.00,
`month_september_recive`=0.00,
`month_octomber_recive`=0.00,
`month_november_recive`=0.00,
`month_december_recive`=0.00,
`month_jan_recive`=0.00,
`month_feb_recive`=0.00,
`month_march_recive`=0.00,
`month_april_loan`=0.00,
`month_may_loan`=0.00,
`month_june_loan`=0.00,
`month_july_loan`=0.00,
`month_aug_loan`=0.00,
`month_september_loan`=0.00,
`month_octomber_loan`=0.00,
`month_november_loan`=0.00,
`month_december_loan`=0.00,
`month_jan_loan`=0.00,
`month_feb_loan`=0.00,
`month_march_loan`=0.00,
`month_jan_loan_emi`=0.00,
`month_feb_loan_emi`=0.00,
`month_march_loan_emi`=0.00,
`month_april_loan_emi`=0.00,
`month_may_loan_emi`=0.00,
`month_june_loan_emi`=0.00,
`month_july_loan_emi`=0.00,
`month_aug_loan_emi`=0.00,
`month_september_loan_emi`=0.00,
`month_octomber_loan_emi`=0.00,
`month_november_loan_emi`=0.00,
`month_december_loan_emi`=0.00,
`remark`=0.00,
`month_april_contri`=0.00,
`month_may_contri`=0.00,
`month_june_contri`=0.00,
`month_july_contri`=0.00,
`month_aug_contri`=0.00,
`month_september_contri`=0.00,
`month_octomber_contri`=0.00,
`month_november_contri`=0.00,
`month_december_contri`=0.00,
`month_jan_contri`=0.00,
`month_feb_contri`=0.00,
`month_march_contri`=0.00,
`month_april_six_pay`=0.00,
`month_may_six_pay`=0.00,
`month_june_six_pay`=0.00,
`month_july_six_pay`=0.00,
`month_aug_six_pay`=0.00,
`month_september_six_pay`=0.00,
`month_octomber_six_pay`=0.00,
`month_november_six_pay`=0.00,
`month_december_six_pay`=0.00,
`month_jan_six_pay`=0.00,
`month_feb_six_pay`=0.00,
`month_march_six_pay`=0.00,
`month_april_seven_pay`=0.00,
`month_may_seven_pay`=0.00,
`month_june_seven_pay`=0.00,
`month_july_seven_pay`=0.00,
`month_aug_seven_pay`=0.00,
`month_september_seven_pay`=0.00,
`month_octomber_seven_pay`=0.00,
`month_november_seven_pay`=0.00,
`month_december_seven_pay`=0.00,
`month_jan_seven_pay`=0.00,
`month_feb_seven_pay`=0.00,
`month_march_seven_pay`=0.00
/****************************************************************************************************************/
ALTER TABLE `bill_information` CHANGE `check_date` `check_date` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL, CHANGE `check_no` `check_no` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;

ALTER TABLE `bill_information` CHANGE `bill_check` `bill_check` TINYINT(5) NOT NULL DEFAULT '1' COMMENT '1 Inprocess,2 Completed,3 Check';
ALTER TABLE `tbl_account_naam_nirdeshan_forms` ADD `financial_year` VARCHAR(10) NOT NULL AFTER `remark`;
ALTER TABLE `tbl_account_naam_nirdeshan_forms` ADD `closing_balance` DOUBLE(10,2) NULL AFTER `zp_adhikari_no`, ADD `retirment_date` DATE NULL AFTER `closing_balance`;
ALTER TABLE `tbl_account_naam_nirdeshan_forms` CHANGE `closing_balance` `closing_balance` DOUBLE(10,2) NULL DEFAULT '0';

/****************************************************************************************************************/
UPDATE master_gpf_transaction AS gt
LEFT JOIN tbl_master_withdrawal AS mw ON mw.gpf_no = gt.gpf_number SET
gt.partava_amt = mw.partava_amt,
gt.partava_date = mw.partava_date,
gt.partava_month = CASE WHEN mw.partava_amt > 0 THEN mw.month_id ELSE 0 END,
gt.na_partava_amt = mw.na_partava_amt,
gt.na_partava_date = mw.na_partava_date,
gt.na_partava_month = CASE WHEN mw.na_partava_amt > 0 THEN mw.month_id ELSE 0 END,
gt.antim_adayi_amt = mw.antim_adayi_amt,
gt.antim_adayi_date = mw.antim_adayi_date,
gt.antim_adayi_month = CASE WHEN mw.antim_adayi_amt > 0 THEN mw.month_id ELSE 0 END

WHERE gt.gpf_number = mw.gpf_no;



UPDATE tbl_master_withdrawal SET remark = CASE WHEN partava_amt > 0 THEN 'परतावा देय ' END, remark=CASE WHEN na_partava_amt > 0 THEN 'ना परतावा देय' END, remark = CASE WHEN antim_adayi_amt > 0 THEN 'अंतिम देय (खाते बंद )' END WHERE gpf_no=15742

UPDATE tbl_master_withdrawal SET remark = CASE WHEN partava_amt > 0 THEN CONCAT(remark,'परतावा देय ') END, remark=CASE WHEN na_partava_amt > 0 THEN CONCAT(remark,'ना परतावा देय') END, remark = CASE WHEN antim_adayi_amt > 0 THEN CONCAT(remark,'अंतिम देय (खाते बंद )') END

UPDATE master_gpf_transaction AS gt
LEFT JOIN tbl_master_withdrawal AS mw ON mw.gpf_no = gt.gpf_number SET gt.withdraw_remark = mw.remark WHERE gt.gpf_number = mw.gpf_no;
/****************************************************************************************************************/
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '13' WHERE `tbl_monthly_total_chalan`.`id` = 15211;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '5' WHERE `tbl_monthly_total_chalan`.`id` = 15453;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '30' WHERE `tbl_monthly_total_chalan`.`id` = 15460;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '18' WHERE `tbl_monthly_total_chalan`.`id` = 15487;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '10' WHERE `tbl_monthly_total_chalan`.`id` = 15488;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '20' WHERE `tbl_monthly_total_chalan`.`id` = 15563;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '18' WHERE `tbl_monthly_total_chalan`.`id` = 15564;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '33' WHERE `tbl_monthly_total_chalan`.`id` = 15576;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '9' WHERE `tbl_monthly_total_chalan`.`id` = 15577;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '7' WHERE `tbl_monthly_total_chalan`.`id` = 15579;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '7' WHERE `tbl_monthly_total_chalan`.`id` = 15580;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '43' WHERE `tbl_monthly_total_chalan`.`id` = 15581;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '3' WHERE `tbl_monthly_total_chalan`.`id` = 15582;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '88' WHERE `tbl_monthly_total_chalan`.`id` = 15594;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '75' WHERE `tbl_monthly_total_chalan`.`id` = 15595;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '25' WHERE `tbl_monthly_total_chalan`.`id` = 15596;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '20' WHERE `tbl_monthly_total_chalan`.`id` = 15597;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '10' WHERE `tbl_monthly_total_chalan`.`id` = 15603;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '18' WHERE `tbl_monthly_total_chalan`.`id` = 15604;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '36' WHERE `tbl_monthly_total_chalan`.`id` = 15619;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '24' WHERE `tbl_monthly_total_chalan`.`id` = 15620;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '203' WHERE `tbl_monthly_total_chalan`.`id` = 15625;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '207' WHERE `tbl_monthly_total_chalan`.`id` = 15626;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '7' WHERE `tbl_monthly_total_chalan`.`id` = 15627;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '3' WHERE `tbl_monthly_total_chalan`.`id` = 15629;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '206' WHERE `tbl_monthly_total_chalan`.`id` = 15640;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '204' WHERE `tbl_monthly_total_chalan`.`id` = 15644;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '15' WHERE `tbl_monthly_total_chalan`.`id` = 15694;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '15' WHERE `tbl_monthly_total_chalan`.`id` = 15695;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '212' WHERE `tbl_monthly_total_chalan`.`id` = 15701;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '212' WHERE `tbl_monthly_total_chalan`.`id` = 15702;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '12' WHERE `tbl_monthly_total_chalan`.`id` = 15703;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '43' WHERE `tbl_monthly_total_chalan`.`id` = 15705;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '101' WHERE `tbl_monthly_total_chalan`.`id` = 15713;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '210' WHERE `tbl_monthly_total_chalan`.`id` = 15715;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '190' WHERE `tbl_monthly_total_chalan`.`id` = 15716;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '192' WHERE `tbl_monthly_total_chalan`.`id` = 15720;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '8' WHERE `tbl_monthly_total_chalan`.`id` = 15729;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '21' WHERE `tbl_monthly_total_chalan`.`id` = 15746;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '211' WHERE `tbl_monthly_total_chalan`.`id` = 15762;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '210' WHERE `tbl_monthly_total_chalan`.`id` = 15763;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '202' WHERE `tbl_monthly_total_chalan`.`id` = 15775;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '207' WHERE `tbl_monthly_total_chalan`.`id` = 15776;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '207' WHERE `tbl_monthly_total_chalan`.`id` = 15777;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '214' WHERE `tbl_monthly_total_chalan`.`id` = 15778;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '50' WHERE `tbl_monthly_total_chalan`.`id` = 15779;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '210' WHERE `tbl_monthly_total_chalan`.`id` = 15780;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '215' WHERE `tbl_monthly_total_chalan`.`id` = 15781;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '4' WHERE `tbl_monthly_total_chalan`.`id` = 15782;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '215' WHERE `tbl_monthly_total_chalan`.`id` = 15783;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '204' WHERE `tbl_monthly_total_chalan`.`id` = 15784;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '6' WHERE `tbl_monthly_total_chalan`.`id` = 15785;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '102' WHERE `tbl_monthly_total_chalan`.`id` = 15808;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '34' WHERE `tbl_monthly_total_chalan`.`id` = 15815;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '25' WHERE `tbl_monthly_total_chalan`.`id` = 15816;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '209' WHERE `tbl_monthly_total_chalan`.`id` = 15848;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '35' WHERE `tbl_monthly_total_chalan`.`id` = 15891;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '12' WHERE `tbl_monthly_total_chalan`.`id` = 15903;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '206' WHERE `tbl_monthly_total_chalan`.`id` = 15923;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '206' WHERE `tbl_monthly_total_chalan`.`id` = 15924;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '206' WHERE `tbl_monthly_total_chalan`.`id` = 15925;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '210' WHERE `tbl_monthly_total_chalan`.`id` = 15926;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '33' WHERE `tbl_monthly_total_chalan`.`id` = 15927;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '4' WHERE `tbl_monthly_total_chalan`.`id` = 15928;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '27' WHERE `tbl_monthly_total_chalan`.`id` = 15929;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '128' WHERE `tbl_monthly_total_chalan`.`id` = 15930;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '10' WHERE `tbl_monthly_total_chalan`.`id` = 15931;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '75' WHERE `tbl_monthly_total_chalan`.`id` = 15955;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '9' WHERE `tbl_monthly_total_chalan`.`id` = 15956;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '8' WHERE `tbl_monthly_total_chalan`.`id` = 15975;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '48' WHERE `tbl_monthly_total_chalan`.`id` = 15981;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '144' WHERE `tbl_monthly_total_chalan`.`id` = 15983;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '79' WHERE `tbl_monthly_total_chalan`.`id` = 15984;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '15' WHERE `tbl_monthly_total_chalan`.`id` = 15995;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '209' WHERE `tbl_monthly_total_chalan`.`id` = 15996;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '6' WHERE `tbl_monthly_total_chalan`.`id` = 16006;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '45' WHERE `tbl_monthly_total_chalan`.`id` = 16007;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '31' WHERE `tbl_monthly_total_chalan`.`id` = 16008;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '93' WHERE `tbl_monthly_total_chalan`.`id` = 16009;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '22' WHERE `tbl_monthly_total_chalan`.`id` = 16010;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '14' WHERE `tbl_monthly_total_chalan`.`id` = 16011;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '33' WHERE `tbl_monthly_total_chalan`.`id` = 16012;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '209' WHERE `tbl_monthly_total_chalan`.`id` = 16013;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '209' WHERE `tbl_monthly_total_chalan`.`id` = 16014;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '25' WHERE `tbl_monthly_total_chalan`.`id` = 16015;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '61' WHERE `tbl_monthly_total_chalan`.`id` = 16016;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '205' WHERE `tbl_monthly_total_chalan`.`id` = 16017;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '205' WHERE `tbl_monthly_total_chalan`.`id` = 16018;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '205' WHERE `tbl_monthly_total_chalan`.`id` = 16019;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '205' WHERE `tbl_monthly_total_chalan`.`id` = 16020;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '201' WHERE `tbl_monthly_total_chalan`.`id` = 16021;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '201' WHERE `tbl_monthly_total_chalan`.`id` = 16022;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '201' WHERE `tbl_monthly_total_chalan`.`id` = 16023;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '206' WHERE `tbl_monthly_total_chalan`.`id` = 16024;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '210' WHERE `tbl_monthly_total_chalan`.`id` = 16025;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '56' WHERE `tbl_monthly_total_chalan`.`id` = 16027;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '5' WHERE `tbl_monthly_total_chalan`.`id` = 16028;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '45' WHERE `tbl_monthly_total_chalan`.`id` = 16029;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '11' WHERE `tbl_monthly_total_chalan`.`id` = 16030;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '15' WHERE `tbl_monthly_total_chalan`.`id` = 16031;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '201' WHERE `tbl_monthly_total_chalan`.`id` = 16032;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '50' WHERE `tbl_monthly_total_chalan`.`id` = 16033;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '0' WHERE `tbl_monthly_total_chalan`.`id` = 16044;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '19' WHERE `tbl_monthly_total_chalan`.`id` = 16045;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '19' WHERE `tbl_monthly_total_chalan`.`id` = 16046;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '0' WHERE `tbl_monthly_total_chalan`.`id` = 16105;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '0' WHERE `tbl_monthly_total_chalan`.`id` = 16108;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '213' WHERE `tbl_monthly_total_chalan`.`id` = 16109;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '205' WHERE `tbl_monthly_total_chalan`.`id` = 16110;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '205' WHERE `tbl_monthly_total_chalan`.`id` = 16111;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '11' WHERE `tbl_monthly_total_chalan`.`id` = 16112;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '80' WHERE `tbl_monthly_total_chalan`.`id` = 16113;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '25' WHERE `tbl_monthly_total_chalan`.`id` = 16114;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '23' WHERE `tbl_monthly_total_chalan`.`id` = 16115;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '40' WHERE `tbl_monthly_total_chalan`.`id` = 16116;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '10' WHERE `tbl_monthly_total_chalan`.`id` = 16117;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '18' WHERE `tbl_monthly_total_chalan`.`id` = 16118;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '207' WHERE `tbl_monthly_total_chalan`.`id` = 16119;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '270' WHERE `tbl_monthly_total_chalan`.`id` = 16120;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '207' WHERE `tbl_monthly_total_chalan`.`id` = 16121;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '227' WHERE `tbl_monthly_total_chalan`.`id` = 16122;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '208' WHERE `tbl_monthly_total_chalan`.`id` = 16123;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '108' WHERE `tbl_monthly_total_chalan`.`id` = 16124;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '26' WHERE `tbl_monthly_total_chalan`.`id` = 16125;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '37' WHERE `tbl_monthly_total_chalan`.`id` = 16126;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '48' WHERE `tbl_monthly_total_chalan`.`id` = 16127;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '35' WHERE `tbl_monthly_total_chalan`.`id` = 16128;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '30' WHERE `tbl_monthly_total_chalan`.`id` = 16129;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '110' WHERE `tbl_monthly_total_chalan`.`id` = 16130;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '111' WHERE `tbl_monthly_total_chalan`.`id` = 16131;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '81' WHERE `tbl_monthly_total_chalan`.`id` = 16132;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '80' WHERE `tbl_monthly_total_chalan`.`id` = 16133;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '76' WHERE `tbl_monthly_total_chalan`.`id` = 16134;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '97' WHERE `tbl_monthly_total_chalan`.`id` = 16135;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '57' WHERE `tbl_monthly_total_chalan`.`id` = 16136;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '53' WHERE `tbl_monthly_total_chalan`.`id` = 16137;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '53' WHERE `tbl_monthly_total_chalan`.`id` = 16138;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '268' WHERE `tbl_monthly_total_chalan`.`id` = 16139;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '19' WHERE `tbl_monthly_total_chalan`.`id` = 16140;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '27' WHERE `tbl_monthly_total_chalan`.`id` = 16141;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '32' WHERE `tbl_monthly_total_chalan`.`id` = 16142;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '210' WHERE `tbl_monthly_total_chalan`.`id` = 16143;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '10' WHERE `tbl_monthly_total_chalan`.`id` = 16144;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '16' WHERE `tbl_monthly_total_chalan`.`id` = 16145;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '24' WHERE `tbl_monthly_total_chalan`.`id` = 16146;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '208' WHERE `tbl_monthly_total_chalan`.`id` = 16147;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '218' WHERE `tbl_monthly_total_chalan`.`id` = 16148;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '274' WHERE `tbl_monthly_total_chalan`.`id` = 16149;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '22' WHERE `tbl_monthly_total_chalan`.`id` = 16150;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '148' WHERE `tbl_monthly_total_chalan`.`id` = 16151;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '214' WHERE `tbl_monthly_total_chalan`.`id` = 16152;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '5' WHERE `tbl_monthly_total_chalan`.`id` = 16153;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '6' WHERE `tbl_monthly_total_chalan`.`id` = 16154;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '210' WHERE `tbl_monthly_total_chalan`.`id` = 16155;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '255' WHERE `tbl_monthly_total_chalan`.`id` = 16156;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '30' WHERE `tbl_monthly_total_chalan`.`id` = 16157;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '32' WHERE `tbl_monthly_total_chalan`.`id` = 16158;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '14' WHERE `tbl_monthly_total_chalan`.`id` = 16159;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '36' WHERE `tbl_monthly_total_chalan`.`id` = 16160;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '36' WHERE `tbl_monthly_total_chalan`.`id` = 16161;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '23' WHERE `tbl_monthly_total_chalan`.`id` = 16162;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '13' WHERE `tbl_monthly_total_chalan`.`id` = 16163;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '99' WHERE `tbl_monthly_total_chalan`.`id` = 16164;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '20' WHERE `tbl_monthly_total_chalan`.`id` = 16165;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '64' WHERE `tbl_monthly_total_chalan`.`id` = 16166;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '237' WHERE `tbl_monthly_total_chalan`.`id` = 16167;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '109' WHERE `tbl_monthly_total_chalan`.`id` = 16168;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '29' WHERE `tbl_monthly_total_chalan`.`id` = 16169;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '205' WHERE `tbl_monthly_total_chalan`.`id` = 16170;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '29' WHERE `tbl_monthly_total_chalan`.`id` = 16171;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '50' WHERE `tbl_monthly_total_chalan`.`id` = 16172;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '75' WHERE `tbl_monthly_total_chalan`.`id` = 16173;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '38' WHERE `tbl_monthly_total_chalan`.`id` = 16174;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '26' WHERE `tbl_monthly_total_chalan`.`id` = 16175;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '38' WHERE `tbl_monthly_total_chalan`.`id` = 16176;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '64' WHERE `tbl_monthly_total_chalan`.`id` = 16177;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '269' WHERE `tbl_monthly_total_chalan`.`id` = 16178;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '209' WHERE `tbl_monthly_total_chalan`.`id` = 16179;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '207' WHERE `tbl_monthly_total_chalan`.`id` = 16180;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '203' WHERE `tbl_monthly_total_chalan`.`id` = 16181;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '204' WHERE `tbl_monthly_total_chalan`.`id` = 16182;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '216' WHERE `tbl_monthly_total_chalan`.`id` = 16183;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '237' WHERE `tbl_monthly_total_chalan`.`id` = 16184;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '28' WHERE `tbl_monthly_total_chalan`.`id` = 16185;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '16' WHERE `tbl_monthly_total_chalan`.`id` = 16186;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '22' WHERE `tbl_monthly_total_chalan`.`id` = 16187;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '42' WHERE `tbl_monthly_total_chalan`.`id` = 16188;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '21' WHERE `tbl_monthly_total_chalan`.`id` = 16189;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '69' WHERE `tbl_monthly_total_chalan`.`id` = 16190;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '28' WHERE `tbl_monthly_total_chalan`.`id` = 16191;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '45' WHERE `tbl_monthly_total_chalan`.`id` = 16192;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '42' WHERE `tbl_monthly_total_chalan`.`id` = 16193;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '21' WHERE `tbl_monthly_total_chalan`.`id` = 16194;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '15' WHERE `tbl_monthly_total_chalan`.`id` = 16195;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '219' WHERE `tbl_monthly_total_chalan`.`id` = 16196;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '271' WHERE `tbl_monthly_total_chalan`.`id` = 16197;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '218' WHERE `tbl_monthly_total_chalan`.`id` = 16198;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '229' WHERE `tbl_monthly_total_chalan`.`id` = 16199;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '227' WHERE `tbl_monthly_total_chalan`.`id` = 16200;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '227' WHERE `tbl_monthly_total_chalan`.`id` = 16201;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '211' WHERE `tbl_monthly_total_chalan`.`id` = 16202;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '220' WHERE `tbl_monthly_total_chalan`.`id` = 16203;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '272' WHERE `tbl_monthly_total_chalan`.`id` = 16204;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '219' WHERE `tbl_monthly_total_chalan`.`id` = 16205;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '189' WHERE `tbl_monthly_total_chalan`.`id` = 16206;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '22' WHERE `tbl_monthly_total_chalan`.`id` = 16207;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '77' WHERE `tbl_monthly_total_chalan`.`id` = 16208;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '78' WHERE `tbl_monthly_total_chalan`.`id` = 16209;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '70' WHERE `tbl_monthly_total_chalan`.`id` = 16210;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '28' WHERE `tbl_monthly_total_chalan`.`id` = 16211;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '36' WHERE `tbl_monthly_total_chalan`.`id` = 16212;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '42' WHERE `tbl_monthly_total_chalan`.`id` = 16213;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '25' WHERE `tbl_monthly_total_chalan`.`id` = 16214;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '73' WHERE `tbl_monthly_total_chalan`.`id` = 16215;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '40' WHERE `tbl_monthly_total_chalan`.`id` = 16216;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '41' WHERE `tbl_monthly_total_chalan`.`id` = 16217;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '34' WHERE `tbl_monthly_total_chalan`.`id` = 16218;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '35' WHERE `tbl_monthly_total_chalan`.`id` = 16219;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '50' WHERE `tbl_monthly_total_chalan`.`id` = 16220;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '40' WHERE `tbl_monthly_total_chalan`.`id` = 16221;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '57' WHERE `tbl_monthly_total_chalan`.`id` = 16222;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '153' WHERE `tbl_monthly_total_chalan`.`id` = 16223;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '42' WHERE `tbl_monthly_total_chalan`.`id` = 16224;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '12' WHERE `tbl_monthly_total_chalan`.`id` = 16225;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '46' WHERE `tbl_monthly_total_chalan`.`id` = 16226;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '52' WHERE `tbl_monthly_total_chalan`.`id` = 16227;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '76' WHERE `tbl_monthly_total_chalan`.`id` = 16228;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '16' WHERE `tbl_monthly_total_chalan`.`id` = 16229;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '27' WHERE `tbl_monthly_total_chalan`.`id` = 16230;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '47' WHERE `tbl_monthly_total_chalan`.`id` = 16231;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '20' WHERE `tbl_monthly_total_chalan`.`id` = 16232;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '18' WHERE `tbl_monthly_total_chalan`.`id` = 16233;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '225' WHERE `tbl_monthly_total_chalan`.`id` = 16234;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '144' WHERE `tbl_monthly_total_chalan`.`id` = 16235;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '203' WHERE `tbl_monthly_total_chalan`.`id` = 16236;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '110' WHERE `tbl_monthly_total_chalan`.`id` = 16237;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '32' WHERE `tbl_monthly_total_chalan`.`id` = 16238;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '6' WHERE `tbl_monthly_total_chalan`.`id` = 16239;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '205' WHERE `tbl_monthly_total_chalan`.`id` = 16240;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '180' WHERE `tbl_monthly_total_chalan`.`id` = 16241;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '174' WHERE `tbl_monthly_total_chalan`.`id` = 16242;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '41' WHERE `tbl_monthly_total_chalan`.`id` = 16243;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '74' WHERE `tbl_monthly_total_chalan`.`id` = 16244;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '51' WHERE `tbl_monthly_total_chalan`.`id` = 16245;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '53' WHERE `tbl_monthly_total_chalan`.`id` = 16246;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '43' WHERE `tbl_monthly_total_chalan`.`id` = 16247;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '54' WHERE `tbl_monthly_total_chalan`.`id` = 16248;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '28' WHERE `tbl_monthly_total_chalan`.`id` = 16249;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '18' WHERE `tbl_monthly_total_chalan`.`id` = 16250;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '31' WHERE `tbl_monthly_total_chalan`.`id` = 16251;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '38' WHERE `tbl_monthly_total_chalan`.`id` = 16252;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '47' WHERE `tbl_monthly_total_chalan`.`id` = 16253;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '62' WHERE `tbl_monthly_total_chalan`.`id` = 16254;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '72' WHERE `tbl_monthly_total_chalan`.`id` = 16255;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '69' WHERE `tbl_monthly_total_chalan`.`id` = 16256;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '43' WHERE `tbl_monthly_total_chalan`.`id` = 16257;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '57' WHERE `tbl_monthly_total_chalan`.`id` = 16259;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '28' WHERE `tbl_monthly_total_chalan`.`id` = 16260;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '52' WHERE `tbl_monthly_total_chalan`.`id` = 16261;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '35' WHERE `tbl_monthly_total_chalan`.`id` = 16262;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '48' WHERE `tbl_monthly_total_chalan`.`id` = 16264;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '206' WHERE `tbl_monthly_total_chalan`.`id` = 16265;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '26' WHERE `tbl_monthly_total_chalan`.`id` = 16266;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '62' WHERE `tbl_monthly_total_chalan`.`id` = 16267;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '16' WHERE `tbl_monthly_total_chalan`.`id` = 16268;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '47' WHERE `tbl_monthly_total_chalan`.`id` = 16269;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '83' WHERE `tbl_monthly_total_chalan`.`id` = 16270;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '45' WHERE `tbl_monthly_total_chalan`.`id` = 16271;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '207' WHERE `tbl_monthly_total_chalan`.`id` = 16272;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '207' WHERE `tbl_monthly_total_chalan`.`id` = 16273;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '147' WHERE `tbl_monthly_total_chalan`.`id` = 16274;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '37' WHERE `tbl_monthly_total_chalan`.`id` = 16275;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '40' WHERE `tbl_monthly_total_chalan`.`id` = 16276;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '65' WHERE `tbl_monthly_total_chalan`.`id` = 16277;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '20' WHERE `tbl_monthly_total_chalan`.`id` = 16278;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '48' WHERE `tbl_monthly_total_chalan`.`id` = 16279;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '20' WHERE `tbl_monthly_total_chalan`.`id` = 16280;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '46' WHERE `tbl_monthly_total_chalan`.`id` = 16281;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '23' WHERE `tbl_monthly_total_chalan`.`id` = 16282;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '19' WHERE `tbl_monthly_total_chalan`.`id` = 16283;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '230' WHERE `tbl_monthly_total_chalan`.`id` = 16284;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '228' WHERE `tbl_monthly_total_chalan`.`id` = 16285;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '228' WHERE `tbl_monthly_total_chalan`.`id` = 16286;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '210' WHERE `tbl_monthly_total_chalan`.`id` = 16287;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '210' WHERE `tbl_monthly_total_chalan`.`id` = 16288;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '213' WHERE `tbl_monthly_total_chalan`.`id` = 16289;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '221' WHERE `tbl_monthly_total_chalan`.`id` = 16291;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '211' WHERE `tbl_monthly_total_chalan`.`id` = 16292;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '211' WHERE `tbl_monthly_total_chalan`.`id` = 16293;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '211' WHERE `tbl_monthly_total_chalan`.`id` = 16294;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '211' WHERE `tbl_monthly_total_chalan`.`id` = 16295;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '211' WHERE `tbl_monthly_total_chalan`.`id` = 16296;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '209' WHERE `tbl_monthly_total_chalan`.`id` = 16298;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '46' WHERE `tbl_monthly_total_chalan`.`id` = 16299;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '37' WHERE `tbl_monthly_total_chalan`.`id` = 16300;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '39' WHERE `tbl_monthly_total_chalan`.`id` = 16301;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '51' WHERE `tbl_monthly_total_chalan`.`id` = 16302;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '10' WHERE `tbl_monthly_total_chalan`.`id` = 16303;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '12' WHERE `tbl_monthly_total_chalan`.`id` = 16304;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '28' WHERE `tbl_monthly_total_chalan`.`id` = 16305;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '223' WHERE `tbl_monthly_total_chalan`.`id` = 16306;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '204' WHERE `tbl_monthly_total_chalan`.`id` = 16307;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '204' WHERE `tbl_monthly_total_chalan`.`id` = 16308;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '204' WHERE `tbl_monthly_total_chalan`.`id` = 16309;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '204' WHERE `tbl_monthly_total_chalan`.`id` = 16310;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '204' WHERE `tbl_monthly_total_chalan`.`id` = 16311;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '204' WHERE `tbl_monthly_total_chalan`.`id` = 16312;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '27' WHERE `tbl_monthly_total_chalan`.`id` = 16313;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '26' WHERE `tbl_monthly_total_chalan`.`id` = 16315;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '25' WHERE `tbl_monthly_total_chalan`.`id` = 16316;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '221' WHERE `tbl_monthly_total_chalan`.`id` = 16317;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '212' WHERE `tbl_monthly_total_chalan`.`id` = 16318;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '209' WHERE `tbl_monthly_total_chalan`.`id` = 16319;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '208' WHERE `tbl_monthly_total_chalan`.`id` = 16320;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '209' WHERE `tbl_monthly_total_chalan`.`id` = 16321;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '209' WHERE `tbl_monthly_total_chalan`.`id` = 16322;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '209' WHERE `tbl_monthly_total_chalan`.`id` = 16323;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '201' WHERE `tbl_monthly_total_chalan`.`id` = 16324;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '201' WHERE `tbl_monthly_total_chalan`.`id` = 16325;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '201' WHERE `tbl_monthly_total_chalan`.`id` = 16326;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '201' WHERE `tbl_monthly_total_chalan`.`id` = 16327;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '201' WHERE `tbl_monthly_total_chalan`.`id` = 16328;
UPDATE `tbl_monthly_total_chalan` SET `chalan_serial_no` = '1' WHERE `tbl_monthly_total_chalan`.`id` = 16330;
/****************************************************************************************************************/
ALTER TABLE `master_gpf_transaction` ADD `partava_amt` DOUBLE(10,2) NOT NULL DEFAULT '0.00' AFTER `month_march_seven_pay`, ADD `partava_date` VARCHAR(30) NULL DEFAULT NULL AFTER `partava_amt`, ADD `partava_month` INT NULL DEFAULT NULL AFTER `partava_date`, ADD `na_partava_amt` DOUBLE(10,2) NOT NULL DEFAULT '0.00' AFTER `partava_month`, ADD `na_partava_date` VARCHAR(30) NULL DEFAULT NULL AFTER `na_partava_amt`, ADD `na_partava_month` INT NULL DEFAULT NULL AFTER `na_partava_date`, ADD `antim_adayi_amt` DOUBLE(10,2) NOT NULL DEFAULT '0.00' AFTER `na_partava_month`, ADD `antim_adayi_date` VARCHAR(30) NULL DEFAULT NULL AFTER `antim_adayi_amt`, ADD `antim_adayi_month` INT NULL DEFAULT NULL AFTER `antim_adayi_date`;


ALTER TABLE `master_employee` ADD `antim_partava_status` TINYINT NOT NULL DEFAULT '0' COMMENT '0 Not Paid, 1 Paid' AFTER `is_active`;

ALTER TABLE `tbl_master_withdrawal` ADD `remark` VARCHAR(200) NULL DEFAULT NULL AFTER `bill_id`;

ALTER TABLE `master_gpf_transaction` ADD `withdraw_remark` VARCHAR(200) NULL DEFAULT NULL AFTER `antim_adayi_month`;

UPDATE master_gpf_transaction AS gt
LEFT JOIN tbl_master_withdrawal AS mw ON mw.gpf_no = gt.gpf_number SET
gt.partava_amt = mw.partava_amt,
gt.partava_date = mw.partava_date,
gt.partava_month = CASE WHEN mw.partava_amt > 0 THEN mw.month_id ELSE 0 END,
gt.na_partava_amt = mw.na_partava_amt,
gt.na_partava_date = mw.na_partava_date,
gt.na_partava_month = CASE WHEN mw.na_partava_amt > 0 THEN mw.month_id ELSE 0 END,
gt.antim_adayi_amt = mw.antim_adayi_amt,
gt.antim_adayi_date = mw.antim_adayi_date,
gt.antim_adayi_month = CASE WHEN mw.antim_adayi_amt > 0 THEN mw.month_id ELSE 0 END
WHERE gt.gpf_number = mw.gpf_no;

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
  month_april_contri=(month_april_contri+(CASE WHEN new.emc_month=4 AND emc.is_active=1 THEN new.monthly_contrubition ELSE 0 END)),
	month_may_contri=(month_may_contri+(CASE  WHEN new.emc_month=5 AND emc.is_active=1 THEN new.monthly_contrubition ELSE 0 END)),
	month_june_contri=(month_june_contri+(CASE  WHEN new.emc_month=6 AND emc.is_active=1 THEN new.monthly_contrubition ELSE 0 END)),
	month_july_contri=(month_july_contri+(CASE  WHEN new.emc_month=7 AND emc.is_active=1 THEN new.monthly_contrubition ELSE 0 END)),
	month_aug_contri=(month_aug_contri + (CASE  WHEN new.emc_month=8 AND emc.is_active=1 THEN new.monthly_contrubition ELSE 0 END)),
	month_september_contri=(month_september_contri+(CASE WHEN new.emc_month=9 AND emc.is_active=1 THEN new.monthly_contrubition ELSE 0 END)),
  month_octomber_contri=(month_octomber_contri+(CASE WHEN new.emc_month=10 AND emc.is_active=1 THEN new.monthly_contrubition ELSE 0 END)),
  month_november_contri=(month_november_contri+(CASE WHEN new.emc_month=11 AND emc.is_active=1 THEN new.monthly_contrubition ELSE 0 END)),
  month_december_contri=(month_december_contri+(CASE WHEN new.emc_month=12 AND emc.is_active=1 THEN new.monthly_contrubition ELSE 0 END)),
  month_jan_contri=(month_jan_contri + (CASE  WHEN new.emc_month=1 AND emc.is_active=1 THEN new.monthly_contrubition ELSE 0 END)),
  month_feb_contri=(month_feb_contri + (CASE  WHEN new.emc_month=2 AND emc.is_active=1 THEN new.monthly_contrubition ELSE 0 END)),
  month_march_contri=(month_march_contri+(CASE WHEN new.emc_month=3 AND emc.is_active=1 THEN new.monthly_contrubition ELSE 0 END)),

  month_april_recive=(month_april_recive+(CASE WHEN new.emc_month=4 AND emc.is_active=1 THEN new.monthly_received ELSE 0 END)),
	month_may_recive=(month_may_recive+(CASE  WHEN new.emc_month=5 AND emc.is_active=1 THEN new.monthly_received ELSE 0 END)),
	month_june_recive=(month_june_recive+(CASE  WHEN new.emc_month=6 AND emc.is_active=1 THEN new.monthly_received ELSE 0 END)),
	month_july_recive=(month_july_recive+(CASE  WHEN new.emc_month=7 AND emc.is_active=1 THEN new.monthly_received ELSE 0 END)),
	month_aug_recive=(month_aug_recive + (CASE  WHEN new.emc_month=8 AND emc.is_active=1 THEN new.monthly_received ELSE 0 END)),
	month_september_recive=(month_september_recive+(CASE WHEN new.emc_month=9 AND emc.is_active=1 THEN new.monthly_received ELSE 0 END)),
  month_octomber_recive=(month_octomber_recive+(CASE WHEN new.emc_month=10 AND emc.is_active=1 THEN new.monthly_received ELSE 0 END)),
  month_november_recive=(month_november_recive+(CASE WHEN new.emc_month=11 AND emc.is_active=1 THEN new.monthly_received ELSE 0 END)),
  month_december_recive=(month_december_recive+(CASE WHEN new.emc_month=12 AND emc.is_active=1 THEN new.monthly_received ELSE 0 END)),
  month_jan_recive=(month_jan_recive + (CASE  WHEN new.emc_month=1 AND emc.is_active=1 THEN new.monthly_received ELSE 0 END)),
  month_feb_recive=(month_feb_recive + (CASE  WHEN new.emc_month=2 AND emc.is_active=1 THEN new.monthly_received ELSE 0 END)),
  month_march_recive=(month_march_recive+(CASE WHEN new.emc_month=3 AND emc.is_active=1 THEN new.monthly_received ELSE 0 END)),

  month_april_loan_emi=(month_april_loan_emi+(CASE WHEN new.emc_month=4 AND emc.is_active=1 THEN new.loan_installment ELSE 0 END)),
	month_may_loan_emi=(month_may_loan_emi+(CASE  WHEN new.emc_month=5 AND emc.is_active=1 THEN new.loan_installment ELSE 0 END)),
	month_june_loan_emi=(month_june_loan_emi+(CASE  WHEN new.emc_month=6 AND emc.is_active=1 THEN new.loan_installment ELSE 0 END)),
	month_july_loan_emi=(month_july_loan_emi+(CASE  WHEN new.emc_month=7 AND emc.is_active=1 THEN new.loan_installment ELSE 0 END)),
	month_aug_loan_emi=(month_aug_loan_emi + (CASE  WHEN new.emc_month=8 AND emc.is_active=1 THEN new.loan_installment ELSE 0 END)),
	month_september_loan_emi=(month_september_loan_emi+(CASE WHEN new.emc_month=9 AND emc.is_active=1 THEN new.loan_installment ELSE 0 END)),
  month_octomber_loan_emi=(month_octomber_loan_emi+(CASE WHEN new.emc_month=10 AND emc.is_active=1 THEN new.loan_installment ELSE 0 END)),
  month_november_loan_emi=(month_november_loan_emi+(CASE WHEN new.emc_month=11 AND emc.is_active=1 THEN new.loan_installment ELSE 0 END)),
  month_december_loan_emi=(month_december_loan_emi+(CASE WHEN new.emc_month=12 AND emc.is_active=1 THEN new.loan_installment ELSE 0 END)),
  month_jan_loan_emi=(month_jan_loan_emi + (CASE  WHEN new.emc_month=1 AND emc.is_active=1 THEN new.loan_installment ELSE 0 END)),
  month_feb_loan_emi=(month_feb_loan_emi + (CASE  WHEN new.emc_month=2 AND emc.is_active=1 THEN new.loan_installment ELSE 0 END)),
  month_march_loan_emi=(month_march_loan_emi+(CASE WHEN new.emc_month=3 AND emc.is_active=1 THEN new.loan_installment ELSE 0 END)),

  month_april_other=(month_april_other+(CASE WHEN new.emc_month=4 AND emc.is_active=1 THEN new.monthly_other ELSE 0 END)),
	month_may_other=(month_may_other+(CASE  WHEN new.emc_month=5 AND emc.is_active=1 THEN new.monthly_other ELSE 0 END)),
	month_june_other=(month_june_other+(CASE  WHEN new.emc_month=6 AND emc.is_active=1 THEN new.monthly_other ELSE 0 END)),
	month_july_other=(month_july_other+(CASE  WHEN new.emc_month=7 AND emc.is_active=1 THEN new.monthly_other ELSE 0 END)),
	month_aug_other=(month_aug_other + (CASE  WHEN new.emc_month=8 AND emc.is_active=1 THEN new.monthly_other ELSE 0 END)),
	month_september_other=(month_september_other+(CASE WHEN new.emc_month=9 AND emc.is_active=1 THEN new.monthly_other ELSE 0 END)),
  month_octomber_other=(month_octomber_other+(CASE WHEN new.emc_month=10 AND emc.is_active=1 THEN new.monthly_other ELSE 0 END)),
  month_november_other=(month_november_other+(CASE WHEN new.emc_month=11 AND emc.is_active=1 THEN new.monthly_other ELSE 0 END)),
  month_december_other=(month_december_other+(CASE WHEN new.emc_month=12 AND emc.is_active=1 THEN new.monthly_other ELSE 0 END)),
  month_jan_other=(month_jan_other + (CASE  WHEN new.emc_month=1 AND emc.is_active=1 THEN new.monthly_other ELSE 0 END)),
  month_feb_other=(month_feb_other + (CASE  WHEN new.emc_month=2 AND emc.is_active=1 THEN new.monthly_other ELSE 0 END)),
  month_march_other=(month_march_other+(CASE WHEN new.emc_month=3 AND emc.is_active=1 THEN new.monthly_other ELSE 0 END))

	WHERE gpf_number = new.gpf_number ;
  END

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
