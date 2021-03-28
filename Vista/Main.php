<!DOCTYPE html>
<?php
require_once("../Controlador/ControladorDatosMain.php");
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ingeniería De Software I Hanvan Sham 19-0783 Manejo De empleado</title>
<link  rel="icon"   href="IMG\empleados.ico" type="image/ico" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS\DisingMain.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="JS\Anime.js"></script>
<script src="JS\ObtenerIDEmpleado.js"></script>
</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manejo De <b>Empleados "Hsham S.R.L"</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ingresar nuevo empleado</span></a>					
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Dirección</th>
						<th>Contacto</th>
						<th>Depto.</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php
					for ($i=0;$i<count($DatosEmpleados);$i++){
						
						
						echo "<tr>";
						echo "<td>";
								echo "<span class='custom-checkbox'>";
									echo "<input type='checkbox' id='checkbox1' name='options[]' value='1'>";
									echo "<label for='checkbox1'></label>";
								echo"</span>";
							echo"</td>";
							echo"<td>".$DatosEmpleados[$i]["Nombre"]."</td>";
							echo"<td>".$DatosEmpleados[$i]["Email"]."</td>";
							echo"<td>".$DatosEmpleados[$i]["Direccion"]."</td>";
							echo"<td>".$DatosEmpleados[$i]["Contacto"]."</td>";
							echo"<td>".$DatosEmpleados[$i]["Deptop"]."</td>";
							echo"<td>";
								echo"<script>let parametros".$DatosEmpleados[$i]["ID"]." = {

											Nombre : '".$DatosEmpleados[$i]["Nombre"]."',
											Email : '".$DatosEmpleados[$i]["Email"]."',
											Direccion : '".$DatosEmpleados[$i]["Direccion"]."',
											Contacto : '".$DatosEmpleados[$i]["Contacto"]."',
											Deptop : '".$DatosEmpleados[$i]["Deptop"]."',
											ID: ".$DatosEmpleados[$i]["ID"]."
									}</script>";
								echo"<a href='#editEmployeeModal' onclick='setDatosEmpleado(parametros".$DatosEmpleados[$i]["ID"].")' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>";
								echo"<a href='#deleteEmployeeModal' onclick='setIdEmpleado(parametros".$DatosEmpleados[$i]["ID"].".ID".")' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Eliminar'>&#xE872;</i></a>";
							echo"</td>";
						echo"</tr>";
							
					}

					
					?>					
				</tbody>
			</table>
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="../Controlador/ControladorManipularDatos.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Ingresar Empleado</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Nombre</label>
						<input name="Nombre" type="text" class="form-control" required>
						<input name="form" type="hidden" class="form-control" value= "AgregarEmpleado">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input name="Email" type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Dirección</label>
						<textarea name="Direccion" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Contacto</label>
						<input name="Contacto" type="text" class="form-control" required>
					</div>		
					<div class="form-group">
						<label>Depto.</label>
						<input name="Deptop" type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="ActualizarEmpleado" action="../Controlador/ControladorManipularDatos.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Editar Empleado</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Nombre</label>
						<input name="Nombre" type="text" id="nombreUp" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input name="Email" type="email" id="emailUp" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Dirección</label>
						<textarea name="Direccion" class="form-control" id="DireccionUp" required></textarea>
					</div>
					<div class="form-group">
						<label>Contacto</label>
						<input name="Contacto" type="text" class="form-control" id="ContactoUp" required>
					</div>	
					<div class="form-group">
						<label>Depto.</label>
						<input name="Deptop" type="text" class="form-control" id="DeptoUp" required>
					</div>					
				</div>
				<div class="modal-footer">
				<input name="idEmpleado" id="IDActualizarEmpleado" type="hidden" class="form-control" value= "nulo">
					<input name="form" type="hidden" class="form-control" value= "ActualizarEmpleado">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" onclick="SumitFormActualizar();" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="formEliminar" action="../Controlador/ControladorManipularDatos.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Eliminar Empleado</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Esta seguro que desea eliminar este empleado?</p>
					<p class="text-warning"><small>Esta Acción se desecho.</small></p>
				</div>
				<div class="modal-footer">
					<input name="idEmpleado" id="IDEliminarEmpleado" type="hidden" class="form-control" value= "nulo">
					<input name="form" type="hidden" class="form-control" value= "EliminarEmpleado">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" onclick="SumitFormEliminar();" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>