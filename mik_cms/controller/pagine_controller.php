<?php

include("connection.php");

//Acquisizione variabili GET
$action = $_GET["action"];
$category = $_GET["cat"];

//Fetch dei dati
$sql = "SELECT id,menu, category FROM categories WHERE id ='$category'";
$id_cat = mysqli_fetch_row($conn->query($sql));

if ($id_cat == NULL) {
    header("Location:../index.php");
    exit();
}


$sql = "SELECT * FROM docs_it WHERE category='$id_cat[0]'";
$data = $conn->query($sql);


$sql = "SELECT * FROM lingue";
$lingue = $conn->query($sql);



if ($action == "article") {
    $id = $_GET["id"];
    header("Location:../resources/views/pagine/articolo.php?cat=$category&id=$id");
    exit;
}

if ($action == "delete") {

    //L'eliminazione deve avvenire per tutte le lingue?
    $sql = "DELETE FROM docs_it WHERE id=" . $_GET["id"];
    $conn->query($sql);
    $sql = "UPDATE media SET usedin= 'NULL' WHERE usedin='" . $_GET["id"] . "'";
    $conn->query($sql);
    header("Location:../resources/views/pagine/pagine.php?cat=$category&errore=Articolo eliminato correttamente.");
    exit;
}

$conn->close();
?>
