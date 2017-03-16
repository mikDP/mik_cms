<?php require("../../../controller/check_session.php");
      require("../../../controller/connection.php"); 
    
    //Controlliamo se l'immagine è utilizzata in qualche articolo per generare il messaggio
    $sql= "SELECT usedin FROM media WHERE id=".$_GET["id"];
    $result = $conn->query($sql);
    $usedin = mysqli_fetch_row($result);

    if($usedin[0] == NULL)
        $text = "Sei sicuro di voler eliminare l'immagine?</br>Non è utilizzata in nessun articolo.";
    else{
        $sql="SELECT title,category FROM docs_it WHERE id=".$usedin[0];
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $text = "Sei sicuro di voler eliminare l'immagine?</br>Attualmente utilizzata nell'articolo <i>".$row[0]."</i> categoria: <i>".$row[1]."</i>";
    }
    $conn->close();
?>
<div class="col-sm-11 text-red" style='margin:10px;text-align: center; font-size: 11pt;'>
    <b><?= $text ?></b>
</div>
<form id="form_update" style="margin:20px;" action="/mik_cms/controller/media_controller.php?pag=<?= $_GET["pag"] ?>&action=delete&id=<?= $_GET["id"] ?>" class='validate-form' method='POST'>
    <button class='btn btn-block'>Elimina</button>
</form>
