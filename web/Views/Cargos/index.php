<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Cargos</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmCargo();"><i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblCargos" name="tblCargos">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Cargo</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Inicio del Modal -->
<div id="nuevo_cargo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="cargoModal">Nueva Cargo</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post" id="frmCargo">                   

                <div class="form-group">
                    <label for="cargo">Cargo</label>
                    <input id="cargo" class="form-control" type="text" name="cargo" placeholder="Introduzca la Cargo" required>
                    <input id="id_cargo" type="hidden" name="id_cargo" value="">
                </div>

                <button class="btn btn-primary" type="button" onclick="registrarCargo(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal -->


<?php include "Views/Templates/footer.php";?>