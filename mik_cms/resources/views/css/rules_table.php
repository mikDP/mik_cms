<div class="row">

    <!--COLONNA 1-->

    <div class="col-sm-3">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="text-red"style="margin-left: 20px">Stile:</h5>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4 control-label"for="background-color">Colore sfondo:</label>
                <div class="col-sm-8">
                    <input class="form-control pick-a-color" onChange="tablePreview(this)" data-id="background-color" name="background-color" id="background-color" value="" type="text" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h5 class="text-red"style="margin-left: 20px">Bordi:</h5>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4 control-label"for="border-width">Spessore:</label>
                <div class="col-sm-4">
                    <input class="form-control input-sm" onChange="tdPreview(this)"  data-id="border-width" name="border-width" id="border-width" value=""placeholder="Es. 3px" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4 control-label"for="border-style">Stile:</label>
                <div class="col-sm-4">
                    <input class="form-control input-sm"onChange="tdPreview(this)" data-id="border-style" name="border-style" id="border-style" value=""placeholder="Es. solid" type="text" >
                </div>
                <label class="col-sm-4 control-label text-left" style="font-size: 8pt;" for="border-style">(dotted, dashed, etc)</label>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4 control-label"for="border-color">Colore:</label>
                <div class="col-sm-8">
                    <input class="form-control pick-a-color" onChange="tdPreview(this)" data-id="border-color" name="border-color" id="border-color" value=""type="text" >
                </div>
            </div>
        </div>
    </div>

    <!--COLONNA 2--> 

    <div class="col-sm-3 ">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="text-red"style="margin-left: 20px">Testo:</h5>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4 control-label"for="font-size">Dimensioni:</label>
                <div class="col-sm-4">
                    <input class="form-control input-sm" onChange="tablePreview(this)" data-id="font-size" name="font-size" id="font-size" value="" placeholder="Es. 10pt o 10px" type="text">
                </div>
                <label class="col-sm-4 control-label text-left" style="font-size: 9pt;" for="font-size">(pt, px)</label>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-4 control-label"for="color">Colore:</label>
                <div class="col-sm-8">
                    <input class="form-control pick-a-color" onChange="tablePreview(this)" data-id="color" name="color" id="color" value="" type="text" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label"for="font-weight">Grassetto:</label>
                <div class="col-sm-4">
                    <input type="checkbox" class="checkbox"  data-id="font-weight" name="font-weight" id="f-weight" value="bold" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label"for="font-style">Corsivo:</label>
                <div class="col-sm-4">
                    <input type="checkbox" class="checkbox" data-id="font-style" name="font-style" id="f-style" value="italic" >
                </div>
            </div>
        </div>
    </div>

    <!--COLONNA 3--> 

    <div class="col-sm-2 col-sm-offset-1">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="text-red" style="margin-left: 20px">Allineamento orizzontale:</h5>
            </div>
        </div>
        <div class="row">
            <div class="form-group" id="radio-group">
                <div class="col-md-10 col-md-offset-1">
                    <div class="radio">
                        <label>
                            <input value="left" name="text-align" type="radio">
                            <b>Sinistra</b>
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input value="right" name="text-align"type="radio">
                            <b>Destra</b>
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input value="center" name="text-align"type="radio">
                            <b>Centrale</b>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h5 class="text-red" style="margin-left: 20px">Allineamento verticale:</h5>
            </div>
        </div>
        <div class="row">
            <div class="form-group" id="radio-g">
                <div class="col-md-10 col-md-offset-1">
                    <div class="radio">
                        <label>
                            <input value="top" name="vertical-align" type="radio">
                            <b>Sopra</b>
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input value="middle" name="vertical-align"type="radio">
                            <b>Centro</b>
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input value="bottom" name="vertical-align"type="radio">
                            <b>Sotto</b>
                        </label>
                    </div>
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
            $('td').css(proprietà, '#' + valore);
        });
    });
    
    function tablePreview(currElem) {
        var proprietà = $(currElem).attr("data-id");
        var valore = $(currElem).val();
        $('#sample_table').css(proprietà, valore);
    }
    ;

    function tdPreview(currElem) {
        var proprietà = $(currElem).attr("data-id");
        var valore = $(currElem).val();
        $('td').css(proprietà, valore);
    }
    ;

    $('#f-weight').change(function () {
        if ($('#f-weight').is(":checked")) {
            $('#sample_table').css('font-weight', 'bold');
        } else {
            $('#sample_table').css('font-weight', 'normal');
        }
    });

    $('#f-style').change(function () {
        if ($('#f-style').is(":checked")) {
            $('#sample_table').css('font-style', 'italic');
        } else {
            $('#sample_table').css('font-style', 'normal');
        }
    });

    $('#radio-group').change(function () {
        $('#sample_table').css('text-align', $('input[name=text-align]:checked').val());
    });

    $('#radio-g').change(function () {
        $('td').css('vertical-align', $('input[name=vertical-align]:checked').val());
    });

</script>