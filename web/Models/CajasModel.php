<?php
class cajasModel extends Query
{
    private $caja, $descripcion, $estado, $id_caja;
    public function __construct()
    {
        parent::__construct();
        //echo "<h2> Modelo de Home </h2>";
    }

    public function listarCajas()
    {
        $sql = "SELECT * FROM cajas";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarCaja(string $caja, string $descripcion)
    {
        $this->caja        = $caja;
        $this->descripcion = $descripcion;
        
        $verificar = "SELECT * FROM cajas WHERE caja = '$this->caja'";
        $existe = $this->select($verificar);
        if (!empty($existe)) {
            $res = "Existe";
        }else{
            $sql = "INSERT INTO cajas (caja, descripcion) VALUES( ?, ?)";
            $datos = array($this->caja, $this->descripcion);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "OK";
            }else{
                $res = "Error";
            }
        }
            

        return $res;
    }

    public function buscaIdCaja(int $id)
    {
        $this->id_caja = $id;
        $sql = "SELECT * FROM cajas WHERE id = '$this->id_caja'";
        $data = $this->select($sql);
        return $data;
    }

    public function editarCaja(int $id, string $caja, string $descripcion)
    {
        $this->caja        = $caja;
        $this->descripcion = $descripcion;
        $this->id_caja     = $id;

        $verificar = "SELECT * FROM cajas WHERE caja = '$this->caja' and id != '$this->id_caja'";
        $existe = $this->select($verificar);

        if (!empty($existe)) {
           $res = "Duplicado";
        } else {
            $sql = "UPDATE cajas 
                    SET caja        = ?,
                        descripcion = ?                        
                    WHERE id        = ?";
            $datos = array($this->caja, $this->descripcion, $this->id_caja);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "Actualizado";
            }else{
                $res = "Error";
            }

        }

        return $res;
    }

    public function eliminarCaja(int $id)
    {
        $this->id_caja = $id;
        $sql = "UPDATE cajas SET estado = 0  WHERE id = ?";
        $datos = array($this->id_caja);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function accionCaja(int $id, int $estado)
    {
        $this->id_caja   = $id;
        $this->estado    = $estado;
        $sql = "UPDATE cajas SET estado = ?  WHERE id = ?";
        $datos = array($this->estado, $this->id_caja);
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