//GetEmpleadoId
let Nombre;
let Email;
let Direccion;
let Contacto;
let Deptop;
let ID;

function setDatosEmpleado(parametros)
{	
	Nombre=parametros.Nombre;
	Email=parametros.Email;
	Direccion=parametros.Direccion;
	Contacto=parametros.Contacto;
	Deptop=parametros.Deptop;
	ID=parametros.ID;
	
	ActualizarInpustEditar();
	
}

function setIdEmpleado(id)
{	
	ID=id;
	
}

function SumitFormEliminar()
{
	
	let ID2 = document.getElementById("IDEliminarEmpleado");
    ID2.value = ID;
	document.getElementById('formEliminar').submit();
	
}

function SumitFormActualizar()
{
	
	let ID2 = document.getElementById("IDActualizarEmpleado");
    ID2.value = ID;
	document.getElementById('formEliminar').submit();
	
}

function ActualizarInpustEditar()
{
	
	let Nombre2 = document.getElementById("nombreUp");
	let Email2 = document.getElementById("emailUp");
	let Direccion2 = document.getElementById("DireccionUp");
	let Contacto2 = document.getElementById("ContactoUp");
	let Deptop2 = document.getElementById("DeptoUp");
	
    Nombre2.value = Nombre;
	Email2.value = Email;
	Direccion2.value = Direccion;
	Contacto2.value = Contacto;
	Deptop2.value = Deptop;
	
}