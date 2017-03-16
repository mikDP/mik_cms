<?php

include("connection.php");

//Preleviamo l'id nel caso si tratti di una modifica
$id = $_GET["id"];
$id_lingua = $_GET['lan'];

$category = $_GET["cat"];
$action = $_GET["action"];

//Fetch dei dati
$sql = "SELECT id,menu,category FROM categories WHERE id ='$category'";
$id_cat = mysqli_fetch_row($conn->query($sql));


if ($id != NULL) {

    //Estrapoliamo i dati se si tratta di unamodifica
    $sql = "SELECT * FROM docs_$id_lingua WHERE id ='$id'";
    $article = mysqli_fetch_row($conn->query($sql));

    $mod = 1;
    $curr_title = $article[1];
    $curr_date = $article[2];
    $curr_cont = htmlspecialchars($article[4]);
    $curr_prev = $article[4];
    $home = $article[5];

} else {
    $mod = 0;
}


if ($action == "insert") {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $categoria = mysqli_real_escape_string($conn, $_POST["categoria"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    $tmp_cont = $content;
    if ($mod == 0) {

        //modifichiamo la cartella da cui prelevare le immagini inserite
        $content = str_replace("media/tmp/", "media/", $content);
        $content = str_replace(" &#10;", "", $content);

        //Inseriamo nuovo articolo
        $sql = "INSERT INTO docs_it(title,category,content) VALUES ('$title' , '$id_cat[0]', '$content')";
        $conn->query($sql);

        //QUI USEREMO LE API AZURE TRASLATE PER TRADURRE L'ARTICOLO NELEL ALTRELINGUE
        //Inseriamo le immagini nel database e ripuliamo la cartella temporanea
        insertImage($title, $content, $conn);
        header("Location:../resources/views/pagine/pagine.php?cat=$category&errore=Articolo inserito correttamente");
        exit();
    } else {

        //modifichiamo la cartella da cui prelevare le immagini inserite
        $content = str_replace("media/tmp/", "media/", $content);

        //controlliamo che l'articolo che stiamo modificando sia  una voce di menù
        if ($_GET['menu'] == 1) {
            
            if (isset($_POST['home'])) {
                $homepage = 1;
                $sql = "UPDATE docs_$id_lingua SET home = 0";
                $conn->query($sql);
                
                 //modifichiamo la pagina associata alla voce di menù e la rendiamo home
                $sql = "UPDATE docs_$id_lingua SET title = '$title', content= '$content', home = 1 WHERE id=" . $_GET["id"];
                $conn->query($sql);
                
            } else {

                //modifichiamo la pagina associata alla voce di menù
                $sql = "UPDATE docs_$id_lingua SET title = '$title', content= '$content' WHERE id=" . $_GET["id"];
                $conn->query($sql);
            }
        } else {

            //modifichiamo l'articolo
            $sql = "UPDATE docs_$id_lingua SET title = '$title', content= '$content' WHERE id=" . $_GET["id"];
            $conn->query($sql);
        }


        //Inseriamo le immagini nel database e ripuliamo la cartella temporanea
        insertImage($title, $content, $conn);

        if ($id == 0) {
            header("Location:../resources/views/pagine/articolo_struttura.php?lan=it&cat=0&id=0");
            exit();
        } else if ($id == 1) {
            header("Location:../resources/views/pagine/articolo_struttura.php?lan=it&cat=0&id=1");
            exit();
        }
        if ($_GET['menu'] == 1) {
            header("Location:../resources/views/index.php");
            exit();
        }

        header("Location:../resources/views/pagine/pagine.php?cat=$category&errore=Articolo modificato correttamente");
        exit();
    }
}

function insertImage($titolo, $contenuto, $conn) {
    //preleviamole il valore used in
    $sql = "SELECT id FROM docs_it WHERE title ='$titolo'";
    $id_art = mysqli_fetch_row($conn->query($sql));

    //parsing del contenuto salvato
    $doc = new DOMDocument();
    @$doc->loadHTML($contenuto);
    $tags = $doc->getElementsByTagName('img');

    //settiamo il valore usedIn ed eliminiamo dal vettore le immagini utilizzate
    foreach ($tags as $tag) {
        $img_inserite = substr($tag->getAttribute('src'), 44, 90);
        if (mysqli_num_rows($conn->query("SELECT * FROM media WHERE name ='$img_inserite'")) == 0) {
            if (rename($_SERVER['DOCUMENT_ROOT'] . "/mik_cms/resources/assets/images/media/tmp/" . $img_inserite, $_SERVER['DOCUMENT_ROOT'] . "/mik_cms/resources/assets/images/media/" . $img_inserite)) {
                $conn->query("INSERT INTO media(name,path,usedin) VALUES ('$img_inserite', '/mik_cms/resources/assets/images/media/', '$id_art[0]')");
            }
        }
    }
    array_map('unlink', glob($_SERVER['DOCUMENT_ROOT'] . "/mik_cms/resources/assets/images/media/tmp/*") ? : []);
}

$conn->close();
?>