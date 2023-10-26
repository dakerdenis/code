<?php
// Load the database configuration file 
include_once 'dbConfig.php';
if (isset($_POST['export_excel'])) {
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];

  // $date_start = date('Y-m-d', strtotime($date_start));
  // $date_end = date('Y-m-d', strtotime($date_end));

    // Filter the excel data 
    function filterData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if (strstr($str, '"'))
            $str = '"' . str_replace('"', '""', $str) . '"';
    }

    // Excel file name for download 
    $fileName = "members-data_" . date('Y-m-d') . ".xls";

    // Column names 
    $fields = array('ID', 'name', 'number', 'price', 'ref', 'message', 'status', 'created');

    // Display column names as first row 
    $excelData = implode("\t", array_values($fields)) . "\n";

    // Fetch records from database 
    $query = $db->query("SELECT * FROM payments WHERE created BETWEEN  '{$date_start}' AND '{$date_end}' ORDER BY `created` DESC");
    if ($query->num_rows > 0) {
        // Output each row of the data 
        while ($row = $query->fetch_assoc()) {
            $time_name = $row['name'];
            $time_name = str_replace("ə","e",$time_name);
            $time_name = str_replace("Ə","E",$time_name);
            $time_name = str_replace("i","i", $time_name);
            $time_name = str_replace("ş","s", $time_name);
            $time_name = str_replace("Ş","S", $time_name);
            $time_name = str_replace("İ","I", $time_name);
            $time_name = str_replace("ü","u", $time_name);
            $time_name = str_replace("Ü","u", $time_name);
            $time_name = str_replace("ğ","g", $time_name);
            $time_name = str_replace("Ğ","G", $time_name);
            $time_name = str_replace("ö","o", $time_name);
            $time_name = str_replace("ı","i", $time_name);
            $time_name = str_replace("Ç","C", $time_name);
            $time_name = str_replace("ç","c", $time_name);


           
            $number_name = $row['number'];
            $number_name = str_replace("ə","e",$number_name);
            $number_name = str_replace("Ə","E",$number_name);
            $number_name = str_replace("i","i",$number_name);
            $number_name = str_replace("ş","s",$number_name);
            $number_name = str_replace("Ş","S",$number_name);
            $number_name = str_replace("İ","I",$number_name);
            $number_name = str_replace("ü","u",$number_name);
            $number_name = str_replace("Ü","u",$number_name);
            $number_name = str_replace("ğ","g",$number_name);
            $number_name = str_replace("Ğ","G",$number_name);
            $number_name = str_replace("ö","o",$number_name);
            $number_name = str_replace("ı","i",$number_name);
            $number_name = str_replace("Ç","C",$number_name);
            $number_name = str_replace("ç","c",$number_name);

             $price = strval($row['price']);
              $price_row =  explode('.', $price);
              if($price_row[1]){
                $price_final = $price_row[0] . "," . $price_row[1]; 
                $price_final = strval($price_final);
              } else {
                $price_final = $price_row[0];
                $price_final = strval($price_final);
              }
              

            $status = ($row['status'] == 1) ? 'Active' : 'Inactive';
            $lineData = array($row['id'], $time_name, $number_name, $price_final, $row['ref'], $row['message'], $row['status'], $row['created'], $status);
            array_walk($lineData, 'filterData');
            $excelData .= implode("\t", array_values($lineData)) . "\n";
        }
    } else {
        $excelData .= 'No records found...' . "\n";
    }

    // Headers for download 
   // header("Content-Type: application/vnd.ms-excel");


    header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
    // Render excel data 
    echo $excelData;

    exit;
}