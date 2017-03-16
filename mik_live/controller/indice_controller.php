<?php

include($_SERVER['DOCUMENT_ROOT'] . "/mik_live/controller/connection_cms.php");
include($_SERVER['DOCUMENT_ROOT'] . "/mik_live/controller/struct.php");

$sql = "SELECT * FROM categories WHERE menu = 0 AND parent = 0 ORDER BY position ASC";
$parents = $conn_cms->query($sql);

$sql = "SELECT * FROM categories WHERE menu = 0 AND parent != 0 ORDER BY position ASC";
$childs = $conn_cms->query($sql);

$genitori = array();
$figli = array();

while ($data_parent = mysqli_fetch_array($parents)) {
    $genitori[] = $data_parent;
}
while ($data_child = mysqli_fetch_array($childs)) {
    $figli[] = $data_child;
}




$conn_cms->close();
?>