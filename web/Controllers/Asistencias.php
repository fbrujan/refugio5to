<?php
class Asistencias  extends Controller
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
        $data['circuitos']  = $this->model->getCircuitos();
        $data['iglesias']   = $this->model->getIglesias();
        $data['servicios']  = $this->model->getServicios();
        $data['rangos']     = $this->model->getRangos();
        
        $this->views->getView($this, "index", $data);
       // print_r($this->model->getAsistencia());

    }

    public function listar()
    {
        $data = $this->model->listadoPersonas();
       
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['acciones'] = '
                <div>
                    <button class="btn btn-success"  type="button" onclick="regAsistencia('.$data[$i]['id_persona']. ',\'' . $data[$i]['persona'] .'\')"><i class="fas fa-check"></i></button>
                </div>';
            
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
        $id_asistencia         = $_POST['id_asistencia'];
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
            if ($id_asistencia == "" ) {
                // Registrar el asistencia;
                $data =  $this->model->registrarAsistencia($nombre, $apellidos, $telefono
                                                        , $correo, $pais, $direccion
                                                        , $tipo_documento, $nro_documento
                                                        , $provincia, $apodo, $fchNacimiento
                                                        , $estadoCivil, $sociedad, $sexo
                                                    );

                if ($data == "OK") {
                    $this->msg = "OK";            
                } else if ($data == "Existe") {
                    $this->msg = "Err-Reg-00: Error al agregar, Asistencia ya existe";
                } else {
                    $this->msg = "Err-Reg-01:  No se pudo agregar asistencia";
                }
                

            } else {
                // Editar el asistencia;
                $data = $this->model->editarAsistencia($nombre, $apellidos, $telefono
                                                    , $correo, $pais, $direccion
                                                    , $tipo_documento, $nro_documento
                                                    , $provincia, $apodo, $fchNacimiento
                                                    , $estadoCivil, $sociedad, $sexo
                                                    , $id_asistencia
                                                );

                if ($data == "Duplicado") {
                    $this->msg = "Err-Edit-00: Error al Editar. Asistencia ya esta en uso.";
                }else if ($data == "Actualizado") {
                    $this->msg = "Actualizado";
                }else {
                    $this->msg = "Err-Edit-01: No se pudo editar asistencia";
                }

            }
           

        }
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();

    }

    public function editar(int $id)
    {
        $data = $this->model->buscaIdAsistencia($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
       $data = $this->model->accionAsistencia($id, 0);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Del-00:  No se pudo Eliminar el asistencia";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
       $data = $this->model->accionAsistencia($id, 1);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Hab-00:  No se pudo Reingresar asistencia";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function salir()
    {
        session_destroy();
        header("location: " . base_url);
    }

    public function ponerPresente()
    {        
        $tanda              = $_POST['tanda'];
        $fecha              = $_POST['fecha'];
        $usuario            = $_SESSION['usuario'];
        $idPersonaAsist     = $_POST['idPersonaAsist'];
        $idCircuitoAsist    = $_POST['idCircuitoAsist'];
        $idServicioAsist    = $_POST['idServicioAsist'];
        $idDistritoAsist    = $_POST['idDistritoAsist'];
        $idIglesiaAsist     = $_POST['idIglesiaAsist'];
        $idRangoMinAsist    = $_POST['idRangoMinAsist'];
        
        if ($tanda == "") {
            $hora = date("H");
            if ($hora < 12) {
                $tanda = 1;
            }else if ($tanda < 18) {
                $tanda = 2;
            }else{ 
                $tanda = 3;
            }
        }

        if ($fecha == "") {
            $fecha = date("Y-m-d");
        }


        if ($idRangoMinAsist == "") {
            $idRangoMinAsist = 1;
        }

        
        $data =  $this->model->ponerPresente($idDistritoAsist, $idCircuitoAsist, 
                                            $idIglesiaAsist, $idServicioAsist, 
                                            $idPersonaAsist, $tanda, $fecha, $usuario,
                                            $idRangoMinAsist );

        if ($data == "OK") {
            $this->msg = "OK";            
        } else if($data == "Existe"){
            $this->msg = "Err-Asist-01: Esta presona Ya estaba Presente.. Probar con otro";
        }else {
            $this->msg = "Err-Asist-00: Error al colocar asistencia";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    
}

?>

