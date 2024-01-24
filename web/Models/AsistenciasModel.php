<?php
class AsistenciasModel extends Query
{
    private $id_provincia, $id_pais, $id_asistencia, $estado;
    private $nombre, $apellidos, $fecha_nacimiento, $telefono, $direccion;
    private $id_sexo, $estadoCivil, $id_sociedad, $apodo, $imagen;
    private $id_tipo_documento, $nro_documento, $usuario, $fecha_creacion;
    private $idDistrito, $idCircuito, $idIglesia, $idServicio, $idTanda, $fecha;
    private $id_rango_ministerial;

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

    public function registrarAsistencia(string $nombre, string $apellidos, string $telefono
        , string $correo, int $id_pais, string $direccion, int $id_tipo_documento 
        , string $nro_documento, int $id_provincia, string $apodo, string $fecha_nacimiento
        , int $estadoCivil, int $id_sociedad, int $id_sexo
        ) // me quede aqui
    {
        $this->id_provincia         = $id_provincia;
        $this->id_pais              = $id_pais;
        $this->nombre               = $nombre;
        $this->apellidos            = $apellidos;
        $this->correo               = $correo;
        $this->fecha_nacimiento     = $fecha_nacimiento;
        $this->telefono             = $telefono;
        $this->direccion            = $direccion;
        $this->id_sexo              = $id_sexo;
        $this->estadoCivil          = $estadoCivil;
        $this->id_sociedad          = $id_sociedad;
        $this->apodo                = $apodo;
        $this->id_tipo_documento    = $id_tipo_documento;
        $this->nro_documento        = $nro_documento;
        $this->usuario              = $_SESSION['usuario'];

        $fecha_creacion = date('Y/m/d H:i:s', time());       
        
        
        $verificar = "SELECT * 
                      FROM asistencias 
                      WHERE nombre    = '$this->nombre'
                      AND apellidos = '$this->apellidos'
                      AND id_provincia  = '$this->id_provincia'";

        $existe = $this->select($verificar);
        if (!empty($existe)) {
            $res = "Existe";
        }else{
            $sql = "INSERT INTO asistencias (nombre, apellidos, fecha_nacimiento
                    , telefono, direccion, id_provincia, id_pais, id_sexo, id_estado_civil
                    , id_clasificacion, id_tipo_documento, nro_documento_identidad, imagen, apodo
                    , usuario_creacion, correo, fecha_creacion) 
                    VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? )";
            $datos = array($this->nombre, $this->apellidos, $this->fecha_nacimiento, $this->telefono
                            , $this->direccion, $this->id_provincia, $this->id_pais, $this->id_sexo
                            , $this->estadoCivil, $this->id_sociedad, $this->id_tipo_documento
                            , $this->nro_documento, 'imagenPendiente', $this->apodo, $this->usuario
                            , $this->correo, $fecha_creacion
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

    public function buscaIdAsistencia(int $id)
    {
        $this->id_asistencia = $id;
        $sql = "SELECT pe.*, pr.provincia, pa.pais
                        , pc.clasificacion tipoAsistencia
                        , CONCAT(pe.nombre, ' ', pe.apellidos) asistencia
                FROM asistencias pe
                    INNER JOIN provincias pr ON pe.id_provincia = pr.id_provincia
                    INNER JOIN paises pa ON pe.id_pais = pa.id_pais
                    INNER JOIN asistencias_clasificacion pc ON pe.id_clasificacion = pc.id_clasificacion  
                WHERE id_asistencia = '$this->id_asistencia'";
        $data = $this->select($sql);
        return $data;
    }

    public function editarAsistencia(string $nombre, string $apellidos, string $telefono
                , string $correo, int $id_pais, string $direccion, int $id_tipo_documento 
                , string $nro_documento, int $id_provincia, string $apodo, string $fecha_nacimiento
                , int $estadoCivil, int $id_sociedad, int $id_sexo, int $id_asistencia)
    {
        $this->id_provincia         = $id_provincia;
        $this->id_pais              = $id_pais;
        $this->id_asistencia           = $id_asistencia;
        $this->nombre               = $nombre;
        $this->apellidos            = $apellidos;
        $this->correo               = $correo;
        $this->fecha_nacimiento     = $fecha_nacimiento;
        $this->telefono             = $telefono;
        $this->direccion            = $direccion;
        $this->id_sexo              = $id_sexo;
        $this->estadoCivil          = $estadoCivil;
        $this->id_sociedad          = $id_sociedad;
        $this->apodo                = $apodo;
        $this->id_tipo_documento    = $id_tipo_documento;
        $this->nro_documento        = $nro_documento;
        $this->usuario              = $_SESSION['usuario'];    

        $verificar = "SELECT * 
                      FROM asistencias 
                      WHERE nombre    = '$this->nombre'
                      AND apellidos = '$this->apellidos'
                      AND id_provincia  = '$this->id_provincia'
                      AND id_asistencia != '$this->id_asistencia'";

        $existe = $this->select($verificar);

        if (!empty($existe)) {
           $res = "Duplicado";
        } else {
            $fecha_modificacion = date('Y/m/d H:i:s', time());
            $sql = "UPDATE asistencias 
                    SET   nombre = ?
                        , apellidos = ?
                        , fecha_nacimiento = ?
                        , telefono = ?
                        , direccion = ?                        
                        , id_provincia = ?
                        , id_pais = ?
                        , id_sexo = ?
                        , id_estado_civil = ?
                        , id_clasificacion = ?
                        , id_tipo_documento = ?
                        , nro_documento_identidad = ?
                        , imagen = ?
                        , apodo = ?
                        , usuario_modificacion = ?
                        , correo = ?
                        , ultima_modificacion = ?

                    WHERE id_asistencia = ?";
            $datos = array($this->nombre, $this->apellidos, $this->fecha_nacimiento, $this->telefono
            , $this->direccion, $this->id_provincia, $this->id_pais, $this->id_sexo
            , $this->estadoCivil, $this->id_sociedad, $this->id_tipo_documento
            , $this->nro_documento, 'imagenPendienteModificar', $this->apodo, $this->usuario
            , $this->correo, $fecha_modificacion,  $this->id_asistencia
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

    public function eliminarAsistencia(int $id)
    {
        $this->id_asistencia = $id;
        $sql = "UPDATE asistencias 
                SET estado = 0  
                WHERE id_asistencia = ?";
        $datos = array($this->id_asistencia);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function accionAsistencia(int $id, int $estado)
    {
        $this->id_asistencia   = $id;
        $this->estado       = $estado;
        $sql = "UPDATE asistencias 
                SET estado = ?  
                WHERE id_asistencia = ?";
        $datos = array($this->estado, $this->id_asistencia);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function ponerPresente( int $idDistrito, int $idCircuito, int $idIglesia, int $idServicio, int $idPersona, int $idTanda, string $fecha, string $usuario, int $idRangoMinAsist)
    {
        $this->idDistrito = $idDistrito;
        $this->idCircuito = $idCircuito;
        $this->idIglesia = $idIglesia;
        $this->idServicio = $idServicio;
        $this->idPersona = $idPersona;
        $this->idTanda = $idTanda;
        $this->fecha = $fecha;
        $this->usuario = $usuario;
        $this->id_rango_ministerial = $idRangoMinAsist;

        $verificar = "SELECT * 
                      FROM asistencia 
                      WHERE id_distrito    = '$this->idDistrito'
                      AND id_circuito = '$this->idCircuito'
                      AND id_iglesia  = '$this->idIglesia'
                      AND id_persona = '$this->idPersona'
                      AND id_tanda = '$this->idTanda'
                      and id_servicio = '$this->idServicio'
                      AND fecha = '$this->fecha'";

        $existe = $this->select($verificar);
        if (!empty($existe)) {
            $res = "Existe";
        }else{

            $sql = "INSERT INTO asistencia (id_distrito, id_circuito, id_iglesia, 
                                id_servicio, id_persona, id_tanda, fecha, usuario, id_rango_ministerial)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $datos = array($this->idDistrito, 
                            $this->idCircuito, 
                            $this->idIglesia, 
                            $this->idServicio, 
                            $this->idPersona,
                            $this->idTanda,
                            $this->fecha,
                            $this->usuario,
                            $this->id_rango_ministerial
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



}
?>