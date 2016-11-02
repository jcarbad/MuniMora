function validarNotificacionEditar(){
	var validacion = true;
	var noVacios = true;
	var fechaOk = true;
	$("#listaErrores").empty();
	$("#groupExp").removeClass("has-error");
	$("#groupPropietario").removeClass("has-error");
	$("#groupReceptor").removeClass("has-error");
	$("#groupCreacion").removeClass("has-error");
	$("#groupCaducacion").removeClass("has-error");
	$("#groupDescripcion").removeClass("has-error");
	$("#groupDireccion").removeClass("has-error");
	
	 if ($("#exp").val() === "" || isNaN(parseInt($("#exp").val()))) {
        $("#groupExp").addClass("has-error");
        validacion = false;
		noVacios = false;
    }
	
	 if ($("#propietario").val() === "" ) {
        $("#groupPropietario").addClass("has-error");
        validacion = false;
		noVacios = false;
    }
	
	if ($("#receptor").val() === "" ) {
        $("#groupReceptor").addClass("has-error");
        validacion = false;
		noVacios = false;
    }
	
	
	/*var creacion = new Date($("#creacion").val()) ;
	var caducacion = new Date($("#caducacion").val());

	if(creacion < caducacion){
		$("#groupCaducacion").addClass("has-error");
        validacion = false;
		fechaOk = false;
	}*/
	
				

		
	
		if ($("#direccion").val() === "" ) {
        $("#groupDireccion").addClass("has-error");
        validacion = false;
		noVacios = false;
    }
	
	if ($("#descripcion").val() === "" ) {
        $("#groupDescripcion").addClass("has-error");
        validacion = false;
		noVacios = false;
    }
	
	if(!noVacios){
		$("#listaErrores").append("<li>Debe llenar todos los campos</li>");
	}
	if(!fechaOk)
		$("#listaErrores").append("<li>La fecha de caducacion debe ser posterior a la de creacion</li>");
	
	return validacion;
}


