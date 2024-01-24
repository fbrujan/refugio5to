<?php
class Cargos  extends Controller
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
       // print_r($this->model->getCargo());

    }

    public function listar()
    {
        $data = $this->model->listarCargos();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary"      type="button" onclick="btnEditarCargo('.$data[$i]['id_cargo'] .')"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger"     type="button" onclick="btnEliminarCargo('.$data[$i]['id_cargo'] .')"><i class="fas fa-trash-alt"></i></button>
                </div>';

            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';

                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success"  type="button" onclick="btnReingresarCargo('.$data[$i]['id_cargo'] .')"><i class="fas fa-check"></i></button>
                </div>';
            }
           
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $caracter = array("(", ")", "-", " "); // Se utiliza para eliminar los parentesis y guinones y espacios en blanco donde sea necesario
        $cargo             = ucwords($_POST['cargo']);
        $id_cargo         = $_POST['id_cargo'];
        
        if (empty($cargo) ) {
            $this->msg = "Debe introducir un nombre para la cargo";
        } else {
            if ($id_cargo == "") {
                $data =  $this->model->registrarCargo($cargo);

                if ($data == "OK") {
                    $this->msg = "OK";            
                } else if ($data == "Existe") {
                    $this->msg = "Err-CLI-00: Error al agregar, Cargo ya existe";
                } else {
                    $this->msg = "Err-CLI-01:  No se pudo agregar cargo";
                }

            } else {
                // Editar el cargo;

                $id = $_POST['id_cargo'];
                $data = $this->model->editarCargo($id, $cargo);

                if ($data == "Duplicado") {
                    $this->msg = "Err-Edit-00: Error al Editar. Cargo ya esta en uso.";
                }else if ($data == "Actualizado") {
                    $this->msg = "Actualizado";
                }else {
                    $this->msg = "Err-Edit-01: No se pudo editar cargo";
                }

            }
           

        }
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();

    }

    public function editar(int $id)
    {
        $data = $this->model->buscaIdCargo($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
       $data = $this->model->accionCargo($id, 0);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Del-00:  No se pudo Eliminar cargo";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
       $data = $this->model->accionCargo($id, 1);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Hab-00:  No se pudo Reingresar cargo";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    
}

?>

