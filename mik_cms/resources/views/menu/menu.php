<?php
require("../../../controller/check_session.php");
require("../../../controller/menu_controller.php");
?>

<!DOCTYPE html>
<html lang='it'>
    <head>
        <title>Menù | mik_cms</title>
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
                    <div class='row'id='content-wrapper'>
                        <div class='col-xs-12'>
                            <div class='page-header'>
                                <div class="pull-left">
                                    <h1 class="pull-left">
                                        <i class='fa fa-toggle-down'></i>
                                        <span>Menù</span>
                                    </h1>
                                </div>
                            </div>
                            <div class='container'>
                                <div class='row' id='content-wrapper'>
                                    <div class='col-sm-4 col-sm-offset-4'>
                                        <span  style="color:red; font-size: 12pt" class="new_menu" ><i class='fa fa-plus-square'></i>  Nuovo Menù</span>
                                    </div>
                                </div>
                                <div class='row' id='content-wrapper'>
                                    <div class='col-sm-2 col-sm-offset-4'>
                                        <span  style="color:red; font-size: 12pt" class="new_submenu" ><i class='fa fa-plus-square'></i>  Nuovo Sottomenù</span>
                                    </div>
                                    <div class='col-sm-2 col-sm-offset-1' >
                                        <span   style="color:red; font-size: 12pt" class="sort_menu" ><i class='fa fa-sort'></i>  Ordina</span>
                                    </div>
                                </div>
                                <div class="row" id='content-wrapper'>
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <?php
                                        foreach ($genitori as $row) {
                                            if ($row[2] == 1) {
                                                ?>
                                                <div class="box-categorie">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="box">
                                                                <div class="box-header" style="background:#BEE5C7; border:solid 1px;">
                                                                    <div class="title">
                                                                        <?= $row[1]; ?>
                                                                    </div>
                                                                    <div class="actions">
                                                                        <button class="btn btn-warning btn-sm update_menu"  data-id="<?= $row[0]; ?>" cat-name="<?= $row[1]; ?>">
                                                                            <i class="fa fa-pencil">
                                                                            </i>
                                                                        </button>

                                                                        <a href="../../../controller/menu_controller.php?action=disable&menu=<?= $row[0] ?>&par=1" class="btn btn-danger btn-sm butt_elimina"role='button'>
                                                                            <i class="fa fa-close">
                                                                            </i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-10 col-sm-offset-2">
                                                            <?php
                                                            foreach ($figli as $figlio) {
                                                                if ($figlio[5] == $row[0]) {
                                                                    if ($figlio[2] == 1) {
                                                                        ?>
                                                                        <div class="box small">
                                                                            <div class="box-header" style="background:#BEE5C7; border:solid 1px;">
                                                                                <div class="title">
                                                                                    <?= $figlio[1]; ?>
                                                                                </div>
                                                                                <div class="actions">
                                                                                    <button class="btn btn-warning btn-sm update_menu"  data-id="<?= $figlio[0]; ?>" cat-name="<?= $figlio[1]; ?>">
                                                                                        <i class="fa fa-pencil">
                                                                                        </i>
                                                                                    </button>

                                                                                    <a href="../../../controller/menu_controller.php?action=disable&menu=<?= $figlio[0] ?>" class="btn btn-danger btn-sm butt_elimina"role='button'>
                                                                                        <i class="fa fa-close">
                                                                                        </i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } else { ?>
                                                                        <div class="box small">
                                                                            <div class="box-header" style="background:#FFC4C4; border:solid 1px;">
                                                                                <div class="title">
                                                                                    <?= $figlio[1]; ?>
                                                                                </div>
                                                                                <div class="actions">
                                                                                    <button class="btn btn-warning btn-sm update_menu"  data-id="<?= $figlio[0]; ?>" cat-name="<?= $figlio[1]; ?>">
                                                                                        <i class="fa fa-pencil">
                                                                                        </i>
                                                                                    </button>

                                                                                    <a href="../../../controller/menu_controller.php?action=enable&menu=<?= $figlio[0] ?>" class="btn btn-danger btn-sm butt_elimina"role='button'>
                                                                                        <i class="fa fa-check">
                                                                                        </i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                </br>
                                            <?php } else { ?>

                                                <div class="box-categorie">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="box">
                                                                <div class="box-header" style="background:#FFC4C4; border:solid 1px;">
                                                                    <div class="title">
                                                                        <?= $row[1]; ?>
                                                                    </div>
                                                                    <div class="actions">
                                                                        <button class="btn btn-warning btn-sm update_menu"  data-id="<?= $row[0]; ?>" cat-name="<?= $row[1]; ?>">
                                                                            <i class="fa fa-pencil">
                                                                            </i>
                                                                        </button>

                                                                        <a href="../../../controller/menu_controller.php?action=enable&menu=<?= $row[0] ?>&par=1" class="btn btn-danger btn-sm butt_elimina"role='button'>
                                                                            <i class="fa fa-close">
                                                                            </i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-10 col-sm-offset-2">
                                                            <?php
                                                            foreach ($figli as $figlio) {
                                                                if ($figlio[5] == $row[0]) {
                                                                    if ($figlio[2] == 1) {
                                                                        ?>
                                                                        <div class="box small">
                                                                            <div class="box-header" style="background:#BEE5C7; border:solid 1px;">
                                                                                <div class="title">
                                                                                    <?= $figlio[1]; ?>
                                                                                </div>
                                                                                <div class="actions">
                                                                                    <button class="btn btn-warning btn-sm update_menu"  data-id="<?= $figlio[0]; ?>" cat-name="<?= $figlio[1]; ?>">
                                                                                        <i class="fa fa-pencil">
                                                                                        </i>
                                                                                    </button>

                                                                                    <a href="../../../controller/menu_controller.php?action=disable&menu=<?= $figlio[0] ?>" class="btn btn-danger btn-sm butt_elimina"role='button'>
                                                                                        <i class="fa fa-close">
                                                                                        </i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } else { ?>
                                                                        <div class="box small">
                                                                            <div class="box-header" style="background:#FFC4C4; border:solid 1px;">
                                                                                <div class="title">
                                                                                    <?= $figlio[1]; ?>
                                                                                </div>
                                                                                <div class="actions">
                                                                                    <button class="btn btn-warning btn-sm update_menu"  data-id="<?= $figlio[0]; ?>" cat-name="<?= $figlio[1]; ?>">
                                                                                        <i class="fa fa-pencil">
                                                                                        </i>
                                                                                    </button>

                                                                                    <a href="../../../controller/menu_controller.php?action=enable&menu=<?= $figlio[0] ?>" class="btn btn-danger btn-sm butt_elimina"role='button'>
                                                                                        <i class="fa fa-check">
                                                                                        </i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        </br>
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
<script>


    $('span.new_menu').click(function () {
        $('#newmodal').modal('toggle');
    });

    $('span.new_submenu').click(function () {
        $('#newsubmodal').modal('toggle');
    });

    $('span.sort_menu').click(function () {
        $('#sortmodal').modal('toggle');
    });


    $('button.update_menu').click(function () {
        //Andiamo a settare i valori del modale in base alla categoria seleionata
        $('#cat-name').val($(this).attr('cat-name'));
        $('#id-name').val($(this).attr('data-id'));

        $('#updatemodal').modal('toggle');
    });



</script>


<!--MODAL PER LA MODIFICA-->

<div id="updatemodal" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header  red-background">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="modal-title" class="modal-title" style="color:white;">Modifica Voce Menù</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box bordered-box red-border" style="margin-bottom:0;">
                            <div class="box-content box-no-padding">
                                <form id="form_update" style="margin:20px;" action="/mik_cms/controller/menu_controller.php?action=update" class='validate-form' method='POST'>
                                    <input id="cat-name" type='text' name='cat' value='' placeholder='Modifica voce menù' class='form-control' data-rule-required='true' />
                                    <input id='id-name' type='text' name ='id' value='' hidden>
                                    <button class='btn btn-block'>Modifica</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--MODAL NUOVA VOCE MENU-->


<div id="newmodal" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header  red-background">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="modal-title" class="modal-title" style="color:white;">Modifica Voce Menù</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box bordered-box red-border" style="margin-bottom:0;">
                            <div class="box-content box-no-padding">
                                <form style="margin:20px;" action='/mik_cms/controller/menu_controller.php?action=new' class='validate-form' method='POST'>
                                    <input type='text' name='menu' value='' placeholder='Nome nuova voce menù' class='form-control' data-rule-required='true' />
                                    <button class='btn btn-block'>Inserisci</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--MODAL NUOVA SOTTO-MENU-->

<div id="newsubmodal" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header  red-background">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="modal-title" class="modal-title" style="color:white;">Nuova Sottomenù</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box bordered-box red-border" style="margin-bottom:0;">
                            <div class="box-content box-no-padding">
                                <form style="margin:20px;" action='/mik_cms/controller/menu_controller.php?action=newsub' class='validate-form' method='POST'>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label"for="genitore">Seleziona genitore:</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="genitore" id="genitore">
                                                    <?php foreach ($genitori as $row) { ?>  
                                                        <option id="<?= $row[0] ?>" value="<?= $row[0] ?>"><?= $row[1] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type='text' name='menu' value='' id ="menu" placeholder='Nome nuova sottocategoria' class='form-control' data-rule-required='true' />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="row" id="content-wrapper">
                                <div class="col-sm-12">
                                    <button class='btn btn-block'>Inserisci</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--ORDINA ELEMENTI MENU-->
<div id="sortmodal" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header  red-background">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="modal-title" class="modal-title" style="color:white;">Ordina menù</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box bordered-box red-border" style="margin-bottom:0;">
                            <div class="box-content box-no-padding" style="padding-top:20px;">
                                <div class="row" id='content-wrapper'>
                                    <div id="menu-div-modal" class="col-sm-10 col-sm-offset-1">
                                        <form id="" action="/mik_cms/controller/menu_controller.php?action=sort" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
                                            <?php foreach ($genitori as $row) { ?>
                                                <div class="box-categorie">
                                                    <div class="row">
                                                        <div class="box col-sm-8 col-sm-offset-1" data-sort="<?= $row[4]; ?>">
                                                            <?php if ($row[2] == 1) { ?>
                                                                <div class="box-header" style="background:#BEE5C7; border:solid 1px;">
                                                                <?php } else { ?>   
                                                                    <div class="box-header" style="background:#FFC4C4; border:solid 1px;">
                                                                    <?php } ?>
                                                                    <div class="title">
                                                                        <?= $row[1]; ?>
                                                                    </div>                                                       
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2 col-sm-offset-1 ">
                                                                <input class="form-control input-lg" type="text" id="pos_id[]" name="pos_id[<?= $row[0] ?>]" value="<?= $row[4] ?>" >
                                                            </div>  
                                                        </div>
                                                        <div class="row">

                                                            <?php
                                                            foreach ($figli as $figlio) {
                                                                if ($figlio[5] == $row[0]) {
                                                                    if ($figlio[2] == 1) {
                                                                        ?>
                                                                        <div class="box col-sm-6 col-sm-offset-3">
                                                                            <div class="box-header" style="background:#BEE5C7; border:solid 1px;">
                                                                                <div class="title">
                                                                                    <?= $figlio[1]; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <input class="form-control input-lg" type="text" id="pos_id[]" name="pos_id[<?= $figlio[0] ?>]" value="<?= $figlio[4] ?>" >
                                                                        </div>  
                                                                    <?php } else { ?>
                                                                        <div class="box col-sm-6 col-sm-offset-3">
                                                                            <div class="box-header" style="background:#FFC4C4; border:solid 1px;">
                                                                                <div class="title">
                                                                                    <?= $figlio[1]; ?>
                                                                                </div>                                                                                              
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <input class="form-control input-lg" type="text" id="pos_id[]" name="pos_id[<?= $figlio[0] ?>]" value="<?= $figlio[4] ?>" >
                                                                        </div>  
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>

                                                        </div>                                                                    
                                                    </div>
                                                    </br>
                                                <?php } ?>
                                                <div class="row">
                                                    <button id="butt_inser" name="action" value="new" class='btn btn-danger col-sm-offset-5'>Modifica ordine</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>