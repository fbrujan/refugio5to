<?php
class Personas  extends Controller
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
        $data['distritos']  = $this->model->getDistritos();
        $data['provincias'] = $this->model->getProvincias();
        $data['paises']     = $this->model->getPaises();
        $data['tipoPersona'] = $this->model->getTipoPersona();

        $this->views->getView($this, "index", $data);
       // print_r($this->model->getPersona());

    }

    public function listar()
    {
        $data = $this->model->listarPersonas();
       
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarPersona('.$data[$i]['id_persona'] .')"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger"  type="button" onclick="btnEliminarPersona('.$data[$i]['id_persona'] .')"><i class="fas fa-trash-alt"></i></button>
                </div>';

            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success"  type="button" onclick="btnReingresarPersona('.$data[$i]['id_persona'] .')"><i class="fas fa-check"></i></button>
                </div>';
            }
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $caracter = array("(", ")", "-", " "); // Se utiliza para eliminar los parentesis y guinones y espacios en blanco donde sea necesario
        $nombre             = ucwords($_POST['nombre']);
        $apellidos          = ucwords($_POST['apellidos']);
        $telefono           = str_replace($caracter, "", $_POST['telefono']);
        $nro_documento      = str_replace($caracter, "", $_POST['nro_documento']);
        $correo             = strtolower($_POST['correo']);
        $pais               = $_POST['pais'];
        $direccion          = $_POST['direccion'];
        $tipo_documento     = $_POST['tipo_documento'];
        $provincia          = $_POST['provincia'];
        $apodo              = $_POST['apodo'];
        $id_persona         = $_POST['id_persona'];
        $fchNacimiento      = $_POST['fechaNacimiento'];
        $estadoCivil        = $_POST['estadoCivil'];
        $sociedad           = $_POST['sociedad'];
        $sexo               = $_POST['sexo']; 
        
        if ($fchNacimiento == "") {
            $fchNacimiento = date('Y/m/d H:i:s', time());
        }
        
        if ($nombre == "" || $apellidos == "") {
            $this->msg = "Algún campo requerido esta vacio";
        } else {
            if ($id_persona == "" ) {
                // Registrar el persona;
                $data =  $this->model->registrarPersona($nombre, $apellidos, $telefono
                                                        , $correo, $pais, $direccion
                                                        , $tipo_documento, $nro_documento
                                                        , $provincia, $apodo, $fchNacimiento
                                                        , $estadoCivil, $sociedad, $sexo
                                                    );

                if ($data == "OK") {
                    $this->msg = "OK";            
                } else if ($data == "Existe") {
                    $this->msg = "Err-Reg-00: Error al agregar, Persona ya existe";
                } else {
                    $this->msg = "Err-Reg-01:  No se pudo agregar persona";
                }
                

            } else {
                // Editar el persona;
                $data = $this->model->editarPersona($nombre, $apellidos, $telefono
                                                    , $correo, $pais, $direccion
                                                    , $tipo_documento, $nro_documento
                                                    , $provincia, $apodo, $fchNacimiento
                                                    , $estadoCivil, $sociedad, $sexo
                                                    , $id_persona
                                                );

                if ($data == "Duplicado") {
                    $this->msg = "Err-Edit-00: Error al Editar. Persona ya esta en uso.";
                }else if ($data == "Actualizado") {
                    $this->msg = "Actualizado";
                }else {
                    $this->msg = "Err-Edit-01: No se pudo editar persona";
                }

            }
           

        }
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();

    }

    public function editar(int $id)
    {
        $data = $this->model->buscaIdPersona($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
       $data = $this->model->accionPersona($id, 0);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Del-00:  No se pudo Eliminar el persona";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
       $data = $this->model->accionPersona($id, 1);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Hab-00:  No se pudo Reingresar persona";
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

