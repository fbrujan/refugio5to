<?php
class TandasModel extends Query
{
    private $tanda, $estado, $id_tanda;
    public function __construct()
    {
        parent::__construct();
        //echo "<h2> Modelo de Home </h2>";
    }

    public function listarTandas()
    {
        $sql = "SELECT * FROM tandas";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarTanda(string $tanda)
    {
        $this->tanda        = $tanda;
        
        $verificar = "SELECT * FROM tandas WHERE tanda = '$this->tanda'";
        $existe = $this->select($verificar);
        if (!empty($existe)) {
            $res = "Existe";
        }else{
            $sql = "INSERT INTO tandas (tanda) VALUES(  ?)";
            $datos = array($this->tanda);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "OK";
            }else{
                $res = "Error";
            }
        }
            

        return $res;
    }

    public function buscaIdTanda(int $id)
    {
        $this->id_tanda = $id;
        $sql = "SELECT * FROM tandas WHERE id_tanda = '$this->id_tanda'";
        $data = $this->select($sql);
        return $data;
    }

    public function editarTanda(int $id, string $tanda)
    {
        $this->tanda        = $tanda;
        $this->id_tanda     = $id;

        $verificar = "SELECT * FROM tandas WHERE tanda = '$this->tanda' and id_tanda != '$this->id_tanda'";
        $existe = $this->select($verificar);

        if (!empty($existe)) {
           $res = "Duplicado";
        } else {
            $sql = "UPDATE tandas 
                    SET tanda        = ?                   
                    WHERE id_tanda    = ?";
            $datos = array($this->tanda, $this->id_tanda);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "Actualizado";
            }else{
                $res = "Error";
            }

        }

        return $res;
    }

    public function eliminarTanda(int $id)
    {
        $this->id_tanda = $id;
        $sql = "UPDATE tandas SET estado = 0  WHERE id_tanda = ?";
        $datos = array($this->id_tanda);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function accionTanda(int $id, int $estado)
    {
        $this->id_tanda   = $id;
        $this->estado       = $estado;
        $sql = "UPDATE tandas SET estado = ?  WHERE id_tanda = ?";
        $datos = array($this->estado, $this->id_tanda);
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