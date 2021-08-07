$('div.alert').not('.alert-important').delay(3500).fadeOut(500);

function cambiarEspaciosPorUnderline(idFuente, idDestino) {
	console.log($("#"+idFuente).val());
	var texto = $("#"+idFuente).val().replace(/ /g, "_").replace(/-/g, "_").replace(/Ñ/g, "Ni").replace(/ñ/g, "ni").replace(/á/g, "a").replace(/Á/g, "A").replace(/é/g, "e").replace(/É/g, "E").replace(/í/g, "i").replace(/Í/g, "I").replace(/ó/g, "o").replace(/Ó/g, "O").replace(/ú/g, "u").replace(/Ú/g, "U").toLowerCase();
	console.log(texto);
	$("#"+idDestino).val(texto);
}

function mostrarRolesIngreso() {
	var correo = $("#email").val();
	console.log("correo: "+correo);
	if(correo == "") {
		$("#checks_login_roles").hide();
	} else {
		// AJAX PARA TRAER LOS ROLES DEL USUARIO
		$("#checks_login_roles").show();
	}
}

function checkearEstadosAsignados(idEntidad) {
	console.log("id entidad: "+idEntidad);
	if(idEntidad == 0) {
		console.log("quitar todos los check");
	} else {
		console.log("colocar los checks correspondientes");
	}
}