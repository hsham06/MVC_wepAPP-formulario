<?php   

class EmpleadoModel{
	
	private $Nombre = "";
	private $Email = "";
	private $Direccion = "" ;
	private $Contacto = "";
	private $Deptop = "" ;
	private $DatosEmpleados = array();
	private $empleadosArrayObject;
	
	private $ServerName = "localhost";
	private $DataBase = "m_empleados";
	private $Password = "";
	private $UserName = "root";
	private $Conexion;
	
	public function __construct(){
		
		$this->Conexion = new mysqli($this->ServerName,$this->UserName,$this->Password,$this->DataBase);
		
		if ($this->Conexion->connect_errno) {
			
			echo "Fallo al conectar a MySQL: (" . $this->Conexion->connect_errno . ") " . $this->Conexion->connect_error;
			
		} else {
			
			$resultado = $this->Conexion->query("select * from lista_empleados");
			
			while ($row = $resultado->fetch_assoc()) {
				
				array_push ($this->DatosEmpleados,array(
        	
															"Nombre"=>$row["Nombre"],
															"Email"=>$row["Email"],
															"Direccion"=>$row["Direccion"],
															"Contacto"=>$row["Contacto"],
															"Deptop"=>$row["Deptop"],
															"ID"=>$row["ID"]
														)
							);
			}
		
		mysqli_free_result( $resultado );
		
		
		
		}
	}
	
	public function set_Nombre($Nombre){
		$this->Nombre=$Nombre;
	}
	
	public function get_Nombre(){
		return $this->Nombre;
	}
	public function set_Email($Email){
		$this->Email=$Email;
	}
	
	public function get_Email(){
		return $this-> Email;
	}
	public function set_Direccion($Direccion){
		$this->Direccion=$Direccion;
	}
	
	public function get_Direccion(){
		return $this-> Direccion;
	}
	public function set_Contacto($Contacto){
		$this->Contacto=$Contacto;
	}
	
	public function get_Contacto(){
		return $this->Contacto;
	}
	public function set_Deptop($Deptop){
		$this->Deptop=$Deptop;
	}
	
	public function get_Deptop(){
		return $this->Deptop;
	}
	public function VerEmpleado(){
		
		return $this->DatosEmpleados;
	}
	
	public function Agregar(){
		$resultado = $this->Conexion->prepare("INSERT INTO `lista_empleados` (`Nombre`, `Email`, `Direccion`, `Contacto`, `Deptop`) VALUES (?, ?, ?, ?, ?)");
		$resultado->bind_param("sssss", $this->Nombre, $this->Email, $this->Direccion, $this->Contacto, $this->Deptop);
		$resultado->execute();
		
	}
	public function Modificar($ID){
		
		$resultado = $this->Conexion->prepare("UPDATE `lista_empleados` set `Nombre`=?, `Email`=?, `Direccion`=?, `Contacto`=?, `Deptop`=? where `ID`=?");
		$resultado->bind_param("sssssi", $this->Nombre, $this->Email, $this->Direccion, $this->Contacto, $this->Deptop, $ID);
		$resultado->execute();		
	}
	
	public function Eliminar($ID){
		
		$resultado = $this->Conexion->prepare("DELETE FROM `lista_empleados` where `ID`=?");
		$resultado->bind_param("i", $ID);
		$resultado->execute();	
		
	}
	
	function __destruct() {
		
		mysqli_close( $this->Conexion );
    
	}
	
}




?>