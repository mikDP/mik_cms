<?php

include("connection.php");

$sql = "SELECT * FROM lingue";
$lingue = $conn->query($sql);

$action = $_GET["action"];



if ($action == "new") {
    $id_lingua = $_POST["id_lan"];
    $lingua = $_POST["lan"];
    $sql = "INSERT INTO lingue(id,lingua) VALUES ('$id_lingua','$lingua')";
    $conn->query($sql);
    header("Location:../resources/views/lingue/lingue.php");
    exit;
}

if ($action == "update") {
    $lingua = $_POST["lan"];
    $id_lingua = $_GET["id"];
    $sql = "UPDATE lingue SET lingua='$lingua' WHERE id='$id_lingua'";
    $conn->query($sql);
    header("Location:../resources/views/lingue/lingue.php");
    exit;
}

if ($action == "align") {
    $id_lingua = $_GET['id'];
    $sql = "CREATE TABLE docs_$id_lingua (id int NOT NULL AUTO_INCREMENT, title varchar (50), date timestamp, category int(11), content mediumtext,PRIMARY KEY (ID))";
    $conn->query($sql);
    
    //utilizzare l'api di google traslate
    
    header("Location:../resources/views/lingue/lingue.php");
    exit;
}

$conn->close();
?>