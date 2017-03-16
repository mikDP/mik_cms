<?php

include("connection.php");

$sql = "SELECT * FROM categories WHERE menu = 0 AND parent = 0 ORDER BY position ASC";
$parents = $conn->query($sql);

$sql = "SELECT * FROM categories WHERE menu = 0 AND parent != 0 ORDER BY position ASC";
$childs = $conn->query($sql);


$genitori = array();
$figli = array();

while ($data = mysqli_fetch_array($parents)) {
    $genitori[] = $data;
}

while ($data = mysqli_fetch_array($childs)) {
    $figli[] = $data;
}



$action = $_GET["action"];
$idcat = $_GET["categoria"];

if ($action == "disable") {

    if (mysqli_num_rows($conn->query("SELECT * FROM docs_it WHERE category ='$idcat'")) == 0) {
        
        //verifichiamo se è una categoria genitore
        if (isset($_GET['par'])) {
            //verifichiamo se vi sono sottocategorie collegate al genitore
            if (mysqli_num_rows($conn->query("SELECT * FROM categories WHERE parent ='$idcat'")) == 0) {
                $sql = ("DELETE FROM categories WHERE id ='$idcat'");
                $conn->query($sql);
                header("Location:../resources/views/categorie/categorie.php");
                exit;
            } else {
                $sql = "UPDATE categories SET active=0 WHERE id ='$idcat'";
                $conn->query($sql);
                header("Location:../resources/views/categorie/categorie.php");
                exit;
            }
        }
        $sql = ("DELETE FROM categories WHERE id ='$idcat'");
        $conn->query($sql);
        header("Location:../resources/views/categorie/categorie.php");
        exit;
    } else {
        $sql = "UPDATE categories SET active=0 WHERE id ='$idcat'";
        $conn->query($sql);
        header("Location:../resources/views/categorie/categorie.php");
        exit;
    }
}

if ($action == "enable") {
    $sql = "UPDATE categories SET active=1 WHERE id ='$idcat'";
    $conn->query($sql);
    header("Location:../resources/views/categorie/categorie.php");
    exit;
}

if ($action == "new") {
    $cat = mysqli_real_escape_string($conn, $_POST["cat"]);
    $sql = "SELECT MAX(position) FROM categories WHERE menu= 0";
    $max = mysqli_fetch_array($conn->query($sql));
    $max[0] ++;
    $sql = "INSERT INTO categories(category,active,menu,position) VALUES ('$cat','1','0','$max[0]')";
    $conn->query($sql);
    header("Location:../resources/views/categorie/categorie.php");
    exit;
}
if ($action == "newsub") {
    $parent = $_POST['genitore'];
    $cat = mysqli_real_escape_string($conn, $_POST["cat"]);
    $sql = "SELECT MAX(position) FROM categories WHERE menu= 0 AND parent = '$parent'";
    $max = mysqli_fetch_array($conn->query($sql));
    $max[0] ++;
    $sql = "INSERT INTO categories(category,active,menu,position, parent) VALUES ('$cat','1','0','$max[0]', '$parent')";
    $conn->query($sql);
    header("Location:../resources/views/categorie/categorie.php");
    exit;
}


if ($action == "update") {
    $cat = mysqli_real_escape_string($conn, $_POST["cat"]);
    $sql = "UPDATE categories SET category='$cat' WHERE id=" . $_POST["id"] . "";
    $conn->query($sql);
    header("Location:../resources/views/categorie/categorie.php");
    exit;
}

if ($action == "sort") {
    $pos_id = $_POST['pos_id'];
    foreach ($pos_id as $id => $pos) {
        $sql = "UPDATE categories SET position='$pos' WHERE id='$id'";
        $conn->query($sql);
    }
    header("Location:../resources/views/categorie/categorie.php");
    exit;
}

$conn->close();
?>