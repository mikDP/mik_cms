<?php
require("../../controller/index_controller.php");
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
        <?php require("template/head.php"); ?>
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
                <?php require("template/navbar.php"); ?>


                <!--Contenuto-->
                <section class="text-center">
                    <div class="container">
                        <?php
                        if (!isset($_GET['id'])) {
                            echo $home['content'];
                        } else
                            echo$articolo['content'];
                        ?>

                    </div><!--//container-->
                </section>
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

//    $(document).ready(function(){
//
//        $("#horNav").affix({
//
//            offset: { 
//
//                top: 150
//
//            }
//
//        });
//
//    });

</script>


