<?php 

include_once('conexion.php');

class Proveedor extends Conexion{

	private $id_proveedor;
	private $nombre;
	private $valor_envio;


	public function getId_proveedor(){
		return $this->id_proveedor;
	}

	public function setId_proveedor($id_proveedor){
		$this->id_proveedor = $id_proveedor;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getValor_envio(){
		return $this->valor_envio;
	}

	public function setValor_envio($valor_envio){
		$this->valor_envio = $valor_envio;
	}	

	public function agregar_proveedor(){
		$sql = "INSERT INTO proveedor (nombre, valor_envio) VALUES ('".$this->getNombre()."', '".$this->getValor_envio()."')";
		$this->conectar->query($sql);
		header("Location: proveedores.php");
		#echo $sql;
	}

	public function mostrar_proveedores(){
		$sql = "SELECT * FROM proveedor WHERE id_proveedor > 0 ORDER BY id_proveedor";

		$resultado = $this->conectar->query($sql);
		$proveedores = array();

		while ($fila = $resultado->fetch_assoc()){
			$proveedores[] = $fila;
		}
		return $proveedores;
		#echo $sql;
	}

	public function editar(){
		$sql = "SELECT * FROM proveedor WHERE id_proveedor = '".$this->getId_proveedor()."'";

		$resultado = $this->conectar->query($sql);
		$proveedor = array();

		while($fila = $resultado->fetch_assoc()){
			$proveedor[] = $fila;
		}
		return $proveedor;
		#echo $sql;
	}

	public function actualizar(){
		$sql = "UPDATE proveedor SET nombre = '".$this->getNombre()."', valor_envio = '".$this->getValor_envio()."' WHERE id_proveedor = '".$this->getId_proveedor()."'";
		$this->conectar->query($sql);
		header("Location: proveedores.php");
		#echo $sql;
	}

	public function eliminar(){
		$sql = "DELETE FROM proveedor WHERE id_proveedor = '".$this->getId_proveedor()."'";
		$this->conectar->query($sql);
		header("Location: proveedores.php");
		#echo $sql;
	}

}

?>