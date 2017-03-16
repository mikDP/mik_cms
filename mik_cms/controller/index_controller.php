<?php
include($_SERVER['DOCUMENT_ROOT'] . "/mik_cms/controller/connection.php");

$sql = "SELECT * FROM categories WHERE menu = 0 AND parent = 0 ORDER BY position ASC";
$parents = $conn->query($sql);

$sql = "SELECT * FROM categories WHERE menu = 0 AND parent != 0 ORDER BY position ASC";
$childs = $conn->query($sql);

$genitori = array();
$figli = array();

while ($data_parent = mysqli_fetch_array($parents)) {
    $genitori[] = $data_parent;
}
while ($data_child = mysqli_fetch_array($childs)) {
    $figli[] = $data_child;
}



$conn->close();
?>