<?php
require("../../../controller/check_session.php");
require("../../../controller/connection.php");

//Preleviamo l'immagine
$sql = "SELECT path,name FROM media WHERE id=" . $_GET["id"];
$result = $conn->query($sql);
$immagine = mysqli_fetch_array($result);
$img = $immagine[0] . $immagine[1];

//Controlliamo se è utilizzata in qualche articolo
$sql = "SELECT usedin FROM media WHERE id=" . $_GET["id"];
$result = $conn->query($sql);
$usedin = mysqli_fetch_row($result);
if ($usedin[0] == NULL)
    $text = "Non utilizzata.";
else {
    $sql = "SELECT title,category FROM docs_it WHERE id=" . $usedin[0];
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $text = "Utilizzata in <i>" . $row[0] . "</i> categoria: <i>" . $row[1]."</i>";
}


$conn->close();
?>
<form style="margin:20px;" action='/mik_cms/controller/media_controller.php?pag=<?= $_GET["pag"] ?>&action=update&id=<?= $_GET["id"] ?>' class='validate-form' method='POST' enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6" style="color:red">
            <b>Attuale:</b>
            <img  width="300px" src="<?= $img ?>" />
        </div>
        <div class="col-sm-5 text-red" style="text-align: center; font-size: 9pt; padding: 20px;margin-left: 20px;">
            <p> <b><?= $text?></b></p>
           
            <p>Seleziona l'immagine da caricare.</br>
                Formati supportati: JPG, PNG, GIF.</p>
            <input type="file" name="fileToUpload" id="fileToUpload" required/><br />
            <input type="text" name="name" value="" placeholder="Inserisci nome... (facoltativo)" class="form-control"  />
            <button style="color:black;margin-top: 10px;"class='btn btn-block'>Modifica</button>
        </div>
    </div>
</form>