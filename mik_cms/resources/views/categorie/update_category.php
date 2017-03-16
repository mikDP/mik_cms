
<form id="form_update" style="margin:20px;" action="/mik_cms/controller/categorie_controller.php?action=update&id=<?= $_GET["id"]?>" class='validate-form' method='POST'>
    <input id="cat-name" type='text' name='cat' value='<?= $_GET["cat"]?>' placeholder='Modifica categoria' class='form-control' data-rule-required='true' />
    <button class='btn btn-block'>Modifica</button>
</form>
