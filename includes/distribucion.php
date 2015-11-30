<?php 

include_once('conexion.php');

class Distribucion extends Conexion{

	private $calendario;
	private $hora_salida;
	private $paquete;


	public function getCalendario(){
		return $this->calendario;
	}

	public function setCalendario($calendario){
		$this->calendario = $calendario;
	}

	public function getHora_salida(){
		return $this->hora_salida;
	}

	public function setHora_salida($hora_salida){
		$this->hora_salida = $hora_salida;
	}	

	public function getPaquete(){
		return $this->paquete;
	}

	public function setPaquete($paquete){
		$this->paquete = $paquete;
	}


}

?>