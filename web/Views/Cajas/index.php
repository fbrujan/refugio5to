<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Cajas</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmCaja();"><i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblCajas" name="tblCajas">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Caja</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Inicio del Modal -->
<div id="nueva_caja" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="cajaModal">Nueva Caja</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post" id="frmCaja">                   

                <div class="form-group">
                    <label for="caja">Caja</label>
                    <input id="caja" class="form-control" type="text" name="caja" placeholder="Introduzca la Caja" required>
                </div>

                <div class="form-group">
                    <input id="id_caja" type="hidden" name="id_caja">
                    <label for="descripcion">Descripción</label>
                    <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción de la Caja" required>
                </div>

                
                <button class="btn btn-primary" type="button" onclick="registrarCaja(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal -->


<?php include "Views/Templates/footer.php";?>