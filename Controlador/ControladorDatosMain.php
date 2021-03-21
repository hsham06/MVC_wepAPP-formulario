<?php   

require_once("../Modelo/ModeloDatosMain.php");

$empleado= new EmpleadoModel();
$DatosEmpleados = array();
$DatosEmpleados = $empleado->VerEmpleado();


?>