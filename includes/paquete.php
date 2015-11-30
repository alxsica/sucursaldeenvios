<?php

include_once('conexion.php'); 

class Paquete extends Conexion{

	private $id_paquete;
	private $origen; 
	private $destino; 
	private $valor; 
	private $prioridad; 
	private $stock; 
	private $ubicacion_stock; 
	private $placa_camion;
	private $id_mensajero; 
	private $estado; 
	private $id_proveedor;


	public function getId_paquete(){
		return $this->id_paquete;
	}

	public function setId_paquete($id_paquete){
		$this->id_paquete = $id_paquete;
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

	public function getValor(){
		return $this->valor;
	}

	public function setValor($valor){
		$this->valor = $valor;
	}

	public function getPrioridad(){
		return $this->prioridad;
	}

	public function setPrioridad($prioridad){
		$this->prioridad = $prioridad;
	}

	public function getStock(){
		return $this->stock;
	}

	public function setStock($stock){
		$this->stock = $stock;
	}

	public function getUbicacion_stock(){
		return $this->ubicacion_stock;
	}

	public function setUbicacion_stock($ubicacion_stock){
		$this->ubicacion_stock = $ubicacion_stock;
	}

	public function getPlaca_camion(){
		return $this->placa_camion;
	}

	public function setPlaca_camion($placa_camion){
		$this->placa_camion = $placa_camion;
	}

	public function getId_mensajero(){
		return $this->id_mensajero;
	}

	public function setId_mensajero($id_mensajero){
		$this->id_mensajero = $id_mensajero;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getProveedor(){
		return $this->proveedor;
	}

	public function setProveedor($proveedor){
		$this->proveedor = $proveedor;
	}


	public function agregar_paquete(){
		$sql = "INSERT INTO paquete 
		(origen, destino, valor, prioridad, stock, ubicacion_stock, placa_camion, id_mensajero, estado, proveedor) 
		VALUES
		('".$this->getOrigen()."', '".$this->getDestino()."', '".$this->getValor()."', '".$this->getPrioridad()."', '".$this->getStock()."', '".$this->getUbicacion_stock()."', '".$this->getPlaca_camion()."', '".$this->getId_mensajero()."', '".$this->getEstado()."', '".$this->getProveedor()."')";
		$this->conectar->query($sql);
		header("Location: paquetes.php");
		#echo $sql;
	}

	public function mostrar_paquetes(){
		$sql = "SELECT * FROM paquete WHERE id_paquete > 0";

		$resultado = $this->conectar->query($sql);
		$paquetes = array();
		while($fila = $resultado->fetch_assoc()){
			$paquetes[] = $fila;
		}
		return $paquetes;
	}

	public function paquetes_por_ciudad($ciudad){
		$sql = "SELECT * FROM paquete WHERE destino = '{$ciudad}'";

		$resultado = $this->conectar->query($sql);
		$paquetes = array();
		while($fila = $resultado->fetch_assoc()){
			$paquetes[] = $fila;
		}
		return $paquetes;
	}

	public function editar(){
		$sql = "SELECT * FROM paquete WHERE id_paquete = '".$this->getId_paquete()."'";

		$resultado = $this->conectar->query($sql);
		$paquete = array();

		while($fila = $resultado->fetch_assoc()){
			$paquete[] = $fila;
		}
		return $paquete;
		#echo $sql;
	}

	public function actualizar(){
		$sql = "UPDATE paquete SET origen = '".$this->getOrigen()."', destino = '".$this->getDestino()."', valor = '".$this->getValor()."', prioridad = '".$this->getPrioridad()."', stock = '".$this->getStock()."', ubicacion_stock = '".$this->getUbicacion_stock()."', placa_camion = '".$this->getPlaca_camion()."', id_mensajero = '".$this->getId_mensajero()."', estado = '".$this->getEstado()."', proveedor = '".$this->getProveedor()."' WHERE id_paquete = '".$this->getId_paquete()."'";
		$this->conectar->query($sql);
		header("Location: paquetes.php");
		#echo $sql;
	}

	public function eliminar(){
		$sql = "DELETE FROM paquete WHERE id_paquete = '".$this->getId_paquete()."'";
		$this->conectar->query($sql);
		header("Location: paquetes.php");
		#echo $sql;
	}


}

?>