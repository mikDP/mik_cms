<div class="row">
    <div class="col-sm-3 "></div>
    <div class="col-sm-3 "></div>
    <div class="col-sm-3 ">
        <div class="checkbox" >
            <label>
                <input type="checkbox" name="hover_check" id="hover_check" value="y">
                <b class="text-red">Proprietà Hover</b>                   
            </label>
        </div>
    </div>
    <div class="col-sm-3 "></div>
</div>
<div class="row">
    <!--COLONNA 1-->
    <div class="col-sm-3 ">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="text-red"style="margin-left: 20px">Dimensioni:</h5>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4 control-label"for="width">Larghezza:</label>
                <div class="col-sm-4">
                    <input class="form-control input-sm" onChange="imgPreview(this)" data-id="width" name="width" id="width" value=""placeholder="Es. 30px o 30%" type="text">
                </div>
                <label class="col-sm-4 control-label text-left"for="width">(px, %, auto)</label>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4 control-label"for="height">Altezza:</label>
                <div class="col-sm-4">
                    <input class="form-control input-sm"  onChange="imgPreview(this)" data-id="height" name="height" id="height" value=""placeholder="Es. 30px o 30%" type="text" >
                </div>
                <label class="col-sm-4 control-label text-left"for="height">(px, %, auto)</label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h5 class="text-red" style="margin-left: 20px">Opacità:</h5>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4 control-label"for="opacity">Fattore:</label>
                <div class="col-sm-4">
                    <input class="form-control input-sm" onChange="imgPreview(this)" data-id="opacity" name="opacity" id="opacity" value=""placeholder="Es. 0.7" type="text" >
                </div>
                <label class="col-sm-4 control-label text-left"for="opacity">(da 0.0 a 1)</label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h5 class="text-red" style="margin-left: 20px">Ombra:</h5>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4 control-label"for="box-shadow">Box-shadow:</label>
                <div class="col-sm-4">
                    <input class="form-control input-sm" onChange="imgPreview(this)" data-id="box-shadow" name="box-shadow" id="box-shadow" value=""placeholder="10px 10px 10px gray" type="text" >
                </div>
                <label class="col-sm-4 control-label text-left"for="box-shadow">(px px px color)</label>
            </div>
        </div>
    </div>

    <!--COLONNA 2-->
    <div class="col-sm-3">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="text-red"style="margin-left: 20px">Bordi:</h5>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4 control-label"for="border-width">Spessore:</label>
                <div class="col-sm-4">
                    <input class="form-control input-sm" onChange="imgPreview(this)"  data-id="border-width" name="border-width" id="border-width" value=""placeholder="Es. 3px" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4 control-label"for="border-style">Stile:</label>
                <div class="col-sm-4">
                    <input class="form-control input-sm"onChange="imgPreview(this)" data-id="border-style" name="border-style" id="border-style" value=""placeholder="Es. solid" type="text" >
                </div>
                <label class="col-sm-4 control-label text-left" style="font-size: 8pt;" for="border-style">(dotted, dashed, etc)</label>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4 control-label"for="border-color">Colore:</label>
                <div class="col-sm-8">
                    <input class="form-control pick-a-color" onChange="imgPreview(this)" data-id="border-color" name="border-color" id="border-color" value=""  type="text" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4 control-label"for="border-radius">Smussamento:</label>
                <div class="col-sm-4">
                    <input class="form-control input-sm" onChange="imgPreview(this)" data-id="border-radius" name="border-radius" id="border-radius" value=""placeholder="Es. 30px o 30% " type="text" >
                </div>
                <label class="col-sm-4 control-label text-left" for="border-radius">(px, %)</label>
            </div>
        </div>
    </div>

    <div id="hover_p" hidden="true">
        <!--COLONNA 3-->
        <div class="col-sm-3 ">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="text-red"style="margin-left: 20px">Dimensioni:</h5>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label class="col-sm-4 control-label"for="h-width">Larghezza:</label>
                    <div class="col-sm-4">
                        <input class="form-control input-sm" name="h-width" id="h-width" value=""placeholder="Es. 30px o 30%" type="text">
                    </div>
                    <label class="col-sm-4 control-label text-left"for="h-width">(px, %, auto)</label>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label class="col-sm-4 control-label"for="h-height">Altezza:</label>
                    <div class="col-sm-4">
                        <input class="form-control input-sm" name="h-height" id="height" value=""placeholder="Es. 30px o 30%" type="text" >
                    </div>
                    <label class="col-sm-4 control-label text-left"for="h-height">(px, %, auto)</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="text-red" style="margin-left: 20px">Opacità:</h5>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label class="col-sm-4 control-label"for="h-opacity">Fattore:</label>
                    <div class="col-sm-4">
                        <input class="form-control input-sm" name="h-opacity" id="h-opacity" value=""placeholder="Es. 0.7" type="text" >
                    </div>
                    <label class="col-sm-4 control-label text-left"for="h-opacity">(da 0.0 a 1)</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="text-red" style="margin-left: 20px">Ombra:</h5>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label class="col-sm-4 control-label"for="h-box-shadow">Box-shadow:</label>
                    <div class="col-sm-4">
                        <input class="form-control input-sm" onChange="imgPreview(this)" data-id="h-box-shadow" name="h-box-shadow" id="h-box-shadow" value=""placeholder="10px 10px 10px gray" type="text" >
                    </div>
                    <label class="col-sm-4 control-label text-left"for="h-box-shadow">(px px px color)</label>
                </div>
            </div>
        </div>

        <!--COLONNA 4-->
        <div class="col-sm-3">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="text-red"style="margin-left: 20px">Bordi:</h5>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label class="col-sm-4 control-label"for="h-border-width">Spessore:</label>
                    <div class="col-sm-4">
                        <input class="form-control input-sm" name="h-border-width" id="h-border-width" value=""placeholder="Es. 3px" type="text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label class="col-sm-4 control-label"for="h-border-style">Stile:</label>
                    <div class="col-sm-4">
                        <input class="form-control input-sm" name="h-border-style" id="h-border-style" value=""placeholder="Es. solid" type="text" >
                    </div>
                    <label class="col-sm-4 control-label text-left" style="font-size: 8pt;" for="h-border-style">(dotted, dashed, etc)</label>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label class="col-sm-4 control-label"for="h-border-color">Colore:</label>
                    <div class="col-sm-8">
                        <input class="form-control pick-a-color" name="h-border-color" id="h-border-color" value=""  type="text" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label class="col-sm-4 control-label"for="h-border-radius">Smussamento:</label>
                    <div class="col-sm-4">
                        <input class="form-control input-sm" name="h-border-radius" id="h-border-radius" value=""placeholder="Es. 30px o 30% " type="text" >
                    </div>
                    <label class="col-sm-4 control-label text-left" for="h-border-radius">(px, %)</label>
                </div>
            </div>
        </div>
    </div>
</div>
<script>


    $(document).ready(function () {
        $(".pick-a-color").pickAColor({
            allowBlank: true
        });
        $(".pick-a-color").change(function () {
            var proprietà = $(this).attr("data-id");
            var valore = $(this).val();
            $('#sample_img').css(proprietà, '#' + valore);
        });
    });

    $('#hover_check').change(function () {
        if ($('#hover_check').is(":checked")) {
            $("#hover_p").prop("hidden", false);
        } else {
            $("#hover_p").prop("hidden", true);
        }
    });

    function imgPreview(currElem) {
        var proprietà = $(currElem).attr("data-id");
        var valore = $(currElem).val();
        $('#sample_img').css(proprietà, valore);


    }
    ;

</script>