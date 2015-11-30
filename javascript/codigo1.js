function validar()	
{
	var user = document.getElementById("user").value;
	var pass = document.getElementById("password").value;
	if(user == ""){
		alert("Tiene que completar el campo usuario");
		return false;}
	
	if (pass == ""){ 
		alert("Tiene que ingresar su contrasena");
		return false;} 
	
	var siguiente = document.getElementById("id").value;
	if(siguiente == ""){
		alert("No ha seleccionado el ID");
		return false;}
}
function validar2()	
{
	var siguiente = document.getElementById("id").value;
	if(siguiente == ""){
		alert("No ha seleccionado el ID");
		return false;}
}