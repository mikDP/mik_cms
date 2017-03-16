<?php
include($_SERVER['DOCUMENT_ROOT'] . "/mik_live/controller/connection_cms.php");
include($_SERVER['DOCUMENT_ROOT'] . "/mik_live/controller/struct.php");


$id_articolo = $_GET['id'];

$sql = "SELECT * FROM docs_it WHERE id= '$id_articolo'";
$articolo =  mysqli_fetch_array($conn_cms->query($sql));

$sql = "SELECT * FROM docs_it WHERE home =1";
$home =  mysqli_fetch_array($conn_cms->query($sql));


$conn_cms->close();
?>