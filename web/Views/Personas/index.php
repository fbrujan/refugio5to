<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Personas</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmPersona();"><i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblPersonas" name="tblPersonas">
    <thead class="thead-dark">
        <tr>
            <th>ID Persona</th>
            <th>Nombre</th>
            <th>telefono</th>
            <th>Apodo</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Inicio del Modal -->
<div id="nueva_persona" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="personaModal">Nueva Persona</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post" id="frmPersona">

               <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="tipo_documento">Tipo Documento</label>
                            <select id="tipo_documento" class="form-control" name="tipo_documento">
                                <option value="1" selected >Cédula</option>
                                <option value="2">Pasaporte</option>
                                <option value="3">RNC</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="nro_documento">Nro Documento Identidad</label>
                            <input id="id_persona" type="hidden" name="id_persona">
                            <input id="nro_documento" class="form-control" type="text" name="nro_documento" placeholder="Número Doc. Identidad">
                        </div>
                    </div>
                </div>  
                
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Introduzca el Nombre" required>
                        </div>
                    </div>
                    
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input id="apellidos" class="form-control" type="text" name="apellidos" placeholder="Introduzca los Apellidos" required>
                        </div>
                    </div>
                       
                </div>


                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Número de Teléfono">
                        </div>
                    </div>
                    
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="fechaNacimiento">Fecha Nacimiento</label>
                            <input id="fechaNacimiento" class="form-control" type="date" name="fechaNacimiento">
                        </div>
                    </div>
                       
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="apodo">Apodo</label>
                            <input id="apodo" class="form-control" type="text" name="apodo" placeholder="Apodo">
                        </div>
                    </div>
                    
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="correo">Correo Electrónico</label>
                            <input id="correo" class="form-control" type="text" name="correo">
                        </div>
                    </div>
                       
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Dirección">
                    
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="provincia">Provincia</label>
                            <select id="provincia" class="form-control" name="provincia">
                                <?php foreach ($data['provincias'] as $provincia) {?>
                                    <option value='<?php echo $provincia['id_provincia'];?>'><?php echo $provincia['provincia'];?> </option>
                                <?php
                                    # code...
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pais">Pais</label>
                            <select id="pais" class="form-control" name="pais">
                                <?php foreach ($data['paises'] as $pais) {?>
                                    <option value='<?php echo $pais['id_pais'];?>'><?php echo $pais['pais'];?> </option>
                                <?php
                                    # code...
                                } ?>

                            </select>
                        </div>
                    </div>
                                        
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="estadoCivil">Estado Civil</label>
                            <select id="estadoCivil" class="form-control" name="estadoCivil">
                                <option value="1" selected >Soltero</option>
                                <option value="2">Casado</option>
                                <option value="3">Viudo</option>
                                <option value="4">Divorciado</option>
                                <option value="5">Unión Libre</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sociedad">Sociedad</label>
                            <select id="sociedad" class="form-control" name="sociedad">
                                <option value="1" selected >Damas</option>
                                <option value="2">Caballeros</option>
                                <option value="3">Jóvenes</option>
                                <option value="4">Juveniles</option>
                                <option value="5">Niños</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <select id="sexo" class="form-control" name="sexo">
                                <option value="1" selected >Varón</option>
                                <option value="2">Hembra</option>                                
                            </select>
                        </div>
                    </div>                    
                       
                </div>


                <div class="col-md-12">
                    <div class="form-group">    
                        <label>Foto</label>
                        <div class="card border-success">
                            <div class="card-body">
                                <label for="imgPersona" id="icon-image" class="btn btn-primary"><i class="fas fa-image"></i></label>
                                <span id="icon-cerrar"></span>
                                <input type="hidden" name="imgOriginal" id="imgOriginal">
                                <input type="hidden" name="imgDelete" id="imgDelete">
                                <input id="imgPersona" accept="image/*" class="d-none" type="file" name="imgPersona" onchange="preview(event);">
                                <img class="img-thumbnail" id="imgPersona-preview">
                            </div>
                        </div>
                    </div>
                </div>

                
                

                
                <button class="btn btn-primary" type="button" onclick="registrarPersona(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal -->


<?php include "Views/Templates/footer.php";?>