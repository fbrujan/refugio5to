<?php 
class Conexion
{
	private $datos = array(
			"host" 		=>"192.168.27.157"
			, "usuario" =>	"api_escuela"
			, "clave"	=>	"123456"
			, "db"		=>	"escuela"
	);

	private $con;

	public function __construct()
	{
		$this->con = new \mysqli(
			  $this->datos['host']
			, $this->datos['usuario']
			, $this->datos['clave']
			, $this->datos['db']
		);
	}

	public function consultaSimple(string $sql)
	{
		$data = $this->con->query($sql);
		return $data;
	}

	public function consultaRetorno(string $sql)
	{
		$data = $this->con->query($sql);
		return $data;
	}
}
?>