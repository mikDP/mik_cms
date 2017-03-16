<?php

include("connection.php");

$sql = "SELECT * FROM css_wys";
$classi = $conn->query($sql);

$action = $_POST['action'];
ini_set('display_errors', 1);


if ($action == "new") {

    $nome_classe = $_POST['tipo_elem'] . '.' . clean($_POST['name']);
    $tipo_classe = $_POST['tipo_elem'];




    if ($tipo_classe == 'img') {
        $content = image_content($nome_classe);
        $sql = "SELECT count(*) FROM css_wys WHERE class_name='$nome_classe'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_row($result);
        $reg_count = $row[0];

        if ($reg_count > 0)
            $sql = "UPDATE css_wys SET class_name = '$nome_classe', class_content = '$content', type = '$tipo_classe' WHERE class_name = '$nome_classe'";
        else
            $sql = "INSERT INTO css_wys(class_name,class_content,type) VALUES ('$nome_classe','$content' ,'$tipo_classe')";
    } elseif ($tipo_classe == 'text') {

        $nome_classe = '.' . clean($_POST['name']);
        $content = text_content($nome_classe);
        $sql = "SELECT count(*) FROM css_wys WHERE class_name='$nome_classe'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_row($result);
        $reg_count = $row[0];
        if ($reg_count > 0)
            $sql = "UPDATE css_wys SET class_content = '$content', type = '$tipo_classe' WHERE class_name = '$nome_classe'";
        else
            $sql = "INSERT INTO css_wys(class_name,class_content,type) VALUES ('$nome_classe','$content' ,'$tipo_classe')";
    } elseif ($tipo_classe == 'table') {
        $content = table_content($nome_classe);
        $sql = "SELECT count(*) FROM css_wys WHERE class_name='$nome_classe'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_row($result);
        $reg_count = $row[0];

        if ($reg_count > 0)
            $sql = "UPDATE css_wys SET class_name = '$nome_classe', class_content = '$content', type = '$tipo_classe' WHERE class_name = '$nome_classe'";
        else
            $sql = "INSERT INTO css_wys(class_name,class_content,type) VALUES ('$nome_classe','$content' ,'$tipo_classe')";
    }
    $conn->query($sql);

    create_css($conn);
    header("Location:../resources/views/css/css.php");
    exit;
}

if ($action == "delete") {
    $id_class = $_POST['id'];
    $sql = "DELETE FROM css_wys WHERE id='$id_class'";
    $conn->query($sql);
    create_css($conn);
}

//funzione che estrapola dati dal db e crea il file css per il WYSIWYG
function create_css($conn) {
    $file = fopen($_SERVER['DOCUMENT_ROOT'] . "/mik_cms/resources/assets/stylesheets/wysiwyg_styles.css", "w") or die("Unable to open file!");
    $sql = "SELECT class_content FROM css_wys";
    $classes = $conn->query($sql);
    while ($row = mysqli_fetch_array($classes)) {
        fwrite($file, $row[0] . " ");
    }
    fclose($file);
    chmod($file, 0777);
    return;
}

function image_content($name) {

    //Creiamo l'array associativo
    $regole['width'] = $_POST['width'];
    $regole['height'] = $_POST['height'];
    $regole['opacity'] = $_POST['opacity'];
    $regole['border-width'] = $_POST['border-width'];
    $regole['border-style'] = $_POST['border-style'];
    if ($_POST['border-color'] != '')
        $regole['border-color'] = '#' . $_POST['border-color'];
    $regole['border-radius'] = $_POST['border-radius'];
    $regole['box-shadow'] = $_POST['box-shadow'];


    $corpo = $name . ' { ';
    foreach ($regole as $key => $value) {
        if ($value != NULL) {
            $corpo = $corpo . $key . ':' . $value . '; ';
        }
    }
    $corpo = $corpo . '} ';

    if (isset($_POST['hover_check'])) {

        //Creiamo l'array associativo per le propietà hover
        $regoleh['width'] = $_POST['h-width'];
        $regoleh['height'] = $_POST['h-height'];
        $regoleh['opacity'] = $_POST['h-opacity'];
        $regoleh['border-width'] = $_POST['h-border-width'];
        $regoleh['border-style'] = $_POST['h-border-style'];
        if ($_POST['h-border-color'] != '')
            $regoleh['border-color'] = '#' . $_POST['h-border-color'];
        $regoleh['border-radius'] = $_POST['h-border-radius'];
        $regoleh['box-shadow'] = $_POST['h-box-shadow'];

        $corpo = $corpo . $name . ':hover { ';
        foreach ($regoleh as $key => $value) {
            if ($value != NULL) {
                $corpo = $corpo . $key . ':' . $value . '; ';
            }
        }
        $corpo = $corpo . '} ';
    }

    return $corpo;
}

function text_content($name) {

    //Creiamo l'array associativo
    $regole['font-size'] = $_POST['font-size'];
    if ($_POST['color'] != '')
        $regole['color'] = '#' . $_POST['color'];
    if ($_POST['background-color'] != '')
        $regole['background-color'] = '#' . $_POST['background-color'];
    if (isset($_POST['font-weight'])) {
        $regole['font-weight'] = 'bold';
    }
    if (isset($_POST['font-style'])) {
        $regole['font-style'] = 'italic';
    }

    $regole['text-align'] = $_POST['text-align'];
    $regole['border-width'] = $_POST['border-width'];
    $regole['border-style'] = $_POST['border-style'];
    if ($_POST['border-color'] != '')
        $regole['border-color'] = '#' . $_POST['border-color'];
    $regole['border-radius'] = $_POST['border-radius'];

    $corpo = $name . ' { ';
    foreach ($regole as $key => $value) {
        if ($value != NULL) {
            $corpo = $corpo . $key . ':' . $value . '; ';
        }
    }
    $corpo = $corpo . '} ';

    return $corpo;
}

function table_content($name) {

    //Creiamo l'array associativo per table
    if ($_POST['background-color'] != '')
        $regole['background-color'] = '#' . $_POST['background-color'];
    $regole['border-collapse'] = 'collapse';
    $regole['font-size'] = $_POST['font-size'];
    if ($_POST['color'] != '')
        $regole['color'] = '#' . $_POST['color'];
    $regole['text-align'] = $_POST['text-align'];

    if (isset($_POST['font-weight'])) {
        $regole['font-weight'] = 'bold';
    }
    if (isset($_POST['font-style'])) {
        $regole['font-style'] = 'italic';
    }

    $corpo = $name . ' { ';
    foreach ($regole as $key => $value) {
        if ($value != NULL) {
            $corpo = $corpo . $key . ':' . $value . '; ';
        }
    }
    $corpo = $corpo . '} ';



    //Creiamo l'array associativo per le propietà delle singole celle


    $regoletd['border-width'] = $_POST['border-width'];
    $regoletd['border-style'] = $_POST['border-style'];
    if ($_POST['border-color'] != '')
        $regoletd['border-color'] = '#' . $_POST['border-color'];
    $regoletd['vertical-align'] = $_POST['vertical-align'];



    $corpo = $corpo . $name . ' td{ ';
    foreach ($regoletd as $key => $value) {
        if ($value != NULL) {
            $corpo = $corpo . $key . ':' . $value . '; ';
        }
    }
    $corpo = $corpo . '} ';


    return $corpo;
}

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

$conn->close();
?>