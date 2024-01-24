<?php
class IglesiasModel extends Query
{
    private $iglesia, $id_circuito, $id_distrito, $id_iglesia, $estado, $direccion;
    public function __construct()
    {
        parent::__construct();
        //echo "<h2> Modelo de Home </h2>";
    }

    public function getCircuitos()
    {
        $sql = "SELECT * 
                FROM circuitos 
                WHERE estado = 1
                ORDER BY circuito";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getDistritos()
    {
        $sql = "SELECT * 
                FROM distritos 
                WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function listarIglesias()
    {
        $sql = "SELECT i.*, d.distrito, c.circuito
                FROM iglesias i 
                    INNER JOIN distritos d ON i.id_distrito = d.id_distrito
                    INNER JOIN circuitos c ON c.id_circuito = i.id_circuito
                ORDER BY iglesia ASC";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarIglesia(string $iglesia, int $id_distrito, int $id_circuito, string $direccion)
    {
        $this->iglesia      = $iglesia;
        $this->id_distrito  = $id_distrito;
        $this->id_circuito  = $id_circuito;
        $this->direccion    = $direccion;
        
        $verificar = "SELECT * 
                      FROM iglesias 
                      WHERE iglesia    = '$this->iglesia'
                      AND id_distrito = '$this->id_distrito'
                      AND id_circuito = '$this->id_circuito'";

        $existe = $this->select($verificar);
        if (!empty($existe)) {
            $res = "Existe";
        }else{
            $sql = "INSERT INTO iglesias (iglesia, id_distrito, id_circuito, direccion) 
                    VALUES( ?,?,?,?)";
            $datos = array($this->iglesia, $this->id_distrito, $this->id_circuito, $this->direccion);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "OK";
            }else{
                $res = "Error";
            }
        }
            

        return $res;
    }

    public function buscaIdIglesia(int $id)
    {
        $this->id_iglesia = $id;
        $sql = "SELECT i.*, d.distrito, c.circuito
                FROM iglesias i 
                    INNER JOIN distritos d ON i.id_distrito = d.id_distrito
                    INNER JOIN circuitos c ON c.id_circuito = i.id_circuito
                WHERE id_iglesia = '$this->id_iglesia'";
        $data = $this->select($sql);
        return $data;
    }

    public function editarIglesia(string $iglesia, int $id_distrito, int $id_circuito, string $direccion, int $id_iglesia)
    {
        $this->id_distrito   = $id_distrito;
        $this->iglesia      = $iglesia;
        $this->id_iglesia   = $id_iglesia;
        $this->id_circuito  = $id_circuito;
        $this->direccion    = $direccion;

        $verificar = "SELECT * 
                      FROM iglesias 
                      WHERE iglesia    = '$this->iglesia'
                      AND id_distrito = '$this->id_distrito'
                      AND id_circuito = '$this->id_circuito'
                      AND id_iglesia = $this->id_iglesia";
        $existe = $this->select($verificar);

        if (!empty($existe)) {
           $res = "Duplicado";
        } else {
            $sql = "UPDATE iglesias 
                    SET iglesia = ?, id_distrito = ?, id_circuito = ?, direccion = ?
                    WHERE id_iglesia = ?";
            $datos = array ($this->iglesia, $this->id_distrito, $this->id_circuito, $this->direccion, $this->id_iglesia);
            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "Actualizado";
            }else{
                $res = "Error";
            }

        }

        return $res;
    }

    public function eliminarIglesia(int $id)
    {
        $this->id_iglesia = $id;
        $sql = "UPDATE iglesias 
                SET estado = 0  
                WHERE id_iglesia = ?";
        $datos = array($this->id_iglesia);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function accionIglesia(int $id, int $estado)
    {
        $this->id_iglesia   = $id;
        $this->estado       = $estado;
        $sql = "UPDATE iglesias 
                SET estado = ?  
                WHERE id_iglesia = ?";
        $datos = array($this->estado, $this->id_iglesia);
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