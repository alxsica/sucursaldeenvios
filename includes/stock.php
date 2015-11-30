<?php 

include_once('conexion.php');

class Stock extends Conexion{

	private $id_stock;
	private $nombre;
	private $cantidad_paquetes;
	private $sucursal;
	private $variaciones;


	public function getId_stock(){
		return $this->id_stock;
	}

	public function setId_stock($id_stock){
		$this->id_stock = $id_stock;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getCantidad_paquetes(){
		return $this->cantidad_paquetes;
	}

	public function setCantidad_paquetes($cantidad_paquetes){
		$this->cantidad_paquetes = $cantidad_paquetes;
	}	

	public function getSucursal(){
		return $this->sucursal;
	}

	public function setSucursal($sucursal){
		$this->sucursal = $sucursal;
	}

	public function getVariaciones(){
		return $this->variaciones;
	}

	public function setVariaciones($variaciones){
		$this->variaciones = $variaciones;
	}


	public function agregar_stock(){
		$sql = "INSERT INTO stock (nombre, cantidad_paquetes, sucursal, variaciones)
		VALUES
		('".$this->getNombre()."', '".$this->getCantidad_paquetes()."', '".$this->getSucursal()."', '".$this->getVariaciones()."')";
		$this->conectar->query($sql);
		header("Location: stock.php");
		#echo $sql;
	}

	public function mostrar_stock(){
		$sql = "SELECT * FROM stock WHERE id_stock > 0";

		$resultado = $this->conectar->query($sql);
		$stock = array();
		while($fila = $resultado->fetch_assoc()){
			$stock[] = $fila;
		} 
		return $stock;
	}

	public function editar(){
		$sql = "SELECT * FROM stock WHERE id_stock = '".$this->getId_stock()."'";

		$resultado = $this->conectar->query($sql);
		$stock = array();

		while($fila = $resultado->fetch_assoc()){
			$stock[] = $fila;
		}
		return $stock;
		#echo $sql;
	}

	public function actualizar(){
		$sql = "UPDATE stock SET nombre = '".$this->getNombre()."', cantidad_paquetes = '".$this->getCantidad_paquetes()."', sucursal = '".$this->getSucursal()."', variaciones = '".$this->getVariaciones()."' WHERE id_stock = '".$this->getId_stock()."'";
		$this->conectar->query($sql);
		header("Location: stock.php");
		#echo $sql;
	}

	public function eliminar(){
		$sql = "DELETE FROM stock WHERE id_stock = '".$this->getId_stock()."'";
		$this->conectar->query($sql);
		header("Location: stock.php");
		#echo $sql;
	}


}

?>