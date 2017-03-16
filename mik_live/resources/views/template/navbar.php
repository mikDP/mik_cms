<?php require($_SERVER['DOCUMENT_ROOT'] . "/mik_live/controller/navbar_controller.php"); ?>

<nav  id="horNav" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand">Mik Live</span>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!--Sottomenù dinamico, creare una cartella con il nome della categoria aggiunta in minuscolo-->
                <?php
                foreach ($nav_menu_genitori as $row) {
                    if (isset($row['hasChild'])) {
                        ?>
                        <li class='dropdown'>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $row['category'] ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php
                                foreach ($nav_menu_figli as $figlio) {
                                    if ($figlio['parent'] == $row['id']) {
                                        ?>
                                        <li><a href="/mik_live/resources/views/index.php?id=<?php echo($figlio['art_ass']); ?>"><?= $figlio['category'] ?></a></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                    <?php } else {
                        ?>
                        <li>
                            <a href="/mik_live/resources/views/index.php?id=<?php echo($row['art_ass']); ?>" >
                                <?= substr($row['category'], 0, 28); ?>
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>
                <li><a href="/mik_live/resources/views/api/indice.php">Documentazione</a></li>
            </ul
        </div><!--/.nav-collapse -->
    </div>
</nav>

<script>
    
    //non funziona perché dovrebbe considerare path della pagina senza variabili get nell'url
    $(function () {

        $('a[href="' + location.pathname + '"]').closest('li').addClass('active');

    });
</script>