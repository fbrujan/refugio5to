<?php
class ServiciosModel extends Query
{
    private $servicio, $id_tipo_servicio, $id_servicio;
    private $fecha_inicio, $fecha_fin, $hora_inicio, $hora_fin;
    private $descripcion, $costo, $requiere_registro, $estado;

    public function __construct()
    {
        parent::__construct();
        //echo "<h2> Modelo de Home </h2>";
    }

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }

    public function listarServicios()
    {
        $sql = "SELECT s.*
                       , (SELECT count(1) 
                          FROM asistencia a 
                          WHERE a.id_servicio = s.id_servicio
                        ) AS asistencia 
                FROM servicios s
                ";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarServicio()
    {
        $verificar = "SELECT * FROM servicios WHERE servicio = '$this->servicio'";
        $existe = $this->select($verificar);
        if (!empty($existe)) {
            $res = "Existe";
        }else{
            $sql = "INSERT INTO servicios (id_tipo_servicio, servicio, descripcion,
                                           fecha_inicio, hora_inicio, costo, requiere_registro) 
            VALUES( ?, ?, ?, ?, ?, ?, ?)";

            $datos = array($this->id_tipo_servicio 
                        ,$this->servicio
                        ,$this->descripcion 
                        ,$this->fecha_inicio
                        ,$this->hora_inicio
                        ,$this->costo
                        ,$this->requiere_registro
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

    public function buscaIdServicio()
    {
        $sql = "SELECT * FROM servicios WHERE id_servicio = '$this->id_servicio'";
        $data = $this->select($sql);
        return $data;
    }

    public function editarServicio()
    {
       
        $verificar = "SELECT * FROM servicios WHERE servicio = '$this->servicio' and id_servicio != '$this->id_servicio'";
        $existe = $this->select($verificar);

        if (!empty($existe)) {
           $res = "Duplicado";
        } else {
            $sql = "UPDATE servicios 
                    SET   servicio          = ? 
                        , id_tipo_servicio  = ?
                        , descripcion       = ?
                        , fecha_inicio      = ? 
                        , hora_inicio       = ?
                        , costo             = ?
                        , requiere_registro = ?                 
                    WHERE id_servicio       = ?";
            $datos = array($this->servicio 
                            ,$this->id_tipo_servicio
                            ,$this->descripcion 
                            ,$this->fecha_inicio
                            ,$this->hora_inicio
                            ,$this->costo
                            ,$this->requiere_registro
                            ,$this->id_servicio
                        );

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "Actualizado";
            }else{
                $res = "Error";
            }

        }

        return $res;
    }

    public function eliminarServicio()
    {
        $sql = "UPDATE servicios SET estado = 0  WHERE id_servicio = ?";
        $datos = array($this->id_servicio);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function accionServicio()
    {
        $sql = "UPDATE servicios SET estado = ?  WHERE id_servicio = ?";
        $datos = array($this->estado, $this->id_servicio);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function getTipoServicio()
    {
        $sql = "SELECT * FROM tipo_servicio";
        $data = $this->selectAll($sql);
        return $data;
    }

}
?>