<?php
class Clientes  extends Controller
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
       // print_r($this->model->getCliente());

    }

    public function listar()
    {
        $data = $this->model->listarClientes();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary"      type="button" onclick="btnEditarCliente('.$data[$i]['id_cliente'] .')"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger"     type="button" onclick="btnEliminarCliente('.$data[$i]['id_cliente'] .')"><i class="fas fa-trash-alt"></i></button>
                </div>';

            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';

                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success"  type="button" onclick="btnReingresarCliente('.$data[$i]['id_cliente'] .')"><i class="fas fa-check"></i></button>
                </div>';
            }
            $data[$i]['fullname'] = $data[$i]['nombre'] .' ' . $data[$i]['apellidos'];
           
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $caracter = array("(", ")", "-", " "); // Se utiliza para eliminar los parentesis y guinones y espacios en blanco donde sea necesario
        $nombre             = ucwords($_POST['nombre']);
        $apellidos          = ucwords($_POST['apellidos']);
        $correo             = strtolower($_POST['correo']);
        $telefono           = str_replace($caracter, "", $_POST['telefono']);
        $id_cliente         = $_POST['id_cliente'];
        $direccion          = $_POST['direccion'];
        $tipo_documento     = $_POST['tipo_documento'];
        $nro_documento      = str_replace($caracter, "", $_POST['nro_documento']);

        if (empty($apellidos) || empty($nombre) || empty($nro_documento)) {
            $this->msg = "Todos los campos son obligatorios";
        } else {
            if ($id_cliente == "") {
                $data =  $this->model->registrarCliente($nombre, $apellidos, $tipo_documento, $nro_documento, $telefono, $correo, $direccion);

                if ($data == "OK") {
                    $this->msg = "OK";            
                } else if ($data == "Existe") {
                    $this->msg = "Err-CLI-00: Error al agregar, El cliente ya existe";
                } else {
                    $this->msg = "Err-CLI-01:  No se pudo agregar el cliente";
                }

            } else {
                // Editar el cliente;

                $id = $_POST['id_cliente'];
                $data = $this->model->editarCliente($id, $nombre, $apellidos, $tipo_documento, $nro_documento, $telefono, $correo, $direccion );

                if ($data == "Duplicado") {
                    $this->msg = "Err-Edit-00: Error al Editar. El cliente ya esta en uso.";
                }else if ($data == "Actualizado") {
                    $this->msg = "Actualizado";
                }else {
                    $this->msg = "Err-Edit-01: No se pudo editar al cliente";
                }

            }
           

        }
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();

    }

    public function editar(int $id)
    {
        $data = $this->model->buscaIdCliente($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
       $data = $this->model->accionCliente($id, 0);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Del-00:  No se pudo Eliminar el cliente";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
       $data = $this->model->accionCliente($id, 1);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Hab-00:  No se pudo Reingresar el cliente";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    
}

?>

