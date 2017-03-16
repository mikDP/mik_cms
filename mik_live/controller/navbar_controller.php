<?php

include("connection_cms.php");


$sql = "SELECT *  FROM categories WHERE active=1 AND menu = 1 AND parent = 0 ORDER BY position ASC";
$parents = $conn_cms->query($sql);

$sql = "SELECT *  FROM categories WHERE active=1 AND menu = 1 AND parent != 0 ORDER BY position ASC";
$childs = $conn_cms->query($sql);

$nav_menu_genitori = array();
$nav_menu_figli = array();

while ($data_men_par = mysqli_fetch_array($parents)) {
    $nav_menu_genitori[] = $data_men_par;
}

while ($data_men_chil = mysqli_fetch_array($childs)) {
    $nav_menu_figli[] = $data_men_chil;
}

foreach ($nav_menu_figli as $figlio) {
     foreach($nav_menu_genitori as $key=>$value){
         if($figlio['parent'] == $value['id']){
             $nav_menu_genitori[$key]['hasChild'] = 1;
         }
     }
}


$conn_cms->close();
?>