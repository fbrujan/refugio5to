<?php
class Circuitos  extends Controller
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
        $data['distritos'] = $this->model->getDistritos();
        $data['provincias'] = $this->model->getProvincias();
        $this->views->getView($this, "index", $data);
       // print_r($this->model->getCircuito());

    }

    public function listar()
    {
        $data = $this->model->listarCircuitos();
       
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarCircuito('.$data[$i]['id_circuito'] .')"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger"  type="button" onclick="btnEliminarCircuito('.$data[$i]['id_circuito'] .')"><i class="fas fa-trash-alt"></i></button>
                </div>';

            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success"  type="button" onclick="btnReingresarCircuito('.$data[$i]['id_circuito'] .')"><i class="fas fa-check"></i></button>
                </div>';
            }
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $circuito       = ucwords($_POST['circuito']);
        $id_distrito    = $_POST['id_distrito'];
        $id_provincia   = $_POST['id_provincia'];
        $id_circuito    = $_POST['id_circuito'];
        
        if (empty($circuito) ) {
            $this->msg = "Debe proveer un nombre para el circuito";
        } else {
            if ($_POST['id_circuito'] == "") {
                // Registrar el circuito;
                $data =  $this->model->registrarCircuito($circuito, $id_distrito, $id_provincia);

                if ($data == "OK") {
                    $this->msg = "OK";            
                } else if ($data == "Existe") {
                    $this->msg = "Err-Reg-00: Error al agregar, El circuito ya existe";
                } else {
                    $this->msg = "Err-Reg-01:  No se pudo agregar el circuito";
                }
                

            } else {
                // Editar el circuito;
                $id = $_POST['id_circuito'];
                $data = $this->model->editarCircuito($circuito, $id_distrito, $id_provincia, $id_circuito);

                if ($data == "Duplicado") {
                    $this->msg = "Err-Edit-00: Error al Editar. El circuito ya esta en uso.";
                }else if ($data == "Actualizado") {
                    $this->msg = "Actualizado";
                }else {
                    $this->msg = "Err-Edit-01: No se pudo editar al circuito";
                }

            }
           

        }
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();

    }

    public function editar(int $id)
    {
        $data = $this->model->buscaIdCircuito($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
       $data = $this->model->accionCircuito($id, 0);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Del-00:  No se pudo Eliminar el circuito";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
       $data = $this->model->accionCircuito($id, 1);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Hab-00:  No se pudo Reingresar circuito";
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

