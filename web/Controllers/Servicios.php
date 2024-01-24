<?php
class Servicios  extends Controller
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
        $data['tipo_servicio'] = $this->model->getTipoServicio();
        $this->views->getView($this, "index",$data);

    }

    public function listar()
    {
        $data = $this->model->listarServicios();
        for ($i=0; $i < count($data); $i++) { 
            
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary"      type="button" onclick="btnEditarServicio('.$data[$i]['id_servicio'] .')"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger"     type="button" onclick="btnEliminarServicio('.$data[$i]['id_servicio'] .')"><i class="fas fa-trash-alt"></i></button>
                </div>';

        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die(); //*Viva12345 
    }

    public function registrar()
    {
        $caracter = array("(", ")", "-", " "); // Se utiliza para eliminar los parentesis y guinones y espacios en blanco donde sea necesario
        $id_tipo_servicio   = $_POST['id_tipo_servicio'];
        $fecha_inicio       = $_POST['fecha_inicio'];
        $hora_inicio        = '19:15';
        $servicio           = ucwords($_POST['servicio']);
        $id_servicio        = $_POST['id_servicio'];
        $costo              = 0;
        $descripcion        = $_POST['descripcion'];
        $requiere_registro  = 0;

        if(isset($_POST['requiere_registro'])){
            $requiere_registro = $_POST['requiere_registro'];
        }

        if(!empty($_POST['costo'])){
            $costo = $_POST['costo'];
        }

        if(!empty($_POST['hora_inicio'])){
            $hora_inicio = $_POST['hora_inicio'];
        }
        
        // Setear Valores en el Model
        $this->model->set('servicio', $servicio);
        $this->model->set('id_servicio', $id_servicio);
        $this->model->set('id_tipo_servicio', $id_tipo_servicio);
        $this->model->set('descripcion', $descripcion);
        $this->model->set('fecha_inicio', $fecha_inicio);
        $this->model->set('hora_inicio', $hora_inicio);
        // $this->model->set('fecha_fin', $fecha_fin);
        // $this->model->set('hora_fin', $hora_fin);
        $this->model->set('requiere_registro', $requiere_registro);
        $this->model->set('costo', $costo);
        
        if (empty($servicio) || empty($fecha_inicio)) {
            $this->msg = "Favor llenar los campos obligatorios";
        } else {
            if ($id_servicio == "") {
                $data =  $this->model->registrarServicio();

                if ($data == "OK") {
                    $this->msg = "OK";            
                } else if ($data == "Existe") {
                    $this->msg = "Err-CLI-00: Error al agregar, el servicio ya existe";
                } else {
                    $this->msg = "Err-CLI-01:  No se pudo agregar el servicio";
                }

            } else {
                // Editar el Servicio;
                $data = $this->model->editarServicio();
                
                if ($data == "Duplicado") {
                    $this->msg = "Err-Edit-00: Error al Editar. la servicio ya esta en uso.";
                }else if ($data == "Actualizado") {
                    $this->msg = "Actualizado";
                }else {
                    $this->msg = "Err-Edit-01: No se pudo editar la servicio";
                }

            }
           

        }
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();

    }

    public function editar(int $id_servicio)
    {
        $this->model->set('id_servicio', $id_servicio);
        $data = $this->model->buscaIdServicio();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id_servicio)
    {
        $this->model->set('id_servicio', $id_servicio);
        $this->model->set('estado', 0);
        
        $data = $this->model->accionServicio();
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Del-00:  No se pudo Eliminar la servicio";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id_servicio)
    {
        $this->model->set('id_servicio', $id_servicio);
        $this->model->set('estado', 1);
        
        $data = $this->model->accionServicio();
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Hab-00:  No se pudo Reingresar la servicio";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    
}

?>

