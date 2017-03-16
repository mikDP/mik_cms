<?php

include("connection.php");

$sql = "SELECT * FROM categories WHERE active=1 AND menu= 0 AND parent = 0 ORDER BY position ASC";
$parents = $conn->query($sql);

$sql = "SELECT * FROM categories WHERE active=1 AND menu= 0 AND parent != 0 ORDER BY position ASC";
$childs = $conn->query($sql);

$nav_cat_genitori = array();
$nav_cat_figli = array();

while ($data_cat_par = mysqli_fetch_assoc($parents)) {
    $nav_cat_genitori[] = $data_cat_par;
}

while ($data_cat_chil = mysqli_fetch_assoc($childs)) {
    $nav_cat_figli[] = $data_cat_chil;
}

foreach ($nav_cat_figli as $figlio) {
     foreach($nav_cat_genitori as $key=>$value){
         if($figlio['parent'] == $value['id']){
             $nav_cat_genitori[$key]['hasChild'] = 1;
         }
     }
}

$sql = "SELECT *  FROM categories WHERE active=1 AND menu = 1 AND parent = 0 ORDER BY position ASC";
$parentsm = $conn->query($sql);

$sql = "SELECT *  FROM categories WHERE active=1 AND menu = 1 AND parent != 0 ORDER BY position ASC";
$childsm = $conn->query($sql);

$nav_menu_genitorim = array();
$nav_menu_figlim = array();

while ($data_men_par = mysqli_fetch_array($parentsm)) {
    $nav_menu_genitorim[] = $data_men_par;
}

while ($data_men_chil = mysqli_fetch_array($childsm)) {
    $nav_menu_figlim[] = $data_men_chil;
}

foreach ($nav_menu_figlim as $figlio) {
     foreach($nav_menu_genitorim as $key=>$value){
         if($figlio['parent'] == $value['id']){
             $nav_menu_genitorim[$key]['hasChild'] = 1;
         }
     }
}


$conn->close();
?>