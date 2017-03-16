<?php
require("../../../controller/connection.php");

//CREARE UNA VIEW CHE PERMETTA DI AVERE I NOMI COMPLETI DELLA CATEGORIA INVECE DELL'ID
$sql = "SELECT * FROM docs_it, categories WHERE categories.id = docs_it.category";
$articoli = $conn->query($sql);
$conn->close();
?>

<div id="linkmodal" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="modal-title" class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box bordered-box red-border" style="margin-bottom:0;">
                            <div class="box-content box-no-padding">
                                <div class="responsive-table">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                    
                                        <!--                            Contenuto della tabella-->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="data-table table table-bordered table-striped dataTable no-footer" style="margin-bottom:0;" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                    <thead class="red-background" style="color:white;">
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Preview" style="width: 30%;">
                                                                ID
                                                            </th>
                                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Titolo: attiva per ordinare in manieraascendente" style="width: 30%;">
                                                                Titolo
                                                            </th>
                                                            <th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Data: attva per ordinare in maniera ascendente" style="width: 30%;">
                                                                Data
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Data: attva per ordinare in maniera ascendente" style="width: 30%;">
                                                                Categoria
                                                            </th>
                                                            <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 10%;">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        $i = 1;
                                                        while ($row = mysqli_fetch_array($articoli)) {
                                                            $i = 1 - $i;
                                                            if ($i == 0) {
                                                                ?>
                                                                <tr role="row" style="height: 75px;line-height: 75px; text-align: center;" class="odd">
                                                                <?php } else { ?>
                                                                <tr role="row" style="height: 75px;line-height: 75px;  text-align: center;" class="even">      
                                                                <?php } ?>
                                                                <td style="vertical-align: middle;"><?= $row[0] ?></td>
                                                                <td style="vertical-align: middle;"><?= $row[1] ?></td>
                                                                <td class="sorting_1" style="vertical-align: middle;"><?= $row[2] ?></td>
                                                                <td style="vertical-align: middle;"><?= $row[6] ?></td>
                                                                <td style="vertical-align: middle;">
                                                                    <div class="text-right">

                                                                        <button onClick="selLink(this);" data-title="<?= $row[1] ?>" data-id="<?= $row[0] ?>" class="btn btn-success btn-xs" href="#">
                                                                            <i class="fa fa-check"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr> <?php } ?>
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
        </div>
    </div>
</div>


<script>
    function selLink(currElem) {
        //link da inserire ancora da decidere
        var selectedArticle ="<a href='/mik_cms/resources/assets/images/media/" + $(currElem).attr('data-id') + "'>"+  $(currElem).attr('data-title') + "</a>" ;
        tinymce.activeEditor.insertContent(selectedArticle);
        $("#linkmodal").modal('toggle');
    };
</script>



