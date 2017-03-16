<?php

include("connection.php");

$sql = "SELECT * FROM categories WHERE menu = 1 AND parent = 0 ORDER BY position ASC";
$parents = $conn->query($sql);

$sql = "SELECT * FROM categories WHERE menu = 1 AND parent != 0 ORDER BY position ASC";
$childs = $conn->query($sql);


$genitori = array();
$figli = array();

$action = $_GET["action"];
$idmenu = $_GET["menu"];

while ($data = mysqli_fetch_array($parents)) {
    $genitori[] = $data;
}

while ($data = mysqli_fetch_array($childs)) {
    $figli[] = $data;
}

if ($action == "disable") {

    $sql = "SELECT content FROM docs_it WHERE category ='$idmenu'";
    $contenuto = mysqli_fetch_array($conn->query($sql));
    
    if (($contenuto[0] == '') && (mysqli_num_rows($conn->query("SELECT * FROM categories WHERE parent ='$idmenu'")) == 0) ) {
        
            $sql = "DELETE FROM categories WHERE id ='$idmenu'";
            $conn->query($sql);
            $sql = "DELETE FROM docs_it WHERE category ='$idmenu'";
            $conn->query($sql);

            header("Location:../resources/views/menu/menu.php");
            exit;

    } else {

        $sql = "UPDATE categories SET active=0 WHERE id ='$idmenu'";
        $conn->query($sql);

        header("Location:../resources/views/menu/menu.php");
        exit;
    }
}


if ($action == "enable") {
    $sql = "UPDATE categories SET active=1 WHERE id ='$idmenu'";
    $conn->query($sql);
    header("Location:../resources/views/menu/menu.php");
    exit;
}

if ($action == "new") {
    $menu = mysqli_real_escape_string($conn, $_POST["menu"]);
    $sql = "SELECT MAX(position) FROM categories WHERE menu= 1";
    $max = mysqli_fetch_array($conn->query($sql));
    $max[0] ++;

    $sql = "INSERT INTO categories(category, active, menu, position) VALUES ('$menu', '1', '1', '$max[0]')";
    $conn->query($sql);
    $id_menu_inserito = mysqli_insert_id($conn);

    $sql = "INSERT INTO docs_it(title, category) VALUES ('$menu', '$id_menu_inserito')";
    $conn->query($sql);
    $id_articolo_inserito = mysqli_insert_id($conn);

    $sql = "UPDATE categories SET art_ass = '$id_articolo_inserito' WHERE id ='$id_menu_inserito'";
    $conn->query($sql);


    header("Location:../resources/views/menu/menu.php");
    exit;
}

if ($action == "newsub") {
    $parent = $_POST['genitore'];
    $menu = mysqli_real_escape_string($conn, $_POST["menu"]);
    $sql = "SELECT MAX(position) FROM categories WHERE menu= 1 AND parent = '$parent'";
    $max = mysqli_fetch_array($conn->query($sql));
    $max[0] ++;
    $sql = "INSERT INTO categories(category,active,menu,position, parent) VALUES ('$menu','1','1','$max[0]', '$parent')";
    $conn->query($sql);
    $id_menu_inserito = mysqli_insert_id($conn);

    $sql = "INSERT INTO docs_it(title, category) VALUES ('$menu', '$id_menu_inserito')";
    $conn->query($sql);
    $id_articolo_inserito = mysqli_insert_id($conn);

    $sql = "UPDATE categories SET art_ass = '$id_articolo_inserito' WHERE id ='$id_menu_inserito'";
    $conn->query($sql);

    header("Location:../resources/views/menu/menu.php");
    exit;
}

if ($action == "update") {
    $menu = mysqli_real_escape_string($conn, $_POST["cat"]);

    $sql = "UPDATE categories SET category='$menu' WHERE id=" . $_POST["id"] . "";
    $conn->query($sql);
    $sql = "UPDATE docs_it SET title='$menu' WHERE category=" . $_POST["id"] . "";
    $conn->query($sql);

    header("Location:../resources/views/menu/menu.php");
    exit;
}

if ($action == "sort") {

    $pos_id = $_POST['pos_id'];

    foreach ($pos_id as $id => $pos) {
        $sql = "UPDATE categories SET position='$pos' WHERE id='$id'";
        $conn->query($sql);
    }

    header("Location:../resources/views/menu/menu.php");
    exit;
}

$conn->close();
?>