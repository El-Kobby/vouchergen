<?php
   // set_time_limit(500);
   //var_dump($_POST);
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
    
    $numberdays = $_POST['customnumber_days'];

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
            $validityperiod_from2 = $_POST['customdate_begin'];
            $validityperiod_to2 = $_POST['customdate_end'];
            $colour2 = $_POST['customcolor_voucher'];

            if($stmt4->execute()){
                echo "Generated Successfully";
            }
            else{
                echo "Unsuccessful";
            }
        }
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>