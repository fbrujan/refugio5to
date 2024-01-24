<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Categorias</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmCategoria();"><i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblCategorias" name="tblCategorias">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Categoría</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Inicio del Modal -->
<div id="nueva_categoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="categoriaModal">Nuevo Categoria</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post" id="frmCategoria">                   

                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <input id="categoria" class="form-control" type="text" name="categoria" placeholder="Introduzca la Categoría" required>
                </div>

                <div class="form-group">
                    <input id="id_categoria" type="hidden" name="id_categoria">
                    <label for="descripcion">Descripción</label>
                    <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción de la Categoría" required>
                </div>

                
                <button class="btn btn-primary" type="button" onclick="registrarCategoria(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal -->


<?php include "Views/Templates/footer.php";?>