<?php 

include_once('conexion.php');

class Sucursal extends Conexion{

	private $id_sucursal;
	private $ciudad;
	private $direccion;


	public function getId_sucursal(){
		return $this->id_sucursal;
	}

	public function setId_sucursal($id_sucursal){
		$this->id_sucursal = $id_sucursal;
	}

	public function getCiudad(){
		return $this->ciudad;
	}

	public function setCiudad($ciudad){
		$this->ciudad = $ciudad;
	}	

	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function agregar_sucursal(){
		$sql = "INSERT INTO sucursal (ciudad, direccion) VALUES ('".$this->getCiudad()."', '".$this->getDireccion()."')";
		$this->conectar->query($sql);
		#echo $sql;
	}

	public function mostrar_sucursal(){
		$sql = "SELECT * FROM sucursal WHERE id_sucursal > 0 ORDER BY ciudad";
		
		$resultado = $this->conectar->query($sql);
		$sucursales = array();
		while ($fila = $resultado->fetch_assoc()) {
			$sucursales[] = $fila;
		}
		return $sucursales;
		#echo $sql;
	}

	public function editar(){
		$sql = "SELECT * FROM sucursal WHERE id_sucursal = '".$this->getId_sucursal()."'";

		$resultado = $this->conectar->query($sql);
		$sucursal = array();

		while($fila = $resultado->fetch_assoc()){
			$sucursal[] = $fila;
		}
		return $sucursal;
		echo $sql;
	}

	public function actualizar(){
		$sql = "UPDATE sucursal SET ciudad = '".$this->getCiudad()."', direccion = '".$this->getDireccion()."' WHERE id_sucursal = '".$this->getId_sucursal()."'";
		$this->conectar->query($sql);
		header("Location: sucursales.php");
		#echo $sql;
	}

	public function eliminar(){
		$sql = "DELETE FROM sucursal WHERE id_sucursal = '".$this->getId_sucursal()."'";
		$this->conectar->query($sql);
		header("Location: sucursales.php");
		#echo $sql;
	}

}

?>