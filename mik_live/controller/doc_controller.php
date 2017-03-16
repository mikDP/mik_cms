<?php
include($_SERVER['DOCUMENT_ROOT'] . "/mik_live/controller/connection_cms.php");
include($_SERVER['DOCUMENT_ROOT'] . "/mik_live/controller/struct.php");

$id_categoria = $_GET['id'];

$sql = "SELECT * FROM categories WHERE id= '$id_categoria'";
$categoria =  mysqli_fetch_array($conn_cms->query($sql));


$sql = "SELECT * FROM categories WHERE parent= '$id_categoria' ORDER BY position ASC";
$sub_cat = $conn_cms->query($sql);


$sql = "SELECT * FROM docs_it WHERE category = '$id_categoria' ";
$art_cat_principale = $conn_cms->query($sql);


$sub_category = array();
$documenti = array();
$articoli_cat_principale = array();


while ($data_art_cat = mysqli_fetch_array($art_cat_principale)) {
   $articoli_cat_principale[] = $data_art_cat;
}

while ($data_sub_cat = mysqli_fetch_array($sub_cat)) {
    $sub_category[] = $data_sub_cat;
}

foreach($sub_category as $category){
    $documenti[] = $category[0];
}

$id_da_cercare = implode(',', $documenti);

$sql = "SELECT * FROM docs_it WHERE category IN ($id_da_cercare)";
$articoli = $conn_cms->query($sql);

$articoli_selezionati = array();

while ($data_articoli = mysqli_fetch_array($articoli)) {
    $articoli_selezionati[] = $data_articoli;
}




$conn_cms->close();
?>