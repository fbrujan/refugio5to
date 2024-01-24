<?php
class ClientesModel extends Query
{
    private $nombre, $apellidos, $tipo_documento, $nro_documento, $telefono, $correo, $direccion, $estado, $id_cliente;
    public function __construct()
    {
        parent::__construct();
        //echo "<h2> Modelo de Home </h2>";
    }

    public function listarClientes()
    {
        $sql = "SELECT * FROM clientes";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarCliente(string $nombre, string $apellidos, string $tipo_documento, string $nro_documento, string $telefono, string $correo, string $direccion)
    {
        $this->apellidos        = $apellidos;
        $this->nombre           = $nombre;
        $this->tipo_documento   = $tipo_documento;
        $this->nro_documento    = $nro_documento;
        $this->telefono         = $telefono;
        $this->correo           = $correo;
        $this->direccion        = $direccion;

        $verificar = "SELECT * FROM clientes WHERE dni = '$this->nro_documento'";
        $existe = $this->select($verificar);
        if (!empty($existe)) {
            $res = "Existe";
        }else{
            $sql = "INSERT INTO clientes (tipo_dni, dni, nombre, apellidos, telefono, direccion, email) VALUES( ?, ?, ?, ?, ?, ?, ?)";
            $datos = array($this->tipo_documento, $this->nro_documento, $this->nombre, $this->apellidos, $this->telefono, $this->direccion, $this->correo);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "OK";
            }else{
                $res = "Error";
            }
        }
            

        return $res;
    }

    public function buscaIdCliente(int $id)
    {
        $this->id_cliente = $id;
        $sql = "SELECT * FROM clientes WHERE id_cliente = '$this->id_cliente'";
        $data = $this->select($sql);
        return $data;
    }

    public function editarCliente(int $id, string $nombre, string $apellidos, string $tipo_documento, string $nro_documento, string $telefono, string $correo, string $direccion)
    {
        $this->apellidos        = $apellidos;
        $this->nombre           = $nombre;
        $this->tipo_documento   = $tipo_documento;
        $this->nro_documento    = $nro_documento;
        $this->telefono         = $telefono;
        $this->correo           = $correo;
        $this->direccion        = $direccion;
        $this->id_cliente       = $id;

        $verificar = "SELECT * FROM clientes WHERE dni = '$this->nro_documento' and id_cliente != '$this->id_cliente'";
        $existe = $this->select($verificar);

        if (!empty($existe)) {
           $res = "Duplicado";
        } else {
            $sql = "UPDATE clientes 
                    SET tipo_dni        = ?,
                        dni             = ?, 
                        nombre          = ?,
                        apellidos       = ?,
                        telefono        = ?,
                        email           = ?,
                        direccion       = ?
                    WHERE id_cliente    = ?";
            $datos = array($this->tipo_documento, $this->nro_documento, $this->nombre, $this->apellidos, $this->telefono, $this->correo, $this->direccion, $this->id_cliente);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "Actualizado";
            }else{
                $res = "Error";
            }

        }

        return $res;
    }

    public function eliminarCliente(int $id)
    {
        $this->id_cliente = $id;
        $sql = "UPDATE clientes SET estado = 0  WHERE id_cliente = ?";
        $datos = array($this->id_cliente);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function accionCliente(int $id, int $estado)
    {
        $this->id_cliente   = $id;
        $this->estado       = $estado;
        $sql = "UPDATE clientes SET estado = ?  WHERE id_cliente = ?";
        $datos = array($this->estado, $this->id_cliente);
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