<?php
require("../../controller/check_session.php");
require("../../controller/index_controller.php");
?>

<!DOCTYPE html>
<html lang='it'>
    <head>
        <title>Indice | mik_cms</title>
        <?php require("template/head.php"); ?>
    </head>
    <body class='contrast-red without-footer'>
        <?php require("template/header.php"); ?>
        <div id='wrapper'>      
            <!--      Includiamo il menù sinistro-->
            <?php include("template/navbar.php"); ?>

            <!--      Content-->
            <section id='content'>
                <div class='container'>
                    <div class='row' id='content-wrapper'>
                        <div class='col-xs-12'>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='page-header'>
                                        <h1 class='pull-left'>
                                            <i class='fa fa-info-circle'></i>
                                            <span>Indice delle categorie:</span>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <?php
                                foreach ($genitori as $genitore) {
                                    $sottocategorie = array();
                                    ?>
                                    <div class="col-sm-2">
                                        <div class="box box-transparent box-nomargin">
                                            <div class="box-header">
                                                <div class="title"><a href="/mik_cms/resources/views/pagine/pagine.php?cat=<?= $genitore[0] ?>"><?= $genitore[1] ?></a></div>
                                            </div>
                                            <div class="box-content">
                                                <ul>
                                                    <?php
                                                    foreach ($figli as $figlio) {
                                                        if ($figlio[5] == $genitore[0]) {
                                                            ?>
                                                            <li><a href="/mik_cms/resources/views/pagine/pagine.php?cat=<?= $figlio[0] ?>"> <?= $figlio[1] ?> </a></li>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div> 
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
