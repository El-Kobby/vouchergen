<?php
include '../config/config.php';

$employee_name = $_POST['employee_name'];
$status = $_POST['status'];

//echo $employee_name;

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $addemp = "INSERT INTO `employees` (employee_name, employeestatus) values (?, ?)";
    if($conn->prepare($addemp)->execute([$employee_name, $status])){
        echo "Successful add";
    }
    else{
        echo "Unsuccessful Attempt";
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();

}

