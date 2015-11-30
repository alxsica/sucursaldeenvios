<?php 

	class Conexion{
		
		public $conectar = null;

		public function __construct(){

			$servidor 		= "localhost";
			$usuario 		= "root";
			$password		= "";
			$bd 			= "envios";

			$this->conectar = new mysqli($servidor, $usuario, $password, $bd);			
			
		}#Fin del constructor
	}

?>