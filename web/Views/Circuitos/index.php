<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Circuitos</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmCircuito();"><i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblCircuitos" name="tblCircuitos">
    <thead class="thead-dark">
        <tr>
            <th>ID Circuito</th>
            <th>Distrito</th>
            <th>Provincia</th>
            <th>Circuito</th> <!-- Pendiente modificar -->
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Inicio del Modal -->
<div id="nuevo_circuito" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="circuitoModal">Nuevo Circuito</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post" id="frmCircuito">
                <div class="form-group">
                    <label for="circuito">Circuito</label>
                    <input id="id_circuito" type="hidden" name="id_circuito">
                    <input id="circuito" class="form-control" type="text" name="circuito" placeholder="Nombre para el Circuito">
                </div>

                <div class="row" >
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_distrito">Distrito</label>
                            <select id="id_distrito" class="form-control" name="id_distrito">
                                <?php foreach ($data['distritos'] as $row) { ?>
                                    <option value='<?php echo $row['id_distrito']; ?>'><?php echo $row['distrito'];?></option>
                                <?php
                                    }
                                ?>
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_provincia">Provincia</label>
                            <select id="id_provincia" class="form-control" name="id_provincia">
                                <?php foreach ($data['provincias'] as $row) { ?>
                                    <option value='<?php echo $row['id_provincia']; ?>'><?php echo $row['provincia'];?></option>
                                <?php
                                    }
                                ?>
                                
                            </select>
                        </div>
                        
                    </div>
                </div>

                

                <button class="btn btn-primary" type="button" onclick="registrarCircuito(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal -->


<?php include "Views/Templates/footer.php";?>