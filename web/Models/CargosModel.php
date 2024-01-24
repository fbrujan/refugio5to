<?php
class CargosModel extends Query
{
    private $cargo, $estado, $id_cargo;
    public function __construct()
    {
        parent::__construct();
        //echo "<h2> Modelo de Home </h2>";
    }

    public function listarCargos()
    {
        $sql = "SELECT * FROM cargos";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarCargo(string $cargo)
    {
        $this->cargo        = $cargo;
        
        $verificar = "SELECT * FROM cargos WHERE cargo = '$this->cargo'";
        $existe = $this->select($verificar);
        if (!empty($existe)) {
            $res = "Existe";
        }else{
            $sql = "INSERT INTO cargos (cargo) VALUES(  ?)";
            $datos = array($this->cargo);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "OK";
            }else{
                $res = "Error";
            }
        }
            

        return $res;
    }

    public function buscaIdCargo(int $id)
    {
        $this->id_cargo = $id;
        $sql = "SELECT * FROM cargos WHERE id_cargo = '$this->id_cargo'";
        $data = $this->select($sql);
        return $data;
    }

    public function editarCargo(int $id, string $cargo)
    {
        $this->cargo        = $cargo;
        $this->id_cargo     = $id;

        $verificar = "SELECT * FROM cargos WHERE cargo = '$this->cargo' and id_cargo != '$this->id_cargo'";
        $existe = $this->select($verificar);

        if (!empty($existe)) {
           $res = "Duplicado";
        } else {
            $sql = "UPDATE cargos 
                    SET cargo        = ?                   
                    WHERE id_cargo    = ?";
            $datos = array($this->cargo, $this->id_cargo);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "Actualizado";
            }else{
                $res = "Error";
            }

        }

        return $res;
    }

    public function eliminarCargo(int $id)
    {
        $this->id_cargo = $id;
        $sql = "UPDATE cargos SET estado = 0  WHERE id_cargo = ?";
        $datos = array($this->id_cargo);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function accionCargo(int $id, int $estado)
    {
        $this->id_cargo   = $id;
        $this->estado       = $estado;
        $sql = "UPDATE cargos SET estado = ?  WHERE id_cargo = ?";
        $datos = array($this->estado, $this->id_cargo);
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