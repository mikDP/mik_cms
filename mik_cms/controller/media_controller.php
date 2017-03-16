<?php

include("connection.php");

//Acquisizione variabili GET
$action = $_GET["action"];
$pag = $_GET["pag"];

$_SESSION["search"] = $_GET["search"];
$_SESSION["cat_media"] = $_GET["cat"];
$name = $_SESSION["search"];
$category = $_SESSION["cat_media"];

//Id della caegoria
$sql = "SELECT id FROM categories WHERE category ='$category'";
$id_cat = mysqli_fetch_row($conn->query($sql));

//Gestiamo la paginazione, filtro e ricerca
$offset = ($pag - 1) * 18;
if (($name == '') && ($category == '')) {
    $totpag = ceil(mysqli_num_rows($conn->query("SELECT * FROM media"))/18);
    $sql = "SELECT * FROM media LIMIT $offset, 18";
    $immagini = $conn->query($sql);
} elseif ($category == '') {
    $totpag = ceil(mysqli_num_rows($conn->query("SELECT * FROM media WHERE name LIKE  '%$name%'")) / 18);
    $sql = "SELECT * FROM media WHERE name LIKE  '%$name%' LIMIT $offset, 18";
    $immagini = $conn->query($sql);
} elseif ($name == '') {
    $totpag = ceil(mysqli_num_rows($conn->query("SELECT m.* FROM media AS m INNER JOIN docs_it AS d ON m.usedin = d.id WHERE d.category = $id_cat[0]")) / 18);
    $sql = "SELECT m.* FROM media AS m INNER JOIN docs_it AS d ON m.usedin = d.id WHERE d.category = $id_cat[0] LIMIT $offset, 18";
    $immagini = $conn->query($sql);
}


//Creiamo il menù per filtrare
$sql = "SELECT category FROM categories";
$cat_menu = $conn->query($sql);


if ($action == "filter") {
    header("Location:../resources/views/media/media.php?pag=$pag&cat=" . $category . "&search=" . $name);
    exit;
}

if ($action == "new") {
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/mik_cms/resources/assets/images/media/";
    $ext = end((explode(".", $_FILES["fileToUpload"]["name"])));
    if ($_POST['name'] == '')
        $file_name = (date("y_m_d-") . time()) . '.' . $ext;
    else
        $file_name = clean($_POST['name']) . '.' . $ext;

    //Controllo che il file scelto sia un'immagine
    if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
        $uploadOk = 0;
        header("Location:../resources/views/media/media.php?pag=$pag&errore=Il file scelto non è un'immagine");
        exit;
    } else {
        $uploadOk = 1;
    }

    if ($uploadOk != 0) {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $file_name);
        $query_inserimento = "INSERT INTO media(name,path) VALUES ('$file_name', '/mik_cms/resources/assets/images/media/')";
        $conn->query($query_inserimento);
        header("Location:../resources/views/media/media.php?pag=$pag&errore=Immagine inserita correttamente");
        exit;
    } else {
        header("Location:../resources/views/media/media.php?pag=$pag&errore=Spiacente, immagine non caricata");
        exit;
    }
}


//Inserimento immagine dal WYSIWYG
if ($action == "new_wys") {
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/mik_cms/resources/assets/images/media/tmp/";
    $ext = end((explode(".", $_FILES["image"]["name"])));
    $file_name = (date("y_m_d-") . time()) . '.' . $ext;

    move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $file_name);

    echo json_encode(array('location' => $target_dir . $file_name));
}



if ($action == "update") {

    $sql = "SELECT name,path FROM media WHERE id=" . $_GET["id"];
    $immagine = $conn->query($sql);
    $row = mysqli_fetch_array($immagine);
    unlink($_SERVER['DOCUMENT_ROOT'] . $row[1] . $row[0]);

    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/mik_cms/resources/assets/images/media/";
    $ext = end((explode(".", $_FILES["fileToUpload"]["name"])));

    if ($_POST['name'] == '')
        $file_name = (date("y_m_d-") . time()) . '.' . $ext;
    else
        $file_name = clean($_POST['name']) . '.' . $ext;

    //Controllo che il file scelto sia un'immagine
    if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
        $uploadOk = 0;
        header("Location:../resources/views/media/media.php?pag=$pag&errore=Il file scelto non è un'immagine");
        exit;
    } else {
        $uploadOk = 1;
    }

    if ($uploadOk != 0) {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $file_name);
        $query_modifica = "UPDATE media SET name = '$file_name', path= '/mik_cms/resources/assets/images/media/' WHERE id=" . $_GET["id"];
        $conn->query($query_modifica);
        header("Location:../resources/views/media/media.php?pag=$pag&errore=Immagine modificata correttamente");
        exit;
    } else {
        header("Location:../resources/views/media/media.php?pag=$pag&errore=Spiacente, immagine non caricata");
        exit;
    }
}

if ($action == "delete") {
    $sql = "SELECT name,path FROM media WHERE id=" . $_GET["id"];
    $immagine = $conn->query($sql);
    $row = mysqli_fetch_array($immagine);
    unlink($_SERVER['DOCUMENT_ROOT'] . $row[1] . $row[0]);
    $sql = "DELETE FROM media WHERE id=" . $_GET["id"];
    $conn->query($sql);
    header("Location:../resources/views/media/media.php?pag=$pag&errore=Immagine eliminata correttamente.");
    exit;
}

function thumbmail() {
    //INSTALLARE LIBRERIA GD
}


function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

$conn->close();
?>
