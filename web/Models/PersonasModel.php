<?php
class PersonasModel extends Query
{
    private $id_provincia, $id_pais, $id_persona, $estado;
    private $nombre, $apellidos, $fecha_nacimiento, $telefono, $direccion;
    private $id_sexo, $estadoCivil, $id_sociedad, $apodo, $imagen;
    private $id_tipo_documento, $nro_documento, $usuario, $fecha_creacion;

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

    public function getPaises()
    {
        $sql = "SELECT * 
                FROM paises 
                ";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getTipoPersona()
    {
        $sql = "SELECT * 
                FROM personas_clasificacion 
                ";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function listarPersonas()
    {
        $sql = "SELECT pe.*, pr.provincia, pa.pais
                        , pc.clasificacion tipoPersona
                        , CONCAT(pe.nombre, ' ', pe.apellidos) persona
                FROM personas pe
                    INNER JOIN provincias pr ON pe.id_provincia = pr.id_provincia
                    INNER JOIN paises pa ON pe.id_pais = pa.id_pais
                    INNER JOIN personas_clasificacion pc ON pe.id_clasificacion = pc.id_clasificacion                    
                ORDER BY persona ASC";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarPersona(string $nombre, string $apellidos, string $telefono
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
                      FROM personas 
                      WHERE nombre    = '$this->nombre'
                      AND apellidos = '$this->apellidos'
                      AND id_provincia  = '$this->id_provincia'";

        $existe = $this->select($verificar);
        if (!empty($existe)) {
            $res = "Existe";
        }else{
            $sql = "INSERT INTO personas (nombre, apellidos, fecha_nacimiento
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

    public function buscaIdPersona(int $id)
    {
        $this->id_persona = $id;
        $sql = "SELECT pe.*, pr.provincia, pa.pais
                        , pc.clasificacion tipoPersona
                        , CONCAT(pe.nombre, ' ', pe.apellidos) persona
                FROM personas pe
                    INNER JOIN provincias pr ON pe.id_provincia = pr.id_provincia
                    INNER JOIN paises pa ON pe.id_pais = pa.id_pais
                    INNER JOIN personas_clasificacion pc ON pe.id_clasificacion = pc.id_clasificacion  
                WHERE id_persona = '$this->id_persona'";
        $data = $this->select($sql);
        return $data;
    }

    public function editarPersona(string $nombre, string $apellidos, string $telefono
                , string $correo, int $id_pais, string $direccion, int $id_tipo_documento 
                , string $nro_documento, int $id_provincia, string $apodo, string $fecha_nacimiento
                , int $estadoCivil, int $id_sociedad, int $id_sexo, int $id_persona)
    {
        $this->id_provincia         = $id_provincia;
        $this->id_pais              = $id_pais;
        $this->id_persona           = $id_persona;
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
                      FROM personas 
                      WHERE nombre    = '$this->nombre'
                      AND apellidos = '$this->apellidos'
                      AND id_provincia  = '$this->id_provincia'
                      AND id_persona != '$this->id_persona'";

        $existe = $this->select($verificar);

        if (!empty($existe)) {
           $res = "Duplicado";
        } else {
            $fecha_modificacion = date('Y/m/d H:i:s', time());
            $sql = "UPDATE personas 
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

                    WHERE id_persona = ?";
            $datos = array($this->nombre, $this->apellidos, $this->fecha_nacimiento, $this->telefono
            , $this->direccion, $this->id_provincia, $this->id_pais, $this->id_sexo
            , $this->estadoCivil, $this->id_sociedad, $this->id_tipo_documento
            , $this->nro_documento, 'imagenPendienteModificar', $this->apodo, $this->usuario
            , $this->correo, $fecha_modificacion,  $this->id_persona
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

    public function eliminarPersona(int $id)
    {
        $this->id_persona = $id;
        $sql = "UPDATE personas 
                SET estado = 0  
                WHERE id_persona = ?";
        $datos = array($this->id_persona);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "OK";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function accionPersona(int $id, int $estado)
    {
        $this->id_persona   = $id;
        $this->estado       = $estado;
        $sql = "UPDATE personas 
                SET estado = ?  
                WHERE id_persona = ?";
        $datos = array($this->estado, $this->id_persona);
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