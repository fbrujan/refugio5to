<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Finanzas</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmFinanza();"><i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblFinanzas" name="tblFinanzas">
    <thead class="thead-dark">
        <tr>
            <th>Distrito</th>
            <th>Circuito</th>
            <th>Iglesia</th>
            <th>Mes</th>
            <th>Monto</th>            
            <th>Concepto</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Inicio del Modal -->
<div id="nueva_finanza" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="finanzaModal">Nueva Finanza</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post" id="frmFinanza">                   

                <div class="form-group">
                    <label for="monto">Monto</label>
                    <input id="monto" class="form-control" type="text" name="monto" placeholder="Introduzca Monto" required>
                    <input id="id_transaccion" type="hidden" name="id_transaccion" value="">
                </div>
                <div class="form-group">
                    <label for="comentario">Comentario</label>
                    <input id="comentario" class="form-control" type="text" name="comentario" placeholder="Introduzca Monto" required>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input id="fecha" class="form-control" type="date" name="fecha">
                </div>
                <div class="form-group">
                    <label for="comentario">Comentario</label>
                    <input id="comentario" class="form-control" type="text" name="comentario" placeholder="Introduzca Monto" required>
                </div>

                <button class="btn btn-primary" type="button" onclick="registrarFinanza(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal -->


<?php include "Views/Templates/footer.php";?>