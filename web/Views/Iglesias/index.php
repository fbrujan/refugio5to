<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Iglesias</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmIglesia();"><i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblIglesias" name="tblIglesias">
    <thead class="thead-dark">
        <tr>
            <th>ID Iglesia</th>
            <th>Iglesia</th>
            <th>Distrito</th>
            <th>Circuito</th>
            <th>Dirección</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Inicio del Modal -->
<div id="nueva_iglesia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="iglesiaModal">Nueva Iglesia</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post" id="frmIglesia">
                

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
                            <label for="id_circuito">Circuito</label>
                            <select id="id_circuito" class="form-control" name="id_circuito">
                                <?php foreach ($data['circuitos'] as $row) { ?>
                                    <option value='<?php echo $row['id_circuito']; ?>'><?php echo $row['circuito'];?></option>
                                <?php
                                    }
                                ?>
                                
                            </select>
                        </div>
                        
                    </div>
                </div>

                <div class="form-group">
                    <label for="iglesia">Iglesia</label>
                    <input id="id_iglesia" type="hidden" name="id_iglesia">
                    <input id="iglesia" class="form-control" type="text" name="iglesia" placeholder="Nombre para el Iglesia">
                </div>

                <div class="form-group">
                    <label for="direccion">Direccióm</label>
                    <input id="id_direccion" type="hidden" name="id_direccion">
                    <input id="idireccion" class="form-control" type="text" name="direccion" placeholder="Direccion para el Iglesia">
                </div>

                

                <button class="btn btn-primary" type="button" onclick="registrarIglesia(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal -->


<?php include "Views/Templates/footer.php";?>