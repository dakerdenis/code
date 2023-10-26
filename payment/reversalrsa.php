<html>
<head>
<title>Reversal</title>
</head>
<body bgcolor="#f0f0f0" text="#000000" leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

                <center><table border="0" cellpadding="5" cellspacing="5" width="590">
                  <form id="reversal__second_form" ACTION="https://testmpi.3dsecure.az/cgi-bin/cgi_link" METHOD="POST">

                  <tbody>
                  <tr>
                      <td colspan="3" valign="top"><center><font size="4">Reversal form.</font></center></td>
                  </tr>
                  <tr>
                      <td colspan="3" valign="top"><font size="3"></font></td>
                  </tr>
                  <tr bgcolor="#808080">
                      <td colspan="3" valign="top">Reversal Details</td>
                      </tr>

                 


          <?php
          

          $reversal_amount = $_POST['reversal_amount'];
          $reversal_currency = $_POST['reversal_currency'];
          $reversal_trtype = $_POST['reversal_trtype'];
          $reversal_order = $_POST['reversal_order'];
          $reversal_rrr = $_POST['reversal_rrr'];
          $reversal_intref = $_POST['reversal_intref'];    




          error_reporting(E_ALL);
          ini_set("display_errors", 1);

          // Getting required fields
          
          $oper_time = gmdate("YmdHis"); // Date and time UTC
          $nonce = substr(md5(rand()), 0, 16); // Random data      

          // These fields must be equal such fields getting from authorization responce
          $db_row['AMOUNT'] = '2.00';
          $db_row['CURRENCY'] = '944';
          $db_row['TERMINAL'] = '17202606';
          $db_row['TRTYPE'] = '22';// That is the type of operation, 22 - Reversal
          $db_row['ORDER'] =  '20230829104137';
          $db_row['RRN'] = '326476463749';
          $db_row['INT_REF'] = '4D9F69B6B5B55DEA';
          $db_row['TIMESTAMP'] = $oper_time;
          $db_row['NONCE'] = $nonce;
          // Bank reference number
          // Internal reference number
          // These fields shouldn't change anytime          
          // Fields generated automatically
          $oper_time = gmdate("YmdHis"); // Date and time UTC
          $nonce = substr(md5(rand()), 0, 16); // Random data          
          // ------------------------------
          foreach ($db_row as $key => $value) {
            echo "<tr><td>$key" . " = " . "$value</td></tr>";
            #echo "<input name=\"$key\" value=\"$value\" type=\"hidden\">";
          }
          // Creating form hidden fields          
          echo "<input name=\"AMOUNT\" value=\"{$db_row['AMOUNT']}\" type=\"hidden\">
                                <input name=\"CURRENCY\" value=\"{$db_row['CURRENCY']}\" type=\"hidden\">
                                <input name=\"TERMINAL\" value=\"{$db_row['TERMINAL']}\" type=\"hidden\">
                                <input name=\"TRTYPE\" value=\"{$db_row['TRTYPE']}\" type=\"hidden\">                                
                                <input name=\"ORDER\" value=\"{$db_row['ORDER']}\" type=\"hidden\">
                                <input name=\"RRN\" value=\"{$db_row['RRN']}\" type=\"hidden\">
                                <input name=\"INT_REF\" value=\"{$db_row['INT_REF']}\" type=\"hidden\">
                                <input name=\"TIMESTAMP\" value=\"{$db_row['TIMESTAMP']}\" type=\"hidden\">
                                <input name=\"NONCE\" value=\"{$db_row['NONCE']}\" type=\"hidden\">
                                ";

          // ------------------------------------------------
          
          // Making P_SIGN (MAC)              -         Checksum of request
          // All following fields must be equal with hidden fields above
          
          $privateKey = file_get_contents(__DIR__ . '/../../keys/merchant_private_key.pem');  // here should be your privet key directory
          $publicKey = file_get_contents(__DIR__ . '/../../keys/merchant_public_key.pem'); 
          
          $to_sign = strlen($db_row['AMOUNT']) . $db_row['AMOUNT']
            . strlen($db_row['CURRENCY']) . $db_row['CURRENCY']
            . strlen($db_row['TERMINAL']) . $db_row['TERMINAL']
            . strlen($db_row['TRTYPE']) . $db_row['TRTYPE']
            . strlen($db_row['ORDER']) . $db_row['ORDER']
            . strlen($db_row['RRN']) . $db_row['RRN']
            . strlen($db_row['INT_REF']) . $db_row['INT_REF'];


          $db_row['MAC'] = $to_sign;
          $P_SIGN = '';
          openssl_sign($to_sign, $P_SIGN, $privateKey, OPENSSL_ALGO_SHA256);
          $ok = openssl_verify($to_sign, $P_SIGN, $publicKey, OPENSSL_ALGO_SHA256);
          $db_row['P_SIGN'] = bin2hex($P_SIGN);
          echo "<input name=\"P_SIGN\" value=\"{$db_row['P_SIGN']}\" type=\"text\">";

          ?>
                                                                
            <table border="0" cellpadding="5" cellspacing="5" width="590" align="center">
              <input alt="Submit" type="submit"/>
            </tbody></table>
</form>             

<script>
   // window.onload = function(){
   //         document.getElementById('reversal__second_form').submit();
   // }
</script>

</table>
<br><center><hr WIDTH="100%"></center></body>
</html>
