<?php
class ProductosModel extends Query
{

    // Definiendo los atributos de la clase
    private $producto;
    private $id_producto;
    private $estado;
    private $id_medida;
    private $id_categoria;
    private $stock;
    private $descripcion;
    private $precio_compra;
    private $precio_venta;
    private $codigo;
    private $imagen;

    public function __construct()
    {
        parent::__construct();
    }

    // Metodos SET y GET
        public function set($atributo, $valor)
        {
            $this->$atributo = $valor;
        }

        public function get($atributo)
        {
            return $this->$atributo;
        }
    
    public function listarProductos()
    {
        $sql = "SELECT p.*
                     , p.id_producto AS id
                     , m.medida
                     , c.categoria
                FROM productos p 
                     INNER JOIN medidas m ON p.id_medida = m.id_medida
                     INNER JOIN categorias c ON p.id_categoria = c.id_categoria 
                ";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function agregar()
    {
        $verificar = "SELECT * FROM productos WHERE codigo = '$this->codigo'";
        $existe = $this->select($verificar);
        if (!empty($existe)) {
            $res = "Existe";
        }else{
            $sql = "INSERT INTO productos ( codigo
                                          , producto
                                          , descripcion
                                          , precio_compra
                                          , precio_venta
                                          , id_medida
                                          , id_categoria
                                          , foto
                                          ) 
                    VALUES( ?,?,?,?,?,?,?,?)";

            $datos = array($this->codigo
                         , $this->producto
                         , $this->descripcion
                         , $this->precio_compra
                         , $this->precio_venta
                         , $this->id_medida
                         , $this->id_categoria
                         , $this->imagen
                        );

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "OK";
            }else{
                $res = "Error";
            }
        }            

        return $res;
    }
    
    public function modificar()
    {
        $verificar = "SELECT * 
                      FROM productos 
                      WHERE codigo = '$this->codigo' 
                        AND id_producto != '$this->id_producto'
                    ";

        $existe = $this->select($verificar);

        if (!empty($existe)) {
           $res = "Duplicado";
        } else {
            $sql = "UPDATE productos 
                    SET   codigo        = ?
                        , producto      = ?
                        , descripcion   = ? 
                        , precio_compra = ?
                        , precio_venta  = ?
                        , id_medida     = ?
                        , id_categoria  = ?
                        , foto          = ?
                    WHERE id_producto   = ?
                    ";

            $datos = array ($this->codigo 
                         , $this->producto
                         , $this->descripcion
                         , $this->precio_compra
                         , $this->precio_venta
                         , $this->id_medida
                         , $this->id_categoria
                         , $this->imagen
                         , $this->id_producto);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "Actualizado";
            }else{
                $res = "Error";
            }

        }

        return $res;
    }

    public function buscaIdProducto()
    {
        $sql    = "SELECT p.*, p.id_producto AS id 
                    FROM productos p 
                    WHERE id_producto = '$this->id_producto'
                ";
        $data   = $this->select($sql);
        return $data;
    }

    public function accionProducto()
    {
        $sql    = "UPDATE productos SET estado = ?  WHERE id_producto = ?";
        $datos  = array($this->estado, $this->id_producto);
        $data   = $this->save($sql, $datos);

        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function getMedidas()
    {
        $sql    = "SELECT m.*, m.id_medida AS id FROM medidas m WHERE estado = 1";
        $data   = $this->selectAll($sql);
        return $data;
    }

        public function getCategorias()
    {
        $sql    = "SELECT c.*, c.id_categoria AS id FROM categorias c WHERE estado = 1";
        $data   = $this->selectAll($sql);
        return $data;
    }

}
?>