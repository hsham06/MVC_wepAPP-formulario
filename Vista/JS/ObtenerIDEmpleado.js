//GetEmpleadoId
let ID;

function setIdEmpleado(identificator)
{
	ID=identificator;
	
}



function SumitFormEliminar()
{
	
	let ID2 = document.getElementById("IDEliminarEmpleado");
    ID2.value = ID;
	document.getElementById('formEliminar').submit();
	
}