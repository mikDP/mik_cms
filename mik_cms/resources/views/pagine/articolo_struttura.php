
<?php
require("../../../controller/check_session.php");
require("../../../controller/articolo_controller.php");
?>

<!DOCTYPE html>
<html lang='it'>
    <head>
        <title>Crea\Modifica articolo | mik_cms</title>
        <?php require("../template/head.php"); ?>

    </head>
    <body class='contrast-red without-footer wysihtml-supported'>
        <?php require("../template/header.php"); ?>
        <div id='wrapper'>      
            <!--      Includiamo il menù sinistro-->
            <?php include("../template/navbar.php"); ?>

            <!--      Content-->
            <section id='content'>
                <div class='container'>
                    <div class='row' id='content-wrapper'>
                        <div class='col-xs-12'>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='page-header'>
                                        <h1 class='pull-left'>
                                            <i class='fa fa-pencil-square-o'></i>
                                          
                                                <span>Modifica <b><?= $id_cat[2] ?></b> <i class="text-red"><?= $curr_title ?></i> in lingua <i><?= $id_lingua ?></i></span>
                                            
                                        </h1>
                                    </div>
                                </div>
                            </div>

                            <!--       CONTENUTO-->
                            
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <h4 class="text-red">Anteprima attuale</h4><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-sm-offset-">
                                    <div class="container">
                                        <?= ($curr_prev); ?>
                                    </div>
                                </div>
                            </div>
                            <hr class="separator">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">

                                    <!--Inizio Form-->
                                    <form id="postForm" action="/mik_cms/controller/articolo_controller.php?action=insert&cat=<?= $category; ?>&id=<?= $id; ?>&lan=<?= $id_lingua ?>" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
                                        <div class="form-group" id="campo_titolo">
                                            <label class="col-md-2 control-label" for="titolo">Titolo</label>
                                            <div class="col-md-3">
                                                <input class="form-control" name="title" id="title" value="<?= $curr_title; ?>"placeholder="Inserisci il titolo..." type="text" required="true">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group" id='campo_data'>
                                            <label class="col-md-2 control-label" for="date">Data</label>
                                            <div class="col-xs-4 col-md-2 ">
                                                <input class="form-control"  id="date" placeholder="<?php
                                                if ($mod == 0)
                                                    echo date('d:m:Y');
                                                else
                                                    echo $curr_date;
                                                ?>" type="text" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group" id='campo_cat'>
                                            <?php
                                            if ($id_cat[1] == 1) {
                                                echo '<label class="col-md-2 control-label" for="categoria">Voce menù</label>';
                                            } else {
                                                echo '<label class="col-md-2 control-label" for="categoria">Categoria</label>';
                                            }
                                            ?>
                                            <div class="col-xs-4 col-md-2">
                                                <input class="form-control" name="categoria" id="categoria" value="<?= $id_cat[2]; ?>" type="text" readonly>
                                            </div>
                                        </div>
                                        <br><br>
                                        <!--WYSIWYG tinyMCE-->  
                                        <textarea id="wys"  name="content"><?= ($curr_cont); ?></textarea>
                                        </br>
                                        <button type="submit" class="btn btn-danger col-sm-2 col-sm-offset-5">Inserisci</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
<script src="/mik_cms/resources/assets/plugins/tinymce/jquery.tinymce.min.js"></script>
<script src="/mik_cms/resources/assets/plugins/tinymce/tinymce.min.js"></script>


<script>
    $(document).ready(function () {
        
        $('#campo_data').hide();
        $('#campo_cat').hide();
        $('#campo_titolo').hide();

        tinymce.init({
            selector: '#wys',
            height: 400,
            min_height: 200,
            content_css: '/mik_cms/resources/assets/stylesheets/wysiwyg_styles.css',
            importcss_groups: [
                {title: 'Tabella', filter: /^(table|td|tr)\./}, // td.class, tr.class and table.class
                {title: 'Blocchi', filter: /^(div|p)\./}, // div.class and p.class
                {title: 'Immagine', filter: /^(img)\./}, // img.class
                {title: 'Altri'} // The rest
            ],
            importcss_merge_classes: true,
            importcss_append: true,
            setup: function (editor) {
                editor.addButton('gallery', {
                    text: 'Gallery',
                    icon: 'mce-ico mce-i-image',
                    onclick: function () {
                        $("#imagemodal").modal();
                    }
                }),
                        editor.addButton('locallink', {
                            text: 'Locale',
                            icon: 'mce-ico mce-i-link',
                            onclick: function (editor) {
                                $("#linkmodal").modal();
                            }
                        });
            },
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'template paste textcolor colorpicker textpattern imagetools codesample toc jbimages importcss'
            ],
            toolbar1: 'undo redo | insert | styleselect | fontsizeselect bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
            toolbar2: 'link locallink jbimages gallery | preview media | forecolor backcolor | codesample code',
            relative_urls: false,
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt'
        });

    });


</script>

<?php require("./image_gallery.php"); ?>
<?php require("./local_link.php"); ?>

