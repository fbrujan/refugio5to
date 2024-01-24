<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Clientes</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmCliente();"><i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblClientes" name="tblClientes">
    <thead class="thead-dark">
        <tr>
            <th>ID Cliente</th>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Dirección</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Inicio del Modal -->
<div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="clienteModal">Nuevo Cliente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post" id="frmCliente">

               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipo_documento">Tipo Documento</label>
                            <select id="tipo_documento" class="form-control" name="tipo_documento">
                                <option value="rnc">RNC</option>
                                <option value="cédula" selected>Cédula</option>
                                <option value="pasaporte">Pasaporte</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nro_documento">Nro Documento Identidad</label>
                            <input id="id_cliente" type="hidden" name="id_cliente" required>
                            <input id="nro_documento" class="form-control" type="text" name="nro_documento" placeholder="Número Doc. Identidad">
                        </div>
                    </div>
                </div>                     
                        

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Introduzca el Nombre" required>
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input id="apellidos" class="form-control" type="text" name="apellidos" placeholder="Introduzca los Apellidos" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Introduzca el Teléfono">
                </div>

                <div class="form-group">
                    <label for="correo">Correo Electrónico</label>
                    <input id="correo" class="form-control" type="email" name="correo" placeholder="Introduzca el Correo Electrónico">
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <textarea id="direccion" class="form-control" name="direccion" rows="3" placeholder="Dirección"></textarea>
                </div>

                
                <button class="btn btn-primary" type="button" onclick="registrarCliente(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal -->


<?php include "Views/Templates/footer.php";?>