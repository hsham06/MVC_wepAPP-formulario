<?php   

require_once("../Modelo/ModeloDatosMain.php");

$empleado= new EmpleadoModel();


$form = $_POST["form"];

if(strncmp ($form, "AgregarEmpleado", 15 )==0)
{
	$Nombre = $_POST["Nombre"];
	$Email = $_POST["Email"];
	$Direccion = $_POST["Direccion"] ;
	$Contacto = $_POST["Contacto"];
	$Deptop = $_POST["Deptop"];
	
	$empleado->set_Nombre($Nombre);
	
	$empleado->set_Email($Email);
	
	$empleado->set_Direccion($Direccion);
	
	$empleado->set_Contacto($Contacto);
	
	$empleado->set_Deptop($Deptop);
	
	$empleado->Agregar();
	
	
}else if(strncmp ($form, "EliminarEmpleado", 16 )==0)
{
	$ID = $_POST["idEmpleado"];

	$empleado->Eliminar($ID);
	
}
	
//print_r ($DatosEmpleados);
  
/*Prueba de clase empleado


$empleado->Modificar(5);

;*/

header ("Location: ../Vista/Main.php");

 

?>