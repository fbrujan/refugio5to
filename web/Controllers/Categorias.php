<?php
class Categorias  extends Controller
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
       // print_r($this->model->getCategoria());

    }

    public function listar()
    {
        $data = $this->model->listarCategorias();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary"      type="button" onclick="btnEditarCategoria('.$data[$i]['id_categoria'] .')"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger"     type="button" onclick="btnEliminarCategoria('.$data[$i]['id_categoria'] .')"><i class="fas fa-trash-alt"></i></button>
                </div>';

            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';

                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success"  type="button" onclick="btnReingresarCategoria('.$data[$i]['id_categoria'] .')"><i class="fas fa-check"></i></button>
                </div>';
            }
           
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $caracter = array("(", ")", "-", " "); // Se utiliza para eliminar los parentesis y guinones y espacios en blanco donde sea necesario
        $categoria             = ucwords($_POST['categoria']);
        $id_categoria         = $_POST['id_categoria'];
        $descripcion          = $_POST['descripcion'];
        
        if (empty($categoria) ) {
            $this->msg = "Debe introducir un nombre para la categoría";
        } else {
            if ($id_categoria == "") {
                $data =  $this->model->registrarCategoria($categoria, $descripcion);

                if ($data == "OK") {
                    $this->msg = "OK";            
                } else if ($data == "Existe") {
                    $this->msg = "Err-CLI-00: Error al agregar, La categoría ya existe";
                } else {
                    $this->msg = "Err-CLI-01:  No se pudo agregar la categoría";
                }

            } else {
                // Editar el categoria;

                $id = $_POST['id_categoria'];
                $data = $this->model->editarCategoria($id, $categoria, $descripcion );

                if ($data == "Duplicado") {
                    $this->msg = "Err-Edit-00: Error al Editar. la categoría ya esta en uso.";
                }else if ($data == "Actualizado") {
                    $this->msg = "Actualizado";
                }else {
                    $this->msg = "Err-Edit-01: No se pudo editar la categoría";
                }

            }
           

        }
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();

    }

    public function editar(int $id)
    {
        $data = $this->model->buscaIdCategoria($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
       $data = $this->model->accionCategoria($id, 0);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Del-00:  No se pudo Eliminar la categoría";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
       $data = $this->model->accionCategoria($id, 1);
        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Hab-00:  No se pudo Reingresar la categoría";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    
}

?>

