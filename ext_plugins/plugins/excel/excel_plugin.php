<?php 

//excel-plugin

function excel_clean_data(&$str){

    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';

}
// add_listener('clean_excel_data','excel_clean_data');

function excel_export($data){
   
  $filename = "csv_report_data_" . date('Ymd') . '_' . time() . '_' . microtime() . ".xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

  // $header = array_keys($data);
  $header = $data[0];

  //foreach ($this->header as $data){
    echo implode("\t", array_keys($header)) . "\r\n";
    array_walk($header,'excel_clean_data');
    echo implode("\t", array_values($header)) . "\r\n";
  //}

  $flag = false;
  foreach($data as $k=>$row) {
    if ($k > 0){
    
    // if(!$flag) {
    //   // display field/column names as first row
    //   echo implode("\t", array_keys($row)) . "\r\n";
    //   $flag = true;
    // }

    array_walk($row,'excel_clean_data'); //  'excel_clean_data');
    //array_walk($row, 'excel_clean_data');
    echo implode("\t", array_values($row)) . "\r\n";
  
    }
  }
  exit;   

}
add_listener('export_to_excel','excel_export');
