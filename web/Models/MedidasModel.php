<?php
class MedidasModel extends Query
{
    private $medida, $nombre_corto, $estado, $id_medida;
    public function __construct()
    {
        parent::__construct();
        //echo "<h2> Modelo de Home </h2>";
    }

    public function listarMedidas()
    {
        $sql = "SELECT * FROM medidas";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarMedida(string $medida, string $nombre_corto)
    {
        $this->medida        = $medida;
        $this->nombre_corto      = $nombre_corto;
        
        $verificar = "SELECT * FROM medidas WHERE medida = '$this->medida'";
        $existe = $this->select($verificar);
        if (!empty($existe)) {
            $res = "Existe";
        }else{
            $sql = "INSERT INTO medidas (medida, nombre_corto) VALUES( ?, ?)";
            $datos = array($this->medida, $this->nombre_corto);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "OK";
            }else{
                $res = "Error";
            }
        }
            

        return $res;
    }

    public function buscaIdMedida(int $id)
    {
        $this->id_medida = $id;
        $sql = "SELECT * FROM medidas WHERE id_medida = '$this->id_medida'";
        $data = $this->select($sql);
        return $data;
    }

    public function editarMedida(int $id, string $medida, string $nombre_corto)
    {
        $this->medida        = $medida;
        $this->nombre_corto  = $nombre_corto;
        $this->id_medida     = $id;

        $verificar = "SELECT * FROM medidas WHERE medida = '$this->medida' and id_medida != '$this->id_medida'";
        $existe = $this->select($verificar);

        if (!empty($existe)) {
           $res = "Duplicado";
        } else {
            $sql = "UPDATE medidas 
                    SET medida        = ?,
                        nombre_corto      = ?                        
                    WHERE id_medida    = ?";
            $datos = array($this->medida, $this->nombre_corto, $this->id_medida);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "Actualizado";
            }else{
                $res = "Error";
            }

        }

        return $res;
    }

    public function eliminarMedida(int $id)
    {
        $this->id_medida = $id;
        $sql = "UPDATE medidas SET estado = 0  WHERE id_medida = ?";
        $datos = array($this->id_medida);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function accionMedida(int $id, int $estado)
    {
        $this->id_medida   = $id;
        $this->estado       = $estado;
        $sql = "UPDATE medidas SET estado = ?  WHERE id_medida = ?";
        $datos = array($this->estado, $this->id_medida);
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