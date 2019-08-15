<?php
    
    include '../config/config.php';
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $gendate = $_POST['voucher_period'];

        $gendate = explode('-', $gendate);
        
        $year  = $gendate[0];
        $month = $gendate[1];


        $vouchersql = "SELECT * FROM vouchers WHERE YEAR(validityperiod_from) = $year AND MONTH(validityperiod_from) = $month";
        $stmt3 = $conn->prepare($vouchersql);
        $stmt3->execute(); 
        //$row = $stmt3->fetch(PDO::FETCH_ASSOC);
    }

        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        


?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="../scss/voucherstyle.css" media="screen, print">



        <style>


            @media print {

                 table {

                     page-break-inside: avoid;
                     page-break-after: always;

                 }

                 tr {
                     page-break-inside: avoid;
                     page-break-after: always;
                 }


             }




        </style>

        
       
    </head>

    <body>
        
  
        <?php 
          
           $rows = $stmt3->fetchAll();

            echo '<table>';
          
            $i=0;
            $close=0;

            
           foreach($rows as $row) {

               if ($i % 4 == 0) {
                   echo '<tr>';

                   //echo ( "<tr style='page-break-after:always;'>" );
                   $close += 19;
               }
               echo '<td>';
               $colorrow = $row['colour'];
               ?>
                <div class="voucherbox" style="height:180px;width:360px;background-color: <?php echo $colorrow; ?>">
                <?php

               echo '<p>' . $row['validityperiod_from'] . '</p>';
               echo '<p>' . $row['validityperiod_to'] . '</p>';
               echo '<p>' . $row['employee_name'] . '</p>';
               echo '<p>' . $row['serial_number'] . '</p>';

               echo '</div>';

               print '</td>';
               if ($i == $close){
                   echo '</tr>';
           }

                $i++;

            }
            

            echo '</table>';
        
        ?>


    
    </body>
</html>