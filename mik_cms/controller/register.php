<?php
error_reporting(E_ALL);
include('connection.php');

$user = $_POST["user"];
$hashedpassword = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "INSERT INTO users(user,password) VALUES ('$user', '$hashedpassword')";

if ($conn->query($sql) === TRUE) {    header("Location:/mik_cms/resources/views/login/accedi.php?errore=Utente creato correttamente");
    exit;
} else {
    header("Location:/mik_cms/resources/views/login/registrati.php?errore=Errore, ritenta");
    exit;
}
$conn->close();
?>