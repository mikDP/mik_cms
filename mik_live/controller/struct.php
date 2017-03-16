<?php

$sql = "SELECT content FROM docs_it WHERE id<=1";
$structure = $conn_cms->query($sql);
$struttura = array();

while ($data_structure = mysqli_fetch_assoc($structure)) {
    $struttura[] = $data_structure;
}
$header = $struttura[0];
$footer = $struttura[1];

?>