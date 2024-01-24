<?php
class Medidas  extends Controller
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
       // print_r($this->model->getMedida());

    }

    public function listar()
    {
        $data = $this->model->listarMedidas();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary"      type="button" onclick="btnEditarMedida('.$data[$i]['id_medida'] .')"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger"     type="button" onclick="btnEliminarMedida('.$data[$i]['id_medida'] .')"><i class="fas fa-trash-alt"></i></button>
                </div>';

            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';

                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success"  type="button" onclick="btnReingresarMedida('.$data[$i]['id_medida'] .')"><i class="fas fa-check"></i></button>
                </div>';
            }
           
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $caracter = array("(", ")", "-", " "); // Se utiliza para eliminar los parentesis y guinones y espacios en blanco donde sea necesario
        $medida             = ucwords($_POST['medida']);
        $id_medida         = $_POST['id_medida'];
        $nombre_corto          = $_POST['nombre_corto'];
        
        if (empty($medida) ) {
            $this->msg = "Debe introducir un nombre para la medida";
        } else {
            if ($id_medida == "") {
                $data =  $this->model->registrarMedida($medida, $nombre_corto);

                if ($data == "OK") {
                    $this->msg = "OK";            
                } else if ($data == "Existe") {
                    $this->msg = "Err-CLI-00: Error al agregar, La medida ya existe";
                } else {
                    $this->msg = "Err-CLI-01:  No se pudo agregar la medida";
                }

            } else {
                // Editar el medida;

                $id = $_POST['id_medida'];
                $data = $this->model->editarMedida($id, $medida, $nombre_corto );

                if ($data == "Duplicado") {
                    $this->msg = "Err-Edit-00: Error al Editar. la medida ya esta en uso.";
                }else if ($data == "Actualizado") {
                    $this->msg = "Actualizado";
                }else {
                    $this->msg = "Err-Edit-01: No se pudo editar la medida";
                }

            }
           

        }
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();

    }

    public function editar(int $id)
    {
        $data = $this->model->buscaIdMedida($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
       $data = $this->model->accionMedida($id, 0);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Del-00:  No se pudo Eliminar la medida";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
       $data = $this->model->accionMedida($id, 1);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Hab-00:  No se pudo Reingresar la medida";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    
}

?>

