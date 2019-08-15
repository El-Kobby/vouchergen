<?php
include '../config/config.php';
$employeeid = $_POST['name_select'];
$statusupdate = $_POST['status_update'];




try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $updaterecords = "UPDATE employees SET employeestatus=? WHERE id=?";
    $updatestmt = $conn->prepare($updaterecords);
    if($updatestmt->execute([$statusupdate, $employeeid])){
        echo "Successfully updated";
    }
    else{
        echo "Unsuccessfull";
    }

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();

}

?>