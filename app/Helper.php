<?php

/**
* change plain number to formatted currency
*
* @param $number
* @param $currency
*/

function convertToIndianCurrency($number) {
  $no = round($number);
  $decimal = round($number - ($no = floor($number)), 2) * 100;
  $digits_length = strlen($no);
  $i = 0;
  $str = array();
  $words = array(
    0 => '',
    1 => 'One',
    2 => 'Two',
    3 => 'Three',
    4 => 'Four',
    5 => 'Five',
    6 => 'Six',
    7 => 'Seven',
    8 => 'Eight',
    9 => 'Nine',
    10 => 'Ten',
    11 => 'Eleven',
    12 => 'Twelve',
    13 => 'Thirteen',
    14 => 'Fourteen',
    15 => 'Fifteen',
    16 => 'Sixteen',
    17 => 'Seventeen',
    18 => 'Eighteen',
    19 => 'Nineteen',
    20 => 'Twenty',
    30 => 'Thirty',
    40 => 'Forty',
    50 => 'Fifty',
    60 => 'Sixty',
    70 => 'Seventy',
    80 => 'Eighty',
    90 => 'Ninety');
    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_length) {
      $divider = ($i == 2) ? 10 : 100;
      $number = floor($no % $divider);
      $no = floor($no / $divider);
      $i += $divider == 10 ? 1 : 2;
      if ($number >=0) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
      } else {
        $str [] = null;
      }
    }

    $Rupees = implode(' ', array_reverse($str));
    $paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
    return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
  }

  function amount_inr_format($amount) {
    $fmt = new \NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
    return $fmt->format($amount);
  }
  function getApplicationStatus($status){
    return ($status == 0)?'Pending':(($status == 1)?'Approved':'Rejected');
  }
  function digitChange($gpfnum){
    return str_replace(["0","1","2","3","4","5","6","7","8","9"],["०","१","२","३","४","५","६","७","८","९"],$gpfnum);
  }
  function getMonthName($month_id){
    $monthname =  ['1'=>'जानेवारी','2'=>'फेब्रुवारी','3'=>'मार्च','4'=>'एप्रिल','5'=>'मे','6'=>'जून','7'=>'जुलै',
                    '8'=>'ऑगस्ट','9'=>'सप्टेंबर','10'=>'ऑक्टोबर','11'=>'नोव्हेंबर','12'=>'डिसेंबर'];
    return $monthname[$month_id];
  }
