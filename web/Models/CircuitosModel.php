<?php
class CircuitosModel extends Query
{
    private $circuito, $id_provincia, $id_distrito, $id_circuito, $estado;
    public function __construct()
    {
        parent::__construct();
        //echo "<h2> Modelo de Home </h2>";
    }

    public function getProvincias()
    {
        $sql = "SELECT * 
                FROM provincias 
                WHERE estado = 1
                ORDER BY provincia";
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

    public function listarCircuitos()
    {
        $sql = "SELECT c.*, d.distrito, p.provincia
                FROM circuitos c 
                    INNER JOIN distritos d ON c.id_distrito = d.id_distrito
                    INNER JOIN provincias p ON c.id_provincia = p.id_provincia
                ORDER BY circuito ASC";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarCircuito(string $circuito, int $id_distrito, int $id_provincia)
    {
        $this->circuito     = $circuito;
        $this->id_distrito  = $id_distrito;
        $this->id_provincia = $id_provincia;
        
        $verificar = "SELECT * 
                      FROM circuitos 
                      WHERE circuito    = '$this->circuito'
                      AND id_provincia  = '$this->id_provincia'";

        $existe = $this->select($verificar);
        if (!empty($existe)) {
            $res = "Existe";
        }else{
            $sql = "INSERT INTO circuitos (circuito, id_distrito, id_provincia) 
                    VALUES( ?,?,? )";
            $datos = array($this->circuito, $this->id_distrito, $this->id_provincia);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "OK";
            }else{
                $res = "Error";
            }
        }
            

        return $res;
    }

    public function buscaIdCircuito(int $id)
    {
        $this->id_circuito = $id;
        $sql = "SELECT c.*, d.distrito, p.provincia
        FROM circuitos c 
            INNER JOIN distritos d ON c.id_distrito = d.id_distrito
            INNER JOIN provincias p ON c.id_provincia = p.id_provincia
        WHERE id_circuito = '$this->id_circuito'";
        $data = $this->select($sql);
        return $data;
    }

    public function editarCircuito(string $circuito, int $id_distrito, int $id_provincia, int $id_circuito)
    {
        $this->id_distrito   = $id_distrito;
        $this->circuito      = $circuito;
        $this->id_circuito   = $id_circuito;
        $this->id_provincia  = $id_provincia;

        $verificar = "SELECT * 
                      FROM circuitos 
                      WHERE circuito = '$this->circuito' 
                      AND id_provincia = '$this->id_provincia'
                      AND id_circuito!= '$this->id_circuito'";
        $existe = $this->select($verificar);

        if (!empty($existe)) {
           $res = "Duplicado";
        } else {
            $sql = "UPDATE circuitos 
                    SET circuito = ?, id_distrito = ?, id_provincia = ? 
                    WHERE id_circuito = ?";
            $datos = array ($this->circuito, $this->id_distrito, $this->id_provincia, $this->id_circuito);
            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "Actualizado";
            }else{
                $res = "Error";
            }

        }

        return $res;
    }

    public function eliminarCircuito(int $id)
    {
        $this->id_circuito = $id;
        $sql = "UPDATE circuitos 
                SET estado = 0  
                WHERE id_circuito = ?";
        $datos = array($this->id_circuito);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function accionCircuito(int $id, int $estado)
    {
        $this->id_circuito   = $id;
        $this->estado       = $estado;
        $sql = "UPDATE circuitos 
                SET estado = ?  
                WHERE id_circuito = ?";
        $datos = array($this->estado, $this->id_circuito);
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