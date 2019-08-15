<?php
include ('../conn.php');

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = $conn->query("Select * from tblogin where username = '$username' and password ='$password' ");
    $count = $query->rowcount();
    $row = $query->fetch();

    if ($count > 0) {
        session_start();
        $_SESSION['id'] = $row['id'];
        header('location:../index.php');
    } else {
        ?>
        <script>
            alert("The combination of User Name and Password is invalid!")
            window.location = "index.php";
        </script>
        <?php
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
