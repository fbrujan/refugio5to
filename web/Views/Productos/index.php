<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Productos</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmProducto();"><i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblProductos" name="tblProductos">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Código</th>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Inicio del Modal -->
<div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="productoModal">Nuevo Producto</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post" id="frmProducto">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="codigo">Código Producto</label>
                            <input id="id_producto" type="hidden" name="id_producto">
                            <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código Producto">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="producto">Nombre Producto</label>
                            <input id="producto" class="form-control" type="text" name="producto" placeholder="Nombre del Producto">
                        </div>                        
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripción Producto</label>
                    <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Breve descripción del Producto">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="precio_compra">Precio Compra</label>
                            <input id="precio_compra" class="form-control" type="text" name="precio_compra" placeholder="Precio Compra">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="precio_venta">Precio Venta</label>
                            <input id="precio_venta" class="form-control" type="text" name="precio_venta" placeholder="Precio venta">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="medida">Medida</label>
                            <select id="medida" class="form-control" name="medida">
                                <?php foreach ($data['medidas'] as $row) { ?>
                                    <option value='<?php echo $row['id']; ?>'><?php echo $row['medida'];?></option>
                                <?php
                                    }
                                ?>
                                
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="categoria">Categoría</label>
                            <select id="categoria" class="form-control" name="categoria">
                                <?php foreach ($data['categorias'] as $row) { ?>
                                    <option value='<?php echo $row['id']; ?>'><?php echo $row['categoria'];?></option>
                                <?php
                                    }
                                ?>
                                
                            </select>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">    
                        <label>Foto</label>
                        <div class="card border-success">
                            <div class="card-body">
                                <label for="imagen" id="icon-image" class="btn btn-primary"><i class="fas fa-image"></i></label>
                                <span id="icon-cerrar"></span>
                                <input type="hidden" name="imagenOriginal" id="imagenOriginal">
                                <input type="hidden" name="imagenDelete" id="imagenDelete">
                                <input id="imagen" accept="image/*" class="d-none" type="file" name="imagen" onchange="preview(event);">
                                <img class="img-thumbnail" id="img-preview">
                            </div>
                        </div>
                    </div>
                </div>

                        

                <button class="btn btn-primary" type="button" onclick="registrarProducto(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal -->


<?php include "Views/Templates/footer.php";?>