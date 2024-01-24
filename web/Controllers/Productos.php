<?php
class Productos  extends Controller
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
       $data['medidas']     = $this->model->getMedidas();
       $data['categorias']  = $this->model->getCategorias();
       $this->views->getView($this, "index", $data);
       // print_r($this->model->getProducto());

    }

    public function listar()
    {
        $data = $this->model->listarProductos();
       
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['imagen'] = '<img class="img-thumbnail" src="' . base_url . 'Assets/img/productos/' . $data[$i]['foto'] .'">';
            
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarProducto('.$data[$i]['id'] .')"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger"  type="button" onclick="btnEliminarProducto('.$data[$i]['id'] .')"><i class="fas fa-trash-alt"></i></button>
                </div>';

            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success"  type="button" onclick="btnReingresarProducto('.$data[$i]['id'] .')"><i class="fas fa-check"></i></button>
                </div>';
            }
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $codigo         = trim(strtolower($_POST['codigo']));
        $producto       = trim(ucwords($_POST['producto']));
        $descripcion    = trim(ucwords($_POST['descripcion']));
        $precio_compra  = $_POST['precio_compra'];
        $precio_venta   = $_POST['precio_venta'];
        $id_medida      = $_POST['medida'];
        $id_categoria   = $_POST['categoria'];
        $id_producto    = $_POST['id_producto'];
        $img            = $_FILES['imagen'];
        $imgName        = $img['name'];
        $imgTmpName     = $img['tmp_name'];
        $carpetaImagen  = "Assets/img/productos/";
        
        
        // Validando la extension de los archivos de imagen
        if ($img['type'] == 'image/jpeg'){
            $ext = '.jpg';
        } else if ($img['type'] == 'image/png'){
            $ext = '.png';
        }else if ($img['type'] == 'image/bmp'){
            $ext = '.bmp';
        }else{
            $ext='';
        }

        // Creando el nombre de imagen a guardar
        if (empty($imgName)){
            $imgName ="default_producto.jpg";
        }else{
            $imgName = $codigo . $ext;
        }
        $imgDestino     = $carpetaImagen . $imgName;
        
        if (empty($producto) || empty($codigo) || empty($precio_compra) || empty($precio_venta)) {
            $this->msg = "Todos los campos son obligatorios";
        } else {
            $this->model->set("producto", $producto);
            $this->model->set("descripcion", $descripcion);
            $this->model->set("id_medida", $id_medida);
            $this->model->set("id_categoria", $id_categoria);
            $this->model->set("precio_venta", $precio_venta);
            $this->model->set("precio_compra", $precio_compra);
            $this->model->set("codigo", $codigo);
            $this->model->set("imagen", $imgName);



            if ($id_producto == "") {  
                // Agregar el Producto nuevo              
                $data =  $this->model->agregar();

                if ($data == "OK") {
                    if ($imgName !="default_producto.jpg") {
                        move_uploaded_file($imgTmpName, $imgDestino); 
                    }

                    $this->msg = "OK";                     
                              
                } else if ($data == "Existe") {
                    $this->msg = "Err-Reg-00: Error al agregar, El producto ya existe";
                } else {
                    $this->msg = "Err-Reg-01:  No se pudo agregar el producto";
                }

            } else {
                // Editar el producto;
                $imagenOriginal = $_POST['imagenOriginal'];
                $imagenDelete   = $_POST['imagenDelete'];

                if ($imagenOriginal != $imagenDelete) {
                    if ($imagenOriginal !="default_producto.jpg") {
                        if (file_exists($carpetaImagen . $imagenOriginal)) {
                            unlink($carpetaImagen . $imagenOriginal);
                        }                         
                    }
                    
                    move_uploaded_file($imgTmpName, $imgDestino);
                }

                $this->model->set("id_producto", $id_producto);
                $data = $this->model->modificar();

                if ($data == "Duplicado") {
                    $this->msg = "Err-Edit-00: Error al Editar. El producto ya esta en uso.";
                }else if ($data == "Actualizado") {
                    $this->msg = "Actualizado";
                }else {
                    $this->msg = "Err-Edit-01: No se pudo editar al producto";
                }

            }
           

        }
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();

    }

    public function editar(int $id)
    {
        $this->model->set("id_producto", $id);

        $data = $this->model->buscaIdProducto();
        
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
        $this->model->set("estado", 0);
        $this->model->set("id_producto", $id);

       $data = $this->model->accionProducto();

        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Del-00:  No se pudo Eliminar el producto";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
        $this->model->set("estado", 1);
        $this->model->set("id_producto", $id);
        
       $data = $this->model->accionProducto();

        if ($data == "OK") {
            $this->msg = "OK";            
        } else {
            $this->msg = "Err-Hab-00:  No se pudo Reingresar el producto";
        }
        
        echo json_encode($this->msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    
}

?>

