<?php
require("../../../controller/check_session.php");
require("../../../controller/css_controller.php");
?>

<!DOCTYPE html>
<html lang='it'>
    <head>
        <title>CSS | mik_cms</title>
        <?php require("../template/head.php"); ?>
    </head>
    <body class='contrast-red without-footer'>
        <?php require("../template/header.php"); ?>
        <div id='wrapper'>      
            <!--      Includiamo il menù sinistro-->
            <?php include("../template/navbar.php"); ?>

            <!--      Content-->
            <section id='content'>
                <div class='container'>
                    <div class='row'F id='content-wrapper'>
                        <div class='col-xs-12'>
                            <div class='page-header'>
                                <div class="pull-left">
                                    <h1 class="pull-left">
                                        <i class='fa fa-css3'></i>
                                        <span>CSS WYSIWYG</span>
                                    </h1>
                                </div>
                            </div>
                            <div class='container'>
                                <div class="row" id='content-wrapper'>
                                    <!-- Contenuto -->
                                    <div class="col-sm-12">
                                        <form id="postForm" action="/mik_cms/controller/css_controller.php" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="classi">Visualizza classe esistente:</label>
                                                        <div class="row">
                                                            <div class="col-sm-10">

                                                                <!--                                                                Menù classi-->
                                                                <select class="form-control" onchange="filter_class(this);"  id="classi" >
                                                                    <option value="" data-type="">...</option>
                                                                    <?php while ($row = mysqli_fetch_array($classi)) { ?>  
                                                                        <option id="<?= $row[0] ?>" content-data="<?= $row[2] ?>" name-data="<?= $row[1] ?>" value="<?= $row[3] ?>"><?= $row[1] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-1 col-sm-offset-1">
                                                                <a id="delete_button" href="" class="btn btn-danger btn-sm"role='button'>
                                                                    <i class="fa fa-trash">
                                                                    </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <hr class="separator">
                                                        <label for="name">Nome classe:</label>
                                                        <input class="form-control" name="name" id="name" value="" placeholder="Inserisci il nome della classe..." type="text" required="true">
                                                        <br>
                                                        <label for="regole">Classe per:</label>
                                                        <select  onchange="filter_type(this);" class="form-control"  id="tipo_elem" name="tipo_elem" >
                                                            <option value="text">Testo</option>
                                                            <option value="table">Tabella</option>
                                                            <option value="img">Immagine</option>
                                                        </select><br><br>
                                                        <button id="butt_inser" name="action" value="new" class='btn btn-danger'>Inserisci Classe</button>
                                                    </div>
                                                </div>

                                                <!-- Riquadro Anteprima-->
                                                <div class="col-sm-7 col-sm-offset-1 centra ">
                                                    <br><br>
                                                    <div id="anteprima" class="paddingAnteprima center-block">
                                                        <!--    QUI carichiamo il riquadro per l'anteprima-->
                                                        <?php include('sample_text.php'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="separator">
                                            <div id="regole">
                                                <!--   QUI carichiamo il file con le regole-->
                                                <?php include('rules_text.php'); ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>

<!--  Gestione lightbox-->
<script>
    $(function () {

        $('#delete_button').on('click', function () {
            var id_class = $('#classi').children(":selected").attr("id");

            $.post("/mik_cms/controller/css_controller.php", {
                action: "delete",
                id: id_class
            });
        });

        $('#postForm').on('submit', function (e) {
            e.defaultPrevented();
            $('#postForm').attr('action', "/mik_cms/controller/css_controller.php?action=new_" + $('#tipo_elem').val());
        });
    });

    function filter_class(currElem) {
        //il campo value delle option contiene il tipo di classe css selezionata
        var class_type = $(currElem).val();

        if (class_type !== '') {

            var class_content = $("#classi option:selected").attr('content-data');

            //modifichiamo la select list del tipo di classe
            $('#tipo_elem').val(class_type);
            $('#tipo_elem').hide();


            $('#name').attr("readonly", true);
            $('#regole').load("rules_" + class_type + ".php");

            $('#anteprima').load("sample_" + class_type + ".php", function () {
                applyPreview(class_type);
            });

            //CHIAMATA ALLA PAGINA PARSER
            $.post('/mik_cms/controller/pars_class.php', {"content": class_content, "type": class_type})
                    .done(function (data) {
                        if (class_type === 'text') {
                            $('#name').val($("#classi option:selected").attr('name-data').substring(1));
                            $.each(data, function (key, value) {
                                if (key === 'font-weight') {
                                    $('#f-weight').prop('checked', true);
                                } else if (key === 'font-style') {
                                    $('#f-style').prop('checked', true);
                                } else if (key === 'text-align') {
                                    $('#radio-group input[type=radio][value="' + value + '"]').first().attr('checked', 'checked');
                                } else {
                                    if (value.charAt(0) === '#') {
                                        $('#' + key + ' .pick-a-color').val(value.substring(1));
                                    }
                                    else
                                        $('#' + key).val(value);
                                }
                            });

                        } else if (class_type === 'img') {
                            $('#name').val($("#classi option:selected").attr('name-data').substring(4));

                            $.each(data, function (key, value) {

                                if (value.charAt(0) === '#') {
                                    $('#' + key + ' .pick-a-color').val(value.substring(1));
                                }
                                else
                                    $('#' + key).val(value);
                            });

                        } else if (class_type === 'table') {
                            $('#name').val($("#classi option:selected").attr('name-data').substring(6));
                            $.each(data, function (key, value) {
                                if (key === 'font-weight') {
                                    $('#f-weight').prop('checked', true);
                                } else if (key === 'font-style') {
                                    $('#f-style').prop('checked', true);
                                } else if (key === 'text-align') {
                                    $('#radio-group input[type=radio][value="' + value + '"]').first().attr('checked', 'checked');
                                } else if (key.substring(0, 2) === 'td') {
                                    if (key.substring(3) === 'vertical-align') {
                                        $('#radio-g input[type=radio][value="' + value + '"]').first().attr('checked', 'checked');
                                    } else if (value.charAt(0) === '#') {
                                        $('#' + key.substring(3) + ' .pick-a-color').val(value.substring(1));
                                    }
                                    else
                                        $('#' + key.substring(3)).val(value);
                                } else {
                                    if (value.charAt(0) === '#') {
                                        $('#' + key + ' .pick-a-color').val(value.substring(1));
                                    }
                                    else
                                        $('#' + key).val(value);
                                }
                            });
                        }
                        ;
                    });

        } else {
            $('#name').attr("readonly", false);
            $('#name').val('');
            $('#anteprima').load("sample_text.php");
            $('#regole').load("rules_text.php");

            //modifichiamo la select list del tipo di classe
            $('#tipo_elem').show();
            $('#tipo_elem').val('text');
        }

        return false;
    }
    ;

    function filter_type(currElem) {
        $('#anteprima').load("sample_" + $(currElem).val() + ".php");
        $('#regole').load("rules_" + $(currElem).val() + ".php");
    }
    ;

    function applyPreview(class_type) {

        //applichiamo all'anteprima la classe esistente
        if (class_type === 'text') {

            var nome_classe = $('#classi option:selected').attr('name-data');
            nome_classe = nome_classe.slice(1);
            $('#sample_' + class_type).toggleClass(nome_classe);

        } else if (class_type === 'img') {

            var nome_classe = $('#classi option:selected').attr('name-data');
            nome_classe = nome_classe.slice(4);
            $('#sample_' + class_type).toggleClass(nome_classe);

        } else if (class_type === 'table') {

            var nome_classe = $('#classi option:selected').attr('name-data');
            nome_classe = nome_classe.slice(6);
            $('#sample_' + class_type).toggleClass(nome_classe);
        }
    }
</script>