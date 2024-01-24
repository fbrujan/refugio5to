<?php
class FinanzasModel extends Query
{
    private $finanza, $estado, $id_transaccion;
    
    public function __construct()
    {
        parent::__construct();
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
                ";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getRangos()
    {
        $sql = "SELECT * 
                FROM rango_ministerial 
                ";
        $data = $this->selectAll($sql);
        return $data;
    }


    public function getPaises()
    {
        $sql = "SELECT *  FROM paises ";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getCircuitos()
    {
        $sql = "SELECT *  FROM circuitos ORDER BY circuito";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getIglesias()
    {
        $sql = "SELECT *  FROM iglesias ORDER BY iglesia";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getServicios()
    {
        $sql = "SELECT *  FROM servicios ORDER BY servicio";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getTipoAsistencia()
    {
        $sql = "SELECT * 
                FROM asistencia 
                ";
        $data = $this->selectAll($sql);
        return $data;
    }


    public function listarFinanzas()
    {
        $sql = "SELECT f.id_distrito, f.id_circuito, f.id_iglesia
                    , CONCAT(p.nombre, ' ', p.apellidos) persona
                    , f.id_persona, f.id_concepto, f.id_tipo_transaccion
                    , d.distrito
                    , c.circuito
                    , i.iglesia
                    , ct.concepto_transaccion
                    , tt.tipo_transaccion
                    , date_format(f.fecha, '%Y%m') mes
                    , sum(monto) as monto
                FROM finanzas f 
                    INNER JOIN personas p ON f.id_persona = p.id_persona
                    INNER JOIN distritos d ON f.id_distrito = d.id_distrito
                    INNER JOIN circuitos c ON f.id_circuito = c.id_circuito
                    INNER JOIN iglesias i ON f.id_iglesia = i.id_iglesia
                    INNER JOIN conceptos_transaccion ct on f.id_concepto = ct.id_concepto_transaccion
                    INNER JOIN tipo_transaccion tt on f.id_tipo_transaccion = tt.id_tipo_transaccion
                GROUP BY f.id_distrito, f.id_circuito, f.id_iglesia, f.id_persona, f.id_concepto, f.id_tipo_transaccion,date_format(f.fecha, '%Y%m')
                    ";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarTransaccion(int $id_tipo_trans, int $id_concepto, int $id_persona,
                                     int $id_distrito, int $id_circuito, int $id_iglesia, 
                                     string $fecha, string $monto, string $comentario)
    {
        $this->id_trans     = $id_tipo_trans;
        $this->concepto     = $id_concepto;
        $this->persona      = $id_persona;
        $this->distrito     = $id_distrito;
        $this->circuito     = $id_circuito;
        $this->iglesia      = $id_iglesia;
        $this->fecha        = $fecha;
        $this->monto        = $monto;
        $this->comentario   = $comentario;
        $this->estado       = 'Vigente';
        $this->usuario      = $_SESSION['usuario'];;

        $sql = "INSERT INTO finanzas  VALUES(NULL,?,?,?,?,?,?,?,?,?,?,?,NULL)";
        $datos = array($this->id_trans, 
                       $this->concepto,
                       $this->persona,
                       $this->distrito,
                       $this->circuito,
                       $this->iglesia,
                       $this->fecha,
                       $this->monto,
                       $this->comentario,
                       $this->estado,
                       $this->usuario
                    );

        $data = $this->save($sql, $datos);

        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
    

        return $res;
    }

    public function buscaIdFinanza(int $id)
    {
        $this->id_transaccion = $id;
        $sql = "SELECT f.*
                    , CONCAT(p.nombre, ' ', p.apellidos) nombre
                    , d.distrito
                    , c.circuito
                    , i.iglesia
                    , ct.concepto_transaccion
                    , tt.tipo_transaccion
                    , tt.Signo
                FROM finanzas f 
                    INNER JOIN personas p ON f.id_persona = p.id_persona
                    INNER JOIN distritos d ON f.id_distrito = d.id_distrito
                    INNER JOIN circuitos c ON f.id_circuito = c.id_circuito
                    INNER JOIN iglesias i ON f.id_iglesia = i.id_iglesia
                    INNER JOIN conceptos_transaccion ct on f.id_concepto = ct.id_concepto_transaccion
                    INNER JOIN tipo_transaccion tt on f.id_tipo_transaccion = tt.id_tipo_transaccion
                 WHERE id_transaccion = '$this->id_transaccion'";
        $data = $this->select($sql);
        return $data;
    }

    public function editarFinanza(int $id, string $finanza)
    {
        $this->finanza        = $finanza;
        $this->id_transaccion     = $id;

        $verificar = "SELECT * FROM finanzas WHERE finanza = '$this->finanza' and id_transaccion != '$this->id_transaccion'";
        $existe = $this->select($verificar);

        if (!empty($existe)) {
           $res = "Duplicado";
        } else {
            $sql = "UPDATE finanzas 
                    SET finanza        = ?                   
                    WHERE id_transaccion    = ?";
            $datos = array($this->finanza, $this->id_transaccion);

            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "Actualizado";
            }else{
                $res = "Error";
            }

        }

        return $res;
    }

    public function eliminarFinanza(int $id)
    {
        $this->id_transaccion = $id;
        $sql = "UPDATE finanzas SET estado = 0  WHERE id_transaccion = ?";
        $datos = array($this->id_transaccion);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function accionFinanza(int $id, int $estado)
    {
        $this->id_transaccion   = $id;
        $this->estado       = $estado;
        $sql = "UPDATE finanzas SET estado = ?  WHERE id_transaccion = ?";
        $datos = array($this->estado, $this->id_transaccion);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function resumenFinanzas()
    {
        $sql = "SELECT f.id_distrito, f.id_circuito, f.id_iglesia
                    , f.id_concepto, f.id_tipo_transaccion
                    , d.distrito
                    , c.circuito
                    , i.iglesia
                    , ct.concepto_transaccion
                    , tt.tipo_transaccion
                    , f.comentario
                    , date_format(f.fecha, '%Y%m') mes
                    , sum(monto) as monto
                FROM finanzas f 
                    INNER JOIN personas p ON f.id_persona = p.id_persona
                    INNER JOIN distritos d ON f.id_distrito = d.id_distrito
                    INNER JOIN circuitos c ON f.id_circuito = c.id_circuito
                    INNER JOIN iglesias i ON f.id_iglesia = i.id_iglesia
                    INNER JOIN conceptos_transaccion ct on f.id_concepto = ct.id_concepto_transaccion
                    INNER JOIN tipo_transaccion tt on f.id_tipo_transaccion = tt.id_tipo_transaccion
                GROUP BY f.id_distrito, f.id_circuito, f.id_iglesia
                    , f.id_concepto, f.id_tipo_transaccion
                    , d.distrito
                    , c.circuito
                    , i.iglesia
                    , ct.concepto_transaccion
                    , tt.tipo_transaccion
                    , f.comentario
                    , date_format(f.fecha, '%Y%m')
                    ";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function listadoPersonas()
    {
        $sql = "SELECT pe.*, pr.provincia, pa.pais
                        , pc.clasificacion tipoPersona
                        , CONCAT(pe.nombre, ' ', pe.apellidos) persona
                FROM personas pe
                    INNER JOIN provincias pr ON pe.id_provincia = pr.id_provincia
                    INNER JOIN paises pa ON pe.id_pais = pa.id_pais
                    INNER JOIN personas_clasificacion pc ON pe.id_clasificacion = pc.id_clasificacion
                WHERE pe.estado = 1                    
                ORDER BY persona ASC";
        $data = $this->selectAll($sql);
        return $data;
    }

}
?>