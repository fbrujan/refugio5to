<?php 

include('Conexion.php');

class Estudiante
{
	private $id_estudiante;
	private $nombre;
	private $apellido;
	private $fecha_nac;
	private $direccion;
	private $id_seccion;
	private $con;

	public function __construct()
	{
		$this->con = new Conexion();
	}


	public function listar()
	{
		$sql = "select e.*, s.nombre as seccion 
				from estudiante e 
					inner join secciones s on e.id_seccion = s.id";


		$datos = $this->con->consultaRetorno($sql);
		return $datos;
		//print_r($datos);
	}
}

?>