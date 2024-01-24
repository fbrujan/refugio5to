<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Tandas</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmTanda();"><i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblTandas" name="tblTandas">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Tanda</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Inicio del Modal -->
<div id="nueva_tanda" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="tandaModal">Nueva Tanda</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post" id="frmTanda">                   

                <div class="form-group">
                    <label for="tanda">Tanda</label>
                    <input id="tanda" class="form-control" type="text" name="tanda" placeholder="Introduzca la Tanda" required>
                    <input id="id_tanda" type="hidden" name="id_tanda" value="">
                </div>

                <button class="btn btn-primary" type="button" onclick="registrarTanda(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal -->


<?php include "Views/Templates/footer.php";?>