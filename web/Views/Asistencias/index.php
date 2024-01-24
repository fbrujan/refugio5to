<?php include "Views/Templates/header.php";?>
<script>
    var circuitos = <?php echo  json_encode($data['circuitos'], JSON_UNESCAPED_UNICODE);?>;
    var iglesias = <?php echo  json_encode($data['iglesias'], JSON_UNESCAPED_UNICODE);?>;
</script>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Asistencias</li>
</ol>
<form method="POST" id="frmSvcAsistencia">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="id_distrito">Distrito</label>
                <select id="id_distrito" class="form-control" name="id_distrito" onchange="cargarCircuitos(circuitos);">
                    <option value="">Seleccione un Distrito</option>
                    <?php foreach ($data['distritos'] as $row) {?>
                        <option value="<?php echo $row['id_distrito'];?>"><?php echo $row['distrito'];?></option>

                    <?php
                        # code...
                    } ?>
                    
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="id_circuito">Circuito o Zona</label>
                <select id="id_circuito" class="form-control" name="id_circuito" onchange="cargarIglesias(iglesias);">
                    <option value="">Seleccione el Circuito</option>
                    
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="id_iglesia">Iglesia</label>
                <select id="id_iglesia" class="form-control" name="id_iglesia">
                <option value="">Seleccione la Iglesia</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="id_servicio">Servicio</label>
                <select id="id_servicio" class="form-control" name="id_servicio">
                <option value="">Seleccione el Servicio</option>
                    <?php foreach ($data['servicios'] as $row) {?>
                        <option value="<?php echo $row['id_servicio'];?>"><?php echo $row['servicio'];?></option>

                    <?php
                        # code...
                    } ?>
                    
                </select>
            </div>
        </div>
    </div>
    
    
</form>
<button class="btn btn-primary mb-2" type="button" onclick="frmAsistencia();"><i class="fas fa-plus"></i></button>
<!-- Final del Formulario -->

<!-- Inicio de la tabla -->
<table class="table table-light" id="tblAsistencias" name="tblAsistencias">
    <thead class="thead-dark">
        <tr>
            <th>ID Persona</th>
            <th>Nombre</th>
            <th>Apodo</th>
            <th>Teléfono</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<!-- Final de la Tabla -->

<!-- Inicio del Modal -->
<div id="nueva_asistencia_persona" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="asistenciaModalP">Nueva Persona</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post" id="frmPersonaAsist">

               <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="hidden" name="id_persona" value="">
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
                            <input id="id_asistencia" type="hidden" name="id_asistencia">
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

                
                

                
                <button class="btn btn-primary" type="button" onclick="regPersona(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal -->

<!-- Inicio Modal Poner Presente -->
<div id="nueva_asistencia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="asistenciaModal">Registrar Asistencia</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post" id="frmRegAsistencia">

               <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="distritoAsist">Distrito</label>
                            <input id="distritoAsist" class="form-control" type="text" name="distritoAsist" placeholder="Distrito">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="circuitoAsist">Circuito</label>
                            <input id="circuitoAsist" class="form-control" type="text" name="circuitoAsist" placeholder="Circuito">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="iglesiaAsist">Iglesia</label>
                            <input id="iglesiaAsist" class="form-control" type="text" name="iglesiaAsist" placeholder="Iglesia">
                        </div>
                    </div>
                </div>  
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="servicioAsist">Servicio</label>
                            <input id="servicioAsist" class="form-control" type="text" name="servicioAsist" placeholder="Servicio" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="personaAsist">Nombre</label>
                            <input id="personaAsist" class="form-control" type="text" name="personaAsist" placeholder="Introduzca los Nombre" required>
                        </div>
                    </div>
                       
                </div>

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="idRangoMinAsist">Rango Ministerial</label>
                            <select id="idRangoMinAsist" class="form-control" name="idRangoMinAsist">
                                <option value="" selected>Seleccione una Tanda</option>
                                <option value="1">Creyente / Laico </option>
                                <option value="2">Laico Registrado</option>
                                <option value="3">Exhortador</option>
                                <option value="4">Evangelista</option>
                                <option value="5">Lic. Predicador</option>
                                <option value="6">Lic. Pastor</option>
                                <option value="7">Ministro Ordenado (Rev)</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input id="fecha" class="form-control" type="date" name="fecha" required>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tanda">Tanda</label>
                            <select id="tanda" class="form-control" name="tanda">
                                <option value="" selected>Seleccione una Tanda</option>
                                <option value="1">Mañana</option>
                                <option value="2">Tarde</option>
                                <option value="3">Noche</option>
                            </select>
                        </div>
                    </div>
                       
                </div>

                <input type="hidden" name="idCircuitoAsist" id="idCircuitoAsist" value="">
                <input type="hidden" name="idServicioAsist" id="idServicioAsist" value="">
                <input type="hidden" name="idDistritoAsist" id="idDistritoAsist" value="">
                <input type="hidden" name="idIglesiaAsist" id="idIglesiaAsist" value="">
                <input type="hidden" name="idPersonaAsist" id="idPersonaAsist" value="">

                <button class="btn btn-primary" type="button" onclick="ponerPresente(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Final Modal Poner Presente -->




<?php include "Views/Templates/footer.php";?>