<?php include "Views/Templates/header.php";?>
<script>
    var circuitos = <?php echo  json_encode($data['circuitos'], JSON_UNESCAPED_UNICODE);?>;
    var iglesias = <?php echo  json_encode($data['iglesias'], JSON_UNESCAPED_UNICODE);?>;
</script>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Finanzas</li>
</ol>
<form method="POST" id="frmSvcFinanza">
    <div class="row">

        <div class="col-md-4">
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

        <div class="col-md-4">
            <div class="form-group">
                <label for="id_circuito">Circuito o Zona</label>
                <select id="id_circuito" class="form-control" name="id_circuito" onchange="cargarIglesias(iglesias);">
                    <option value="">Seleccione el Circuito</option>
                    
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="id_iglesia">Iglesia</label>
                <select id="id_iglesia" class="form-control" name="id_iglesia">
                <option value="">Seleccione la Iglesia</option>
                </select>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="inFecha">Fecha</label>
                <input type="date" id="inFecha" name="inFecha">
            </div>
        </div>
    </div>
    
    
</form>
<button class="btn btn-primary mb-2" type="button" onclick="frmFinanza();"><i class="fas fa-plus"></i></button>
<!-- Final del Formulario -->

<!-- Inicio de la tabla -->
<table class="table table-light" id="tblFinanzas" name="tblFinanzas">
    <thead class="thead-dark">
        <tr>
            <th>ID Persona</th>
            <th>Nombre</th>
            <th>Apodo</th>
            <th>Teléfono</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<!-- Final de la Tabla -->


<!-- Inicio Modal Nueva Transaccion -->
<div id="nueva_finanza" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="finanzaModal">Nueva Transacción</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post" id="frmRegFinanza">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="personaFinan">Nombre</label>
                            <input id="personaFinan" class="form-control" type="text" name="personaFinan" placeholder="Introduzca los Nombre" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="iglesiaFinan">Iglesia</label>
                            <input id="iglesiaFinan" class="form-control" type="text" name="iglesiaFinan" placeholder="Iglesia">
                        </div>
                    </div>
                </div>

               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="distritoFinan">Distrito</label>
                            <input id="distritoFinan" class="form-control" type="text" name="distritoFinan" placeholder="Distrito">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="circuitoFinan">Circuito</label>
                            <input id="circuitoFinan" class="form-control" type="text" name="circuitoFinan" placeholder="Circuito">
                        </div>
                    </div>

                </div>  
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="montoFinan">Monto</label>
                            <input id="montoFinan" class="form-control" type="number" name="montoFinan" placeholder="Monto" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="comentarioFinan">Comentario</label>
                            <input id="comentarioFinan" class="form-control" type="text" name="comentarioFinan" placeholder="Introduzca un comentario" required>
                        </div>
                    </div>
                       
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="idTipoTrans">Transaccion</label>
                            <select id="idTipoTrans" class="form-control" name="idTipoTrans">
                                <option value="" selected>Tipo</option>
                                <option value="1">Entrada </option>
                                <option value="2">Salida</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="idConcepto">Concepto</label>
                            <select id="idConcepto" class="form-control" name="idConcepto">
                                <option value="" selected>Concepto</option>
                                <option value="1">Diezmo</option>
                                <option value="2">Ofrenda</option>
                                <option value="3">Donativo</option>
                                <option value="4">Profondo</option>
                                <option value="10">Cuota Sociedad</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input id="fecha" class="form-control" type="date" name="fecha" required>
                        </div>
                    </div>
                       
                </div>

                <input type="hidden" name="idCircuitoFinan" id="idCircuitoFinan" value="">
                <input type="hidden" name="idServicioFinan" id="idServicioFinan" value="">
                <input type="hidden" name="idDistritoFinan" id="idDistritoFinan" value="">
                <input type="hidden" name="idIglesiaFinan" id="idIglesiaFinan" value="">
                <input type="hidden" name="idPersonaFinan" id="idPersonaFinan" value="">

                <button class="btn btn-primary" type="button" onclick="nuevaTransaccion(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Final Modal Poner Presente -->




<?php include "Views/Templates/footer.php";?>