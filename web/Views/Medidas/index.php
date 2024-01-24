<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Medidas</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmMedida();"><i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblMedidas" name="tblMedidas">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Medida</th>
            <th>Nombre Corto</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Inicio del Modal -->
<div id="nueva_medida" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="medidaModal">Nueva Medida</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post" id="frmMedida">                   

                <div class="form-group">
                    <label for="medida">Medida</label>
                    <input id="medida" class="form-control" type="text" name="medida" placeholder="Introduzca la Medida" required>
                </div>

                <div class="form-group">
                    <input id="id_medida" type="hidden" name="id_medida">
                    <label for="nombre_corto">Nombre Corto</label>
                    <input id="nombre_corto" class="form-control" type="text" name="nombre_corto" placeholder="Nombre Corto de la Medida" required>
                </div>

                
                <button class="btn btn-primary" type="button" onclick="registrarMedida(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal -->


<?php include "Views/Templates/footer.php";?>