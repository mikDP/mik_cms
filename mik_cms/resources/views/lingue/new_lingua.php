
    <div style="margin: 20px;">
        <p class="text-red text-center"><b>Aggiungi lingua:</b></p>
        <p class="text-red text-center italic">Se hai dubbi sull'id da inserire, <a href="https://cloud.google.com/translate/docs/languages" target="_blank">clicca qui</a><p>
        <form style="margin:20px;" action='/mik_cms/controller/lingue_controller.php?action=new' class='validate-form' method='POST'>
            <input type='text' name='id_lan' value='' placeholder='Id lingua' class='form-control' data-rule-required='true' maxlength="2" />
            <input type='text' name='lan' value='' placeholder='Lingua da aggiungere' class='form-control' data-rule-required='true' />
            <button class='btn btn-block'>Inserisci</button>
        </form>
    </div>
