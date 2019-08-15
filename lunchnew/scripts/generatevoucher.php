<?php
set_time_limit(500);
include '../config/config.php';

function random_str($length, $keyspace = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
}

$numberdays = $_POST['number_days'];

//echo $numberdays; echo '</br>';
//echo $_POST['color_voucher']; echo '</br>';
//echo $_POST['date_begin']; echo '</br>';
//echo $_POST['date_end']; echo '</br>';


//if(isset($_POST['vouch_gen'])) {
 //echo $_POST['date_begin'];
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $empsql = "SELECT employee_name FROM employees WHERE employeestatus = 'Active'";
        $stmt2 = $conn->prepare($empsql);
        $stmt2->execute();
        $emp = $stmt2->fetchAll();


        $gensql = "INSERT INTO `vouchers` (employee_name, serial_number, validityperiod_from, validityperiod_to, colour) VALUES (:employee_name,:serial_number,:validityperiod_from,:validityperiod_to,:colour)";
        //$gensql = "INSERT INTO `vouchers` (employee_name, serial_number, validityperiod_from, validityperiod_to, colour) VALUES (?, ?, ?, ?, ?)";
        $stmt3 = $conn->prepare($gensql);
        $stmt3->bindParam(':employee_name', $employee_name);
        $stmt3->bindParam(':serial_number', $serial_number);
        $stmt3->bindParam(':validityperiod_from', $validityperiod_from);
        $stmt3->bindParam(':validityperiod_to', $validityperiod_to);
        $stmt3->bindParam(':colour', $colour);


        foreach($emp as $empone){
            for($i=0; $i<$numberdays; $i++){
                $employee_name = $empone['employee_name'];
                $serial_number = random_str(10);
                $validityperiod_from = $_POST['date_begin'];
                $validityperiod_to = $_POST['date_end'];
                $colour = $_POST['color_voucher'];

                if($stmt3->execute()){
                    echo "Generated Successfully";
                }
                else {
                    echo "Unsuccessful";
                }
            }
        }



    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
//}
/*elseif (isset($_POST['customvouch_gen'])){
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $customgensql = "INSERT INTO `vouchers` (employee_name, serial_number, validityperiod_from, validityperiod_to, colour) VALUES (:employee_name,:serial_number,:validityperiod_from,:validityperiod_to,:colour)";
        //$gensql = "INSERT INTO `vouchers` (employee_name, serial_number, validityperiod_from, validityperiod_to, colour) VALUES (?, ?, ?, ?, ?)";
        $stmt4 = $conn->prepare($customgensql);
        $stmt4->bindParam(':employee_name', $customemployee_name);
        $stmt4->bindParam(':serial_number', $serial_number2);
        $stmt4->bindParam(':validityperiod_from', $validityperiod_from2);
        $stmt4->bindParam(':validityperiod_to', $validityperiod_to2);
        $stmt4->bindParam(':colour', $colour2);

        for($i=0; $i<$numberdays; $i++){
            $customemployee_name = $_POST['customname_select'];
            $serial_number2 = random_str(10);
            $validityperiod_from2 = $_POST['date_begin'];
            $validityperiod_to2 = $_POST['date_end'];
            $colour2 = $_POST['color_voucher'];

            $stmt4->execute();
        }
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


}

header("Content-type: application/json");
die(json_encode(array("success" => $result))); */