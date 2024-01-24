<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Servicios</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmServicio();"><i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblServicios" name="tblServicios">
    <thead class="thead-dark">
        <tr>
            <th>Servicio</th>
            <th>Fecha Inicio</th>
            <th>Costo</th>
            <th>Asistencia</th>
            <th>Descripción</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Inicio del Modal -->
<div id="nuevo_servicio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="servicioModal">Nuevo Servicio</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form id="frmServicio">                   

                <div class="row" >
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_tipo_servicio">Tipo de Servicio</label>
                            <select id="id_tipo_servicio" class="form-control" name="id_tipo_servicio">
                                <option value="">Seleccione un Tipo</option>
                                <?php foreach ($data['tipo_servicio'] as $row) { ?>
                                    <option value='<?php echo $row['id_tipo_servicio']; ?>'><?php echo $row['tipo_servicio'];?></option>
                                <?php
                                    }
                                ?>
                                
                            </select>
                        </div>
                    </div>                    
                </div>

                <div class="row" >
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha_inicio">Fecha Inicio</label>
                            <input id="fecha_inicio" class="form-control" type="date" name="fecha_inicio">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hora_inicio">Hora Inicio</label>
                            <input id="hora_inicio" class="form-control" type="time" name="hora_inicio">
                        </div>
                    </div>

                                        
                </div>
                <div class="row">
                    <div class="col-md-6">                        
                        <div class="form-group">
                            <label for="servicio">Servicio</label>
                            <input id="servicio" class="form-control" type="text" name="servicio" placeholder="Nombre del Servicio" required>
                            <input id="id_servicio" type="hidden" name="id_servicio" value="">
                        </div>                        
                    </div>

                    <div class="col-md-6">                        
                        <div class="form-group">
                            <label for="costo">Costo</label>
                            <input id="costo" class="form-control" type="text" name="costo" placeholder="Costo Servicio">
                        </div>                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="descripcion" ">Descripción</label>
                        <input id="descripcion" class="form-control type="text" name="descripcion" placeholder="Breve Descripción">                            
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input id="requiere_registro" class="form-check-input" type="checkbox" name="requiere_registro" value="1">
                            <label for="requiere_registro" class="form-check-label">Requiere Registro</label>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary" type="button" onclick="registrarServicio(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal -->


<?php include "Views/Templates/footer.php";?>