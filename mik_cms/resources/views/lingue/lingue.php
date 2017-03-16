<?php
require("../../../controller/check_session.php");
require("../../../controller/lingue_controller.php");
?>

<!DOCTYPE html>
<html lang='it'>
    <head>
        <title>Lingue | mik_cms</title>
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
                            <div class='page-header'>
                                <div class="pull-left">
                                    <h1 class="pull-left">
                                        <i class='fa fa-language'></i>
                                        <span>Lingue</span>
                                    </h1>
                                </div>
                            </div>
                            <div class='container'>
                                <div class='row' id='content-wrapper'>
                                    <div class='col-sm-4 col-sm-offset-4' >
                                        <a  class="new_lingua" href="" ><i class='fa fa-plus-square'></i>  Aggiungi lingua</a>
                                    </div>
                                </div>
                                <div class='row' id='content-wrapper'>
                                    <div class='col-sm-3 col-sm-offset-4 text-justify text-red' >
                                        <p><b>L'allineamento crea le tabelle della lingua selezionata e traduce tutti gli articoli già presenti nella base dati.</b></p>
                                    </div>
                                </div>
                                <div class="row" id='content-wrapper'>
                                    <div class="col-sm-3 col-sm-offset-4">
                                        <div class="box bordered-box red-border" style="margin-bottom:0;">
                                            <div class="box-content box-no-padding">
                                                <div class="responsive-table">
                                                    <table class="table" style=" margin-bottom:0;">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 10%;">
                                                                    ID
                                                                </th>
                                                                <th style="width: 60%;">
                                                                    Lingua
                                                                </th>
                                                                <th style="width: 15%;">
                                                                    Modifica
                                                                </th>
                                                                <th style="width: 15%;">
                                                                    Allinea                                                                   
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php while ($row = mysqli_fetch_array($lingue)) { ?>
                                                                <tr>
                                                                    <td ><?= $row[0] ?></td>
                                                                    <td class="text-capitalize"><?= $row[1] ?></td>
                                                                    <td style="text-align:center;"><a href="" onclick="update(this);" class="update_lingua" lan-name="<?= $row[1] ?>" data-id="<?= $row[0]; ?>">
                                                                            <button class="btn btn-warning btn-xs">
                                                                                <i class="fa fa-pencil">
                                                                                </i>
                                                                            </button>
                                                                        </a>
                                                                    </td>
                                                                    <td style="text-align:center;"><a href="../../../controller/lingue_controller.php?action=align&id=<?= $row[0]; ?>" >
                                                                            <button class="btn btn-success btn-xs">
                                                                                <i class="fa fa-download">
                                                                                </i>
                                                                            </button>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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
    $(document).ready(function () {

        $('a.new_lingua').colorbox({href: "new_lingua.php"});
    });

    function update(currElem) {
        $(currElem).colorbox({
            href: "update_lingua.php?id=" + $(currElem).attr('data-id') + "&lan=" + $(currElem).attr('lan-name')
        });
    };
</script>