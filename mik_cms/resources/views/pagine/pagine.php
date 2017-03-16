
<?php
require("../../../controller/check_session.php");
require("../../../controller/pagine_controller.php");
?>

<!DOCTYPE html>
<html lang='it'>
    <head>
        <title><?= $id_cat[2] ?> | mik_cms</title>
        <?php require("../template/head.php"); ?>
    </head>
    <body class='contrast-red without-footer' >
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
                                            <i class='fa fa-folder-open'></i>
                                            <span>Articoli in 
                                                <?php
                                                if ($id_cat[1] == 1) {
                                                    echo '<i>' . $id_cat[2] . ' (Menù)</i></span>';
                                                } else {
                                                    echo '<i>' . $id_cat[2] . '</i></span>';
                                                }
                                                ?>
                                            </span>
                                        </h1>
                                        <!--                                        <h5 class="text-red pull-right">
                                                                                    <b>Nuovo articolo</b>: verrà  creato un articolo in italiano ed automaticamente tradotto in tutte le altre lingue</br></br>
                                                                                    <b>Modifica articolo</b>: verranno apportate le modifiche solo all'articolo nella lingua selezionata
                                                                                </h5>-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class='col-sm-2 col-sm-offset-3' style="margin-bottom:10px;" >
                                    <a style="color:red; font-size: 12pt" href="articolo.php?cat=<?= $category ?>" ><i class='fa fa-plus-square'></i>  Nuovo Articolo</a>
                                </div>
                                <div class='col-sm-3 text-error' style="margin-bottom:10px;" >
                                    <b><?= $_GET["errore"]; ?></b>
                                </div>
                                <!-- menù a tendina SELEIONE LINGUA-->
                                <div class="col-sm-1" hidden>
                                    <select id="selLan" onchange="sel_len(this);" class="form-control">
                                        <option value="it">Italiano</option>
                                        <?php while ($row = mysqli_fetch_array($lingue)) { ?>  
                                            <option  value="<?= $row[0] ?>"><?= ucfirst($row[1]) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!--                TABELLA-->
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="box bordered-box red-border" style="margin-bottom:0;">
                                        <!--                      Contenuto della tabella-->
                                        <div class="box-content box-no-padding">
                                            <div class="responsive-table">
                                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                                                    <!--                            Header della tabella-->

                                                    <!--                            Contenuto della tabella-->
                                                    <div class="row">
                                                        <div class="col-sm-12">

                                                            <table class="data-table table table-bordered table-striped dataTable no-footer" style="margin-bottom:0;" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                                <thead class="red-background" style="color:white;">
                                                                    <tr role="row">
                                                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Titolo: attiva per ordinare in manieraascendente" style="width: 55%;">
                                                                            Titolo
                                                                        </th>
                                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Data: attva per ordinare in maniera ascendente" style="width: 30%;">
                                                                            Data Creazione
                                                                        </th>
                                                                        <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 15%;">
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    $i = 1;
                                                                    while ($row = mysqli_fetch_array($data)) {
                                                                        $i = 1 - $i;
                                                                        if ($i == 0) {
                                                                            ?>
                                                                            <tr role="row" class="odd">
                                                                            <?php } else { ?>
                                                                            <tr role="row" class="even">      
                                                                            <?php } ?>
                                                                            <td class="sorting_1"><a onclick="openArticle(this);" data-id="<?= $row[0] ?>"><?= $row[1] ?></a></td>
                                                                            <td><?= $row[2] ?></td>
                                                                            <td>
                                                                                <div class="text-right">
                                                                                    <a onclick="openArticle(this);" data-id="<?= $row[0] ?>" class="btn btn-warning btn-xs">
                                                                                        <i class="fa fa-pencil"></i>
                                                                                    </a>
                                                                                    <button onClick="elimina(this);" data-id="<?= $row[0] ?>" class="btn btn-danger btn-xs" href="#">
                                                                                        <i class="fa fa-times"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr> <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- Footer della tabella-->
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
    var cat = "<?= $_GET["cat"] ?>";

    function elimina(currElem) {
        $(currElem).colorbox({
            href: "delete_articolo.php?id=" + $(currElem).attr('data-id') + "&cat=" + cat
        });
    }
    ;

    function openArticle(currElem) {
        var lan = $("#selLan").val();
        window.location.href = "articolo.php?lan=" + lan + "&cat=<?= $category ?>&id=" + $(currElem).attr('data-id')
    }
    ;
</script>
