function validacion(){
	
	valor = document.getElementById("marcaDescripcion").value;
	valor = valor.trim();
	if( valor == null || valor.length <= 2 ) {
		alert("Favor de llenar la marca.");
  	return false;
	}
	
}