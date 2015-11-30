<?php 

include_once('conexion.php');

class Empleado extends Conexion{

	private $id_empleado;
	private $nombre;
	private $cargo;


	public function getId_empleado(){
		return $this->id_empleado;
	}

	public function setId_empleado($id_empleado){
		$this->id_empleado = $id_empleado;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}	

	public function getCargo(){
		return $this->cargo;
	}

	public function setCargo($cargo){
		$this->cargo = $cargo;
	}


	public function agregar_empleado(){
		$sql = "INSERT INTO empleado (nombre, cargo) VALUES ('".$this->getNombre()."', '".$this->getCargo()."')";
		$this->conectar->query($sql);
		header("Location: empleados.php");
		#echo $sql;
	}

	public function mostrar_empleados(){
		$sql = "SELECT * FROM empleado WHERE id_empleado > 0 ORDER BY nombre";
		
		$resultado = $this->conectar->query($sql);
		$empleados = array();
		while ($fila = $resultado->fetch_assoc()) {
			$empleados[] = $fila;
		}
		return $empleados;
		#echo $sql;
	}

	public function mostrar_conductores(){
		$sql = "SELECT * FROM empleado WHERE estado = 'Disponible' AND cargo = 'Conductor' ORDER BY nombre";
		
		$resultado = $this->conectar->query($sql);
		$conductores = array();
		while ($fila = $resultado->fetch_assoc()) {
			$conductores[] = $fila;
		}
		return $conductores;
		#echo $sql;
	}

	public function mostrar_mensajeros(){
		$sql = "SELECT * FROM empleado WHERE estado = 'Disponible' AND cargo = 'Mensajero' ORDER BY nombre";
		
		$resultado = $this->conectar->query($sql);
		$mensajeros = array();
		while ($fila = $resultado->fetch_assoc()) {
			$mensajeros[] = $fila;
		}
		return $mensajeros;
		#echo $sql;
	}

	public function ocupar(){
		$sql = "UPDATE empleado SET estado = 'Ocupado' WHERE nombre = '".$this->getNombre()."'";
		$this->conectar->query($sql);
		#echo $sql;
	}

	public function desocupar(){
		$sql = "UPDATE empleado SET estado = 'Disponible' WHERE nombre = '".$this->getNombre()."'";
		$this->conectar->query($sql);
		#echo $sql;	
	}

	public function editar(){
		$sql = "SELECT * FROM empleado WHERE id_empleado = '".$this->getId_empleado()."'";

		$resultado = $this->conectar->query($sql);
		$empleado = array();

		while($fila = $resultado->fetch_assoc()){
			$empleado[] = $fila;
		}
		return $empleado;
		#echo $sql;
	}

	public function actualizar(){
		$sql = "UPDATE empleado SET nombre = '".$this->getNombre()."', cargo = '".$this->getcargo()."' WHERE id_empleado = '".$this->getId_empleado()."'";
		$this->conectar->query($sql);
		header("Location: empleados.php");
		#echo $sql;
	}

	public function eliminar(){
		$sql = "DELETE FROM empleado WHERE id_empleado = '".$this->getId_empleado()."'";
		$this->conectar->query($sql);
		header("Location: empleados.php");
		#echo $sql;
	}


}

?>