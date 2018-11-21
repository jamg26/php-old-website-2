<?php
session_start();
if(isset($_POST["username"])) {
    $con = '';
    require ('../db.php');
    // removes backslashes
    $username = stripslashes($_POST["username"]);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($con, $username);
    $password = stripslashes($_POST["password"]);
    $password = mysqli_real_escape_string($con, $password);
    //Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE username='$username' and password='" . md5($password) . "'";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $_SESSION["username"] = $_POST["username"];
        echo 'Yes';
    } else {
        echo 'No';
    }
}
?>