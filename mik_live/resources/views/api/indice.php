<?php
require("../../../controller/indice_controller.php");
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

    <body>
        <div class="landing-page">
            <div class="page-wrapper">

                <!-- ******Header****** -->
                <header class="header text-center">
                    <div class="container">
                        <?= $header['content'] ?>
                    </div><!--//container-->
                </header><!--//header-->


                <!-- Menù orizzontale-->
                <?php require("../template/navbar.php"); ?>


                <!--Contenuto-->
                <section class="cards-section text-center">
                    <div class="container">

                        <div id="cards-wrapper" class="cards-wrapper row">

                            <?php
                            foreach ($genitori as $genitore) {
                                $sottocategorie = array();
                                ?>
                                <div class="item item-red col-md-4 col-sm-6 col-xs-6">
                                    <div class="item-inner">
                                        <h3 class="title"><?= $genitore[1] ?></h3>
                                        <p class="intro">
                                            <?php
                                            foreach ($figli as $figlio) {
                                                if ($figlio[5] == $genitore[0]) {
                                                    $sottocategorie[] = $figlio[1];
                                                }
                                            }
                                            echo implode(', ', $sottocategorie);
                                            ?>
                                        </p>
                                        <a class="link" href="/mik_live/resources/views/api/doc.php?id=<?= $genitore[0] ?>"><span></span></a>
                                    </div><!--//item-inner-->
                                </div><!--//item-->
                            <?php } ?>


                        </div><!--//cards-->

                    </div><!--//container-->
                </section><!--//cards-section-->
            </div><!--//page-wrapper-->

            <footer class="footer text-center">
                <div class="container">
                    <?= $footer['content'] ?>
                </div><!--//container-->
            </footer><!--//footer-->
        </div>
    </body>
</html>

<script type="text/javascript">
</script>


