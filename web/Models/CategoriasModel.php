<?php
class CategoriasModel extends Query
{
    private $categoria, $descripcion, $estado, $id_categoria;
    public function __construct()
    {
        parent::__construct();
        //echo "<h2> Modelo de Home </h2>";
    }

    public function listarCategorias()
    {
        $sql = "SELECT * FROM categorias";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarCategoria(string $categoria, string $descripcion)
    {
        $this->categoria        = $categoria;
        $this->descripcion      = $descripcion;
        
        $verificar = "SELECT * FROM categorias WHERE categoria = '$this->categoria'";
        $existe = $this->select($verificar);
        if (!empty($existe)) {
            $res = "Existe";
        }else{
            $sql = "INSERT INTO categorias (categoria, descripcion) VALUES( ?, ?)";
            $datos = array($this->categoria, $this->descripcion);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "OK";
            }else{
                $res = "Error";
            }
        }
            

        return $res;
    }

    public function buscaIdCategoria(int $id)
    {
        $this->id_categoria = $id;
        $sql = "SELECT * FROM categorias WHERE id_categoria = '$this->id_categoria'";
        $data = $this->select($sql);
        return $data;
    }

    public function editarCategoria(int $id, string $categoria, string $descripcion)
    {
        $this->categoria        = $categoria;
        $this->descripcion      = $descripcion;
        $this->id_categoria     = $id;

        $verificar = "SELECT * FROM categorias WHERE categoria = '$this->categoria' and id_categoria != '$this->id_categoria'";
        $existe = $this->select($verificar);

        if (!empty($existe)) {
           $res = "Duplicado";
        } else {
            $sql = "UPDATE categorias 
                    SET categoria        = ?,
                        descripcion      = ?                        
                    WHERE id_categoria    = ?";
            $datos = array($this->categoria, $this->descripcion, $this->id_categoria);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "Actualizado";
            }else{
                $res = "Error";
            }

        }

        return $res;
    }

    public function eliminarCategoria(int $id)
    {
        $this->id_categoria = $id;
        $sql = "UPDATE categorias SET estado = 0  WHERE id_categoria = ?";
        $datos = array($this->id_categoria);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function accionCategoria(int $id, int $estado)
    {
        $this->id_categoria   = $id;
        $this->estado       = $estado;
        $sql = "UPDATE categorias SET estado = ?  WHERE id_categoria = ?";
        $datos = array($this->estado, $this->id_categoria);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

}
?>