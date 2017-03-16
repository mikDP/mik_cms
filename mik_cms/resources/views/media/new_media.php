<div class="col-sm-10 text-red" style='margin:20px;text-align: center; font-size: 10pt;'>
    <b>Seleziona l'immagine da caricare.</br>
        Formati supportati: JPG, PNG, GIF.</b>
</div>
<form style="margin:20px;" action='/mik_cms/controller/media_controller.php?pag=<?= $_GET['pag']?>&action=new' class='validate-form' method='POST' enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload" /><br />
    <input type="text" name="name" value="" placeholder="Inserisci nome... (facoltativo)" class="form-control"  />
    <button class='btn btn-block'>Inserisci</button>
</form>