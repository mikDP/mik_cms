<?php

include('connection.php');

$user = $_POST["user"];
$password = $_POST["password"];

$sql = "SELECT password FROM users WHERE user='$user' limit 1";
$result = $conn->query($sql);
$hashedpassword = mysqli_fetch_object($result)->password;

if ((mysqli_num_rows($result) > 0) && (password_verify($password, $hashedpassword))) {
    session_start();
    $_SESSION["user"] = "$user";
    header("Location:/mik_cms/resources/views/index.php");
    exit;
    
} else {
    header("Location:/mik_cms/resources/views/login/accedi.php?errore=Combinazione Username e Password errata");
    exit;
}
$conn->close();
?>