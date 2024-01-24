<?php
class Finanzas  extends Controller
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
        $this->views->getView($this, "index",$data);

    }

    public function listar()
    {
        //$data = $this->model->listarFinanzas();
        //$data = $this->model->resumenFinanzas();
        
        $data = $this->model->listadoPersonas();
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['acciones'] = '
                <div>
                    <button class="btn btn-success"  type="button" onclick="regTrasaccion('.$data[$i]['id_persona']. ',\'' . $data[$i]['persona'] .'\')"><i class="fas fa-plus"></i></button>
                </div>';
            
        }
        
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function resumenFinanzas()
    {
        $data = $this->model->resumenFinanzas();
        print_r($data);
    }

    public function registrar()
    {
        $fecha          = $_POST['fecha'];
        $id_persona     = $_POST['idPersonaFinan'];
        $id_distrito    = $_POST['idDistritoFinan'];
        $id_circuito    = $_POST['idCircuitoFinan'];
        $id_iglesia     = $_POST['idIglesiaFinan'];
        $id_tipo_trans  = $_POST['idTipoTrans'];
        $id_concepto    = $_POST['idConcepto'];
        $monto          = $_POST['montoFinan'];
        $comentario     = $_POST['comentarioFinan'];
        
        $caracter = array("(", ")", "-", " "); // Se utiliza para eliminar los parentesis y guinones y espacios en blanco donde sea necesario
        
        if (empty($monto) ) {
            $this->msg = "Debe monto";
        } else {        
            $data =  $this->model->registrarTransaccion(
                     $id_tipo_trans, $id_concepto, $id_persona,
                     $id_distrito, $id_circuito, $id_iglesia,
                     $fecha, $monto, $comentario );

            if ($data == "OK") {
                $this->msg = "OK";            
            } else if ($data == "Existe") {
                $this->msg = "Err-FIN-00: Error al agregar, La finanza ya existe";
            } else {
                $this->msg = "Err-FIN-01:  No se pudo agregar la finanza";
            }


        }
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();

    }

    public function editar(int $id)
    {
        $data = $this->model->buscaIdFinanza($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
       $data = $this->model->accionFinanza($id, 0);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Del-00:  No se pudo Eliminar la finanza";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
       $data = $this->model->accionFinanza($id, 1);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Hab-00:  No se pudo Reingresar la finanza";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    
}

?>

