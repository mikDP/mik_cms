<?php
require("../../../controller/doc_controller.php");
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="it" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="it"> <!--<![endif]-->
    <head>
        <title>Indice | mik_live</title>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php require("../template/head.php"); ?>
    </head>

    <body class="body-red">
        <div class="page-wrapper">

            <!-- Menù orizzontale-->
            <?php require("../template/navbar.php"); ?>


            <div class="doc-wrapper" style="margin-top:70px">
                <div class="container">
                    <div id="doc-header" class="doc-header text-center">
                        <h1 class="doc-title"><i class="icon fa fa-book"></i> <?= $categoria['category'] ?></h1>
    <!--                <div class="meta"><i class="fa fa-clock-o"></i> Last updated: Jan 25th, 2016</div>-->
                    </div><!--//doc-header-->

                    <div class="doc-body">

                        <!-- Contenuto-->
                        <div class="doc-content">
                            <div class="content-inner">
                                <?php
                                if ($articoli_cat_principale != null) {
                                    foreach ($articoli_cat_principale as $articolo_cat) {
                                        ?>
                                        <section id="<?= $articolo_cat[0] ?>" class="doc-section">

                                            <i class='fa fa-caret-right '></i>
                                            <span style="font-size: 13pt; font-weight: bold ">  <?= $articolo_cat[1] ?></span>
                                            <hr>
                                            <div class="section-block">
                                                <?=  $articolo_cat[4] ?>
                                            </div>
                                        </section><!--//doc-section-->
                                        <?php
                                    }
                                }
                                ?>


                                <?php foreach ($sub_category as $sub_categoria) { ?>
                                    <section id="cat-<?= $sub_categoria[0] ?>" class="doc-section">
                                        <h2 class="section-title" style="color: #FE6653;"><?= $sub_categoria[1] ?></h2>
                                        <br>
                                        <br>
                                        <?php
                                        foreach ($articoli_selezionati as $articolo) {
                                            if ($articolo[3] == $sub_categoria[0]) {
                                                ?>
                                                <section id="<?= $articolo[0] ?>" class="doc-section">

                                                    <i class='fa fa-caret-right '></i>
                                                    <span style="font-size: 13pt; font-weight: bold ">  <?= $articolo[1] ?></span>
                                                    <hr>
                                                    <div class="section-block">
                                                        <?= $articolo[4] ?>
                                                    </div>
                                                </section><!--//doc-section-->
                                                <?php
                                            }
                                        }
                                        ?>
                                    </section><!--//doc-section-->
                                <?php }
                                ?>

                            </div><!--//content-inner-->
                        </div><!--//doc-content-->

                        <!-- Barra dei menù -->
                        <div class="doc-sidebar hidden-xs">
                            <nav id="doc-nav">
                                <ul id="doc-menu" class="nav doc-menu" data-spy="affix">
                                    <?php if ($articoli_cat_principale != null) { ?>
                                        <li>
                                            <a class="scrollto" href="#cat-<?= $categoria[0] ?>"><b><?= $categoria[1] ?></b></a>
                                        </li>
                                        <!--Articoli categoria principale-->
                                        <ul class="nav doc-sub-menu">
                                            <?php
                                            foreach ($articoli_cat_principale as $articolo_cat) {
                                                ?>
                                                <li>
                                                    <a class="scrollto" href="#<?= $articolo_cat[0]; ?>"><?= $articolo_cat[1]; ?></a>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul><!--//nav-->

                                        <?php
                                    }
                                    ?>
                                    <?php foreach ($sub_category as $sub_categoria) { ?>
                                        <li>
                                            <a class="scrollto" href="#cat-<?= $sub_categoria[0] ?>"> <b><?= $sub_categoria[1] ?></b></a>
                                        </li>

                                        <!--Articoli sotto-categoria-->
                                        <ul class="nav doc-sub-menu">
                                            <?php
                                            foreach ($articoli_selezionati as $articolo) {
                                                if ($articolo[3] == $sub_categoria[0]) {
                                                    ?>
                                                    <li>
                                                        <a class="scrollto" href="#<?= $articolo[0]; ?>"><?= $articolo[1]; ?></a>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul><!--//nav-->
                                        <?php
                                    }
                                    ?>
                                </ul><!--//doc-menu-->
                            </nav>
                        </div><!--//doc-sidebar-->
                    </div><!--//doc-body-->              
                </div><!--//container-->
            </div><!--//doc-wrapper-->        
        </div><!--//page-wrapper-->

        <footer id="footer" class="footer text-center">
            <div class="container">
            </div><!--//container-->
        </footer><!--//footer-->

    </body>
</html> 

