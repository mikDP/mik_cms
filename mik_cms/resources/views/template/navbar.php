<?php require($_SERVER['DOCUMENT_ROOT'] . "/mik_cms/controller/navbar_controller.php"); ?>
<div id='main-nav-bg'></div>
<nav id='main-nav'>
    <div class='navigation'>
        <ul class='nav nav-stacked'>
            <li class=''>
                <a class="dropdown-collapse" href="#">
                    <i class='fa fa-folder-open'></i>
                    <span>Documenti API</span>
                    <i class='fa fa-angle-down angle-down'></i>
                </a>
                <ul class='nav nav-stacked'>
                    <li class='' style="background-color: #C3C3C3;">
                        <a href="/mik_cms/resources/views/index.php">
                            <div class="icon">
                                <i class='fa fa-info'></i>
                            </div>
                            <span>Indice</span>
                        </a>
                    </li>

                    <!--Sottomenù dinamico, creare una cartella con il nome della categoria aggiunta in minuscolo-->
                    <?php
                    foreach ($nav_cat_genitori as $row) {
                        if (isset($row['hasChild'])) {
                            ?>

                            <li class=''>
                                <a class=" dropdown-collapse" >
                                    <div class="icon">
                                        <i class='fa fa-caret-right'></i>
                                    </div>
                                    <span onclick="redirect(this);" href="/mik_cms/resources/views/pagine/pagine.php?cat=<?php echo($row['id']); ?>" ><?= substr($row['category'], 0, 28); ?></span>
                                    <i class="fa fa-angle-down angle-down"></i>
                                </a>
                                <ul class="nav nav-stacked" style="background-color:#FFD1D1;">
                                    <?php
                                    foreach ($nav_cat_figli as $figlio) {
                                        if ($figlio['parent'] == $row['id']) {
                                            ?>
                                            <li>    
                                                <a  href="/mik_cms/resources/views/pagine/pagine.php?cat=<?php echo($figlio['id']); ?>">
                                                    <div class="icon">
                                                        <i class='fa fa-caret-right'></i>
                                                    </div>
                                                    <span><?= substr($figlio['category'], 0, 28); ?></span>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                        <?php } else {
                            ?>
                            <li class=''>
                                <a href="/mik_cms/resources/views/pagine/pagine.php?cat=<?php echo($row['id']); ?>" >
                                    <div class="icon">
                                        <i class='fa fa-caret-right'></i>
                                    </div>
                                    <span><?= substr($row['category'], 0, 28); ?></span>
                                </a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </li>
            <li class=''>
                <a href='/mik_cms/resources/views/categorie/categorie.php'>
                    <i class='fa fa-server'></i>
                    <span>Categorie API</span>
                </a>
            </li>

            <li class=''>
                <a href='/mik_cms/resources/views/media/media.php?pag=1'>
                    <i class='fa fa-image'></i>
                    <span>Media</span>
                </a>
            </li>
            <li class=''>
                <a href='/mik_cms/resources/views/lingue/lingue.php'>
                    <i class='fa fa-language'></i>
                    <span>Lingue</span>
                </a>
            </li>
            <li class=''>
                <a href='/mik_cms/resources/views/css/css.php'>
                    <i class='fa fa-css3'></i>
                    <span>CSS WYSIWYG</span>
                </a>
            </li>

            <li class=''>
                <a class="disabled-link">
                    <i class='fa fa-globe'></i>
                    <span>Sezione Live:</span>
                </a>
            </li>

            <li class=''>
                <a class="dropdown-collapse" href="#">
                    <i class='fa fa-file-code-o'></i>
                    <span>Pagine Menù</span>
                    <i class='fa fa-angle-down angle-down'></i>
                </a>
                <ul class='nav nav-stacked'>
            </li>

            <?php
            foreach ($nav_menu_genitorim as $row) {
                if (isset($row['hasChild'])) {
                    ?>

                    <li class=''>
                        <a class=" dropdown-collapse" >
                            <div class="icon">
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span  href="/mik_cms/resources/views/pagine/pagina_menu.php?lan=it&menu=1&id=<?= ($row['art_ass']); ?>&cat=<?= ($row['id']); ?>" ><?= substr($row['category'], 0, 28); ?> </span>
                            <i class="fa fa-angle-down angle-down"></i>
                        </a>
                        <ul class="nav nav-stacked" style="background-color:#FFD1D1;">
                            <?php
                            foreach ($nav_menu_figlim as $figlio) {
                                if ($figlio['parent'] == $row['id']) {
                                    ?>
                                    <li>    
                                        <a  href="/mik_cms/resources/views/pagine/pagina_menu.php?lan=it&menu=1&id=<?= ($figlio['art_ass']) ?>&cat=<?= ($figlio['id']) ?>">
                                            <div class="icon">
                                                <i class='fa fa-caret-right'></i>
                                            </div>
                                            <span><?= substr($figlio['category'], 0, 28); ?></span>
                                        </a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </li>
                <?php } else {
                    ?>
                    <li class=''>
                        <a href="/mik_cms/resources/views/pagine/pagina_menu.php?lan=it&menu=1&id=<?= ($row['art_ass']); ?>&cat=<?= ($row['id']); ?>" >
                            <div class="icon">
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span><?= substr($row['category'], 0, 28); ?> </span>
                        </a>
                    </li>
                    <?php
                }
            }
            ?>            

        </ul>
        </li>

        <li class=''>
            <a href='/mik_cms/resources/views/menu/menu.php'>
                <i class='fa fa-toggle-down'></i>
                <span>Menù</span>
            </a>
        </li>
        <li class=''>
            <a class=" dropdown-collapse" >
                <i class='fa fa-edit'></i>
                <span>Struttura</span>
                <i class="fa fa-angle-down angle-down"></i>
            </a>
            <ul class="nav nav-stacked">                
                <li>    
                    <a  href="/mik_cms/resources/views/pagine/articolo_struttura.php?lan=it&cat=0&id=0">
                        <div class="icon">
                            <i class='fa fa-caret-right'></i>
                        </div>
                        <span>Header</span>
                    </a>
                </li>
                <li>    
                    <a  href="/mik_cms/resources/views/pagine/articolo_struttura.php?lan=it&cat=0&id=1">
                        <div class="icon">
                            <i class='fa fa-caret-right'></i>
                        </div>
                        <span>Footer</span>
                    </a>
                </li>
            </ul>
        </li>
        </ul>
    </div>
</nav>

<script>
    function redirect(currElem) {

        window.location.replace($(currElem).attr('href'));
    }
</script>
