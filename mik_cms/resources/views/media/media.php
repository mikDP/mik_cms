
<?php
require("../../../controller/check_session.php");
require("../../../controller/media_controller.php");
?>

<!DOCTYPE html>
<html lang='it'>
    <head>
        <title>Media | mik_cms</title>
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
                    <div class='row' id='content-wrapper'>
                        <div class='col-xs-12'>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='page-header'>
                                        <div class="pull-left">
                                            <h1 class="pull-left">
                                                <i class='fa fa-picture-o'></i>
                                                <span>Media</span>
                                            </h1>
                                        </div>
                                        <div class='pull-right'>
                                            <!-- menù a tendina filtro-->
                                            <select  onchange="filter_cat(this);" class="form-control">
                                                <option <?php if ($_GET["cat"] == 0) echo " selected"; ?> value="">Nessun filtro categoria</option>
                                                <?php while ($row = mysqli_fetch_array($cat_menu)) { ?>  
                                                    <option <?php if ($_GET["cat"] == $row[0]) echo " selected"; ?> value="<?= $row[0] ?>"><?= $row[0] ?></option>
                                                <?php } ?>
                                            </select>

                                            <!--Campo di ricerca-->
                                            <div class="navbar-form navbar-right hidden-xs">
                                                <i class="btn btn-link fa fa-search" name="button"></i>
                                                <div class="form-group">
                                                    <input id="search_bar" onkeydown = "if (event.keyCode == 13) {
                                                                window.location.href = 'media.php?pag=<?= $pag ?>&search=' + this.value;
                                                            }"  type="text" name="search_bar" value="<?= $name ?>" class="form-control" placeholder="Ricerca per nome..." autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class='col-sm-2' style="margin-bottom:10px;" >
                                    <a  class="new_media" href="" ><i class='fa fa-plus-square'></i>  Carica immagine</a>
                                </div>
                                <div class='col-sm-4 text-error' style="margin-bottom:10px;" >
                                    <b><?= $_GET["errore"]; ?></b>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='box'>
                                        <div class='box-content'>
                                            <div class='gallery'>
                                                <ul class='list-unstyled list-inline'>
                                                    <!--                          Elemento foto-->
                                                    <?php while ($row = mysqli_fetch_array($immagini)) { ?>
                                                        <li>
                                                            <div class='picture'>
                                                                <div class='actions'>
                                                                    <div class='pull-left'>
                                                                        <a onclick="update(this);" class='btn btn-link' href='#' data-id="<?= $row[0] ?>" >
                                                                            <small style="font-size: 7pt;">
                                                                                <i class='fa fa-sticky-note'></i>
                                                                               <?php  echo substr(($row[1]), 0, 27); ?>
                                                                            </small>
                                                                        </a>
                                                                    </div>
                                                                    <div class='pull-right'>
                                                                        <!--                                    bottone modifica-->
                                                                        <a onclick="update(this);"class='btn btn-link' data-id="<?= $row[0] ?>">
                                                                            <i class='fa fa-pencil'></i>
                                                                        </a>
                                                                        <!--                                    bottone elimina-->
                                                                        <a onclick="elimina(this);" class='btn btn-link'data-id="<?= $row[0] ?>">
                                                                            <i class='fa fa-trash'></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <img width="250" height="150" src="<?= $row[2] . $row[1] ?>" />
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                Creazione indice pagine-->
                            <div class="col-sm-12 text-center text-red">
                                <span>
                                    <?php
                                    $i = 1;
                                    $currpage = $_GET["pag"];
                                    while (($totpag > 1) && ($i <= $totpag)) {
                                        if ($i != $currpage) {
                                            ?>
                                            <a  class="text-red"href="/mik_cms/controller/media_controller.php?pag=<?= $i ?>&action=filter"><b><?= $i ?></b></a>
                                        <?php } else {
                                            ?>
                                            <i style="color: black;"> <?= $i ?> </i>
                                            <?php
                                        } $i++;
                                    }
                                    ?>
                                </span>
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
    var pag = "<?= $pag ?>";
    $('a.new_media').colorbox({
        href: "new_media.php?pag=" + pag
    });

    function update(currElem) {
        var pag = "<?= $pag ?>";
        $(currElem).colorbox({
            href: "update_media.php?pag=" + pag + "&id=" + $(currElem).attr('data-id')
        });
    }
    ;

    function elimina(currElem) {
        var pag = "<?= $pag ?>";
        $(currElem).colorbox({
            href: "delete_media.php?pag=" + pag + "&id=" + $(currElem).attr('data-id')
        });
    }
    ;


    function filter_cat(currElem) {
        var pag = "<?= $pag ?>";
        window.location.href = "media.php?pag=" + pag + "&cat=" + $(currElem).val();
    }
    ;

</script>
