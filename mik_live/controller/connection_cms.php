<?php
//Crea la connessione al datbase usando mysqli 
$servername = "localhost";
$username = "root";
$password = "prova123";
$databasename = "mik_cms";

// Create connection
$conn_cms = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?> 
