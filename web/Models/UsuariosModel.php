<?php
class UsuariosModel extends Query
{
    private $usuario, $clave, $nombre, $id_caja, $id_usuario, $estado;
    public function __construct()
    {
        parent::__construct();
        //echo "<h2> Modelo de Home </h2>";
    }

    public function getUsuario(string $usuario, string $clave)
    {
        $this->usuario  = $usuario;
        $this->clave    = $clave;
        $sql = "SELECT * FROM usuarios WHERE usuario = '$this->usuario' AND clave = '$this->clave'";
        $data = $this->select($sql);
        return $data;
    }

    public function getCajas()
    {
        $sql = "SELECT * FROM cajas WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function listarUsuarios()
    {
        $sql = "SELECT u.*, c.caja FROM usuarios u INNER JOIN cajas c on u.id_caja = c.id";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarUsuario(string $usuario, string $nombre, string $clave, int $id_caja)
    {
        $this->usuario      = $usuario;
        $this->nombre       = $nombre;
        $this->clave        = $clave;
        $this->id_caja      = $id_caja;

        $verificar = "SELECT * FROM usuarios WHERE usuario = '$this->usuario'";
        $existe = $this->select($verificar);
        if (!empty($existe)) {
            $res = "Existe";
        }else{
            $sql = "INSERT INTO usuarios (usuario, nombre, clave, id_caja) VALUES( ?,?,?,?)";
            $datos = array($this->usuario, $this->nombre, $this->clave, $this->id_caja);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "OK";
            }else{
                $res = "Error";
            }
        }
            

        return $res;
    }

    public function buscaIdUsuario(int $id)
    {
        $this->id_usuario = $id;
        $sql = "SELECT * FROM usuarios WHERE id = '$this->id_usuario'";
        $data = $this->select($sql);
        return $data;
    }

    public function editarUsuario(int $id_usuario, string $usuario, string $nombre, int $id_caja)
    {
        $this->nombre       = $nombre;
        $this->usuario      = $usuario;
        $this->id_usuario   = $id_usuario;
        $this->id_caja      = $id_caja;

        $verificar = "SELECT * FROM usuarios WHERE usuario = '$this->usuario' AND id != '$this->id_usuario'";
        $existe = $this->select($verificar);

        if (!empty($existe)) {
           $res = "Duplicado";
        } else {
            $sql = "UPDATE usuarios SET usuario = ?, nombre = ?, id_caja = ? WHERE id = ?";
            $datos = array ($this->usuario, $this->nombre, $this->id_caja, $this->id_usuario);
            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "Actualizado";
            }else{
                $res = "Error";
            }

        }

        return $res;
    }

    public function eliminarUsuario(int $id)
    {
        $this->id_usuario = $id;
        $sql = "UPDATE usuarios SET estado = 0  WHERE id = ?";
        $datos = array($this->id_usuario);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function accionUsuario(int $id, int $estado)
    {
        $this->id_usuario   = $id;
        $this->estado       = $estado;
        $sql = "UPDATE usuarios SET estado = ?  WHERE id = ?";
        $datos = array($this->estado, $this->id_usuario);
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