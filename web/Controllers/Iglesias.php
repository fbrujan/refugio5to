<?php
class Iglesias  extends Controller
{
    private $msg;
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }
        parent::__construct();
    }
    
    public function index()
    {
        $data['distritos'] = $this->model->getDistritos();
        $data['circuitos'] = $this->model->getCircuitos();
        $this->views->getView($this, "index", $data);
       
    }

    public function listar()
    {
        $data = $this->model->listarIglesias();
       
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarIglesia('.$data[$i]['id_iglesia'] .')"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger"  type="button" onclick="btnEliminarIglesia('.$data[$i]['id_iglesia'] .')"><i class="fas fa-trash-alt"></i></button>
                </div>';

            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success"  type="button" onclick="btnReingresarIglesia('.$data[$i]['id_iglesia'] .')"><i class="fas fa-check"></i></button>
                </div>';
            }
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $iglesia        = ucwords($_POST['iglesia']);
        $id_distrito    = $_POST['id_distrito'];
        $id_circuito    = $_POST['id_circuito'];
        $id_iglesia     = $_POST['id_iglesia'];
        $direccion      = $_POST['direccion'];
        
        if (empty($iglesia) ) {
            $this->msg = "Debe proveer un nombre para el iglesia";
        } else {
            if ($_POST['id_iglesia'] == "") {
                // Registrar el iglesia;
                $data =  $this->model->registrarIglesia($iglesia, $id_distrito, $id_circuito, $direccion);

                if ($data == "OK") {
                    $this->msg = "OK";            
                } else if ($data == "Existe") {
                    $this->msg = "Err-Reg-00: Error al agregar, El iglesia ya existe";
                } else {
                    $this->msg = "Err-Reg-01:  No se pudo agregar el iglesia";
                }
                

            } else {
                // Editar el iglesia;
                $id = $_POST['id_iglesia'];
                $data = $this->model->editarIglesia($iglesia, $id_distrito, $id_circuito, $direccion, $id_iglesia);

                if ($data == "Duplicado") {
                    $this->msg = "Err-Edit-00: Error al Editar. El iglesia ya esta en uso.";
                }else if ($data == "Actualizado") {
                    $this->msg = "Actualizado";
                }else {
                    $this->msg = "Err-Edit-01: No se pudo editar al iglesia";
                }

            }
           

        }
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();

    }

    public function editar(int $id)
    {
        $data = $this->model->buscaIdIglesia($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
       $data = $this->model->accionIglesia($id, 0);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Del-00:  No se pudo Eliminar el iglesia";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
       $data = $this->model->accionIglesia($id, 1);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Hab-00:  No se pudo Reingresar iglesia";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function salir()
    {
        session_destroy();
        header("location: " . base_url);
    }
    
}

?>

