<?php 

include_once('conexion.php');

class Camion extends Conexion{

	private $id_camion;
	private $origen;
	private $destino;
	private $empleado;
	private $cantidad_paquetes;
	private $placa;


	public function getId_camion(){
		return $this->id_camion;
	}

	public function setId_camion($id_camion){
		$this->id_camion = $id_camion;
	}

	public function getOrigen(){
		return $this->origen;
	}

	public function setOrigen($origen){
		$this->origen = $origen;
	}

	public function getDestino(){
		return $this->destino;
	}

	public function setDestino($destino){
		$this->destino = $destino;
	}

	public function getEmpleado(){
		return $this->empleado;
	}

	public function setEmpleado($empleado){
		$this->empleado = $empleado;
	}

	public function getCantidad_paquetes(){
		return $this->cantidad_paquetes;
	}

	public function setCantidad_paquetes($cantidad_paquetes){
		$this->cantidad_paquetes = $cantidad_paquetes;
	}

	public function getPlaca(){
		return $this->placa;
	}

	public function setPlaca($placa){
		$this->placa = $placa;
	}


	public function agregar_camion(){
		$sql = "INSERT INTO camion (origen, destino, empleado, cantidad_paquetes, placa)
		VALUES
		('".$this->getOrigen()."', '".$this->getDestino()."', '".$this->getEmpleado()."', '".$this->getCantidad_paquetes()."', '".$this->getPlaca()."')";
		$this->conectar->query($sql);
		header("Location: camiones.php");
		#echo $sql;
	}

	public function mostrar_placa(){
		$sql = "SELECT * FROM camion WHERE id_camion > 0 ORDER BY origen";

		$resultado = $this->conectar->query($sql);
		$placas = array();
		while ($fila = $resultado->fetch_assoc()) {
			$placas[] = $fila;
		}
		return $placas;
		#echo $sql;
	}

	public function editar(){

		$sql = "SELECT * FROM camion WHERE id_camion = '".$this->getId_camion()."'";

		$resultado = $this->conectar->query($sql);
		$camion = array();

		while($fila = $resultado->fetch_assoc()){
			$camion[] = $fila;
		}
		return $camion;
		#echo $sql;
	}

	public function actualizar(){
		$sql = "UPDATE camion SET origen = '".$this->getOrigen()."', destino = '".$this->getDestino()."', empleado = '".$this->getEmpleado()."', cantidad_paquetes = '".$this->getCantidad_paquetes()."', placa = '".$this->getPlaca()."' WHERE id_camion = '".$this->getId_camion()."'";
		$this->conectar->query($sql);
		header("Location: camiones.php");
		#echo $sql;
	}

	public function eliminar(){
		$sql = "DELETE FROM camion WHERE id_camion = '".$this->getId_camion()."'";
		$this->conectar->query($sql);
		header("Location: camiones.php");
		#echo $sql;
	}


}

?>