
    <div style="margin: 20px;">
        <p class="text-red text-center"><b>Modifica il nome della lingua:</b></p>
        <form style="margin:20px;" action='/mik_cms/controller/lingue_controller.php?action=update&id=<?= $_GET["id"] ?>' class='validate-form' method='POST'>
            <input type='text' name='lan' value='<?= $_GET["lan"] ?>' placeholder='Lingua da modificare' class='form-control' data-rule-required='true' />
            <button class='btn btn-block'>Modifica</button>
        </form>
    </div>
