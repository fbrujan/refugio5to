<?php
class Cajas  extends Controller
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
        //print "<h2>Metodo Index del Controlador Home funcionando </h2>";
        $this->views->getView($this, "index");
       // print_r($this->model->getCaja());

    }

    public function listar()
    {
        $data = $this->model->listarCajas();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary"      type="button" onclick="btnEditarCaja('.$data[$i]['id'] .')"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger"     type="button" onclick="btnEliminarCaja('.$data[$i]['id'] .')"><i class="fas fa-trash-alt"></i></button>
                </div>';

            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';

                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success"  type="button" onclick="btnReingresarCaja('.$data[$i]['id'] .')"><i class="fas fa-check"></i></button>
                </div>';
            }
           
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $caracter = array("(", ")", "-", " "); // Se utiliza para eliminar los parentesis y guinones y espacios en blanco donde sea necesario
        $caja             = ucwords($_POST['caja']);
        $id_caja          = $_POST['id_caja'];
        $descripcion      = $_POST['descripcion'];
        
        if (empty($caja) ) {
            $this->msg = "Debe introducir un nombre para la caja";
        } else {
            if ($id_caja == "") {
                $data =  $this->model->registrarCaja($caja, $descripcion);

                if ($data == "OK") {
                    $this->msg = "OK";            
                } else if ($data == "Existe") {
                    $this->msg = "Err-CLI-00: Error al agregar, La caja ya existe";
                } else {
                    $this->msg = "Err-CLI-01:  No se pudo agregar la caja";
                }

            } else {
                // Editar el Caja;

                $id = $_POST['id_caja'];
                $data = $this->model->editarCaja($id, $caja, $descripcion );

                if ($data == "Duplicado") {
                    $this->msg = "Err-Edit-00: Error al Editar. la caja ya esta en uso.";
                }else if ($data == "Actualizado") {
                    $this->msg = "Actualizado";
                }else {
                    $this->msg = "Err-Edit-01: No se pudo editar la caja";
                }

            }
           

        }
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();

    }

    public function editar(int $id)
    {
        $data = $this->model->buscaIdCaja($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
       $data = $this->model->accionCaja($id, 0);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Del-00:  No se pudo Eliminar la caja";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
       $data = $this->model->accionCaja($id, 1);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Hab-00:  No se pudo Reingresar la caja";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    
}

?>

