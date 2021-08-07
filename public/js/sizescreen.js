var width = $(window).width();

$(window).on('load', function() {
	if(width <= 750) {
		showMenuContent('pp');
		// adjustLabelPlusIconPP();
	} else {
    	// console.log("mostrar menu");

    	// adjustLabelPlusIconPNP();
    	showMenuContent('pnp');
    }
});

$(window).on('resize', function() {
	var htmlMenu = '';
	var htmlSubMenu = '';
	if ($(this).width() != width) {
		width = $(this).width();
		// console.log(width);
		if(width <= 750) {
			// console.log("ocultar menu");
			// adjustLabelPlusIconPP();
			showMenuContent('pp');
		} else {
			// console.log("mostrar menu");
			// adjustLabelPlusIconPNP();
			showMenuContent('pnp');
		}
	}
});

function mostrarOcultarSubmenu(idElem) {
	if($("#"+idElem).hasClass('inactivo')) {
		$("#"+idElem).removeClass('inactivo');
		$("#"+idElem).addClass('activo');
		$("#"+idElem).show('slow');
		// $("#"+idElem).show();
	} else {
		$("#"+idElem).removeClass('activo');
		$("#"+idElem).addClass('inactivo');
		$("#"+idElem).hide('slow');
		// $("#"+idElem).hide();
	}
}

/* FIN MENU RESPONSIVE */


function autocompletarPaso1FormCotizador(ruta) {
	var correo = $("#correo_cotizador").val();
	alert('buscar usuario con correo: '+correo+'. Si existe autocompletar los datos del formulario');
}


/* INICIO ESTILO CATEGORIAS VISTA BROCHURE */

function adjustLabelPlusIconPP() {
	console.log("label sobre icono pantalle pequeña");
	var aaa = $(".labelplusicon");
	aaa.each(function() {
		// console.log(item);
		// console.log(index);
		// index.css({'height': '15vh'});
		console.log(!$(this).hasClass('labelplusicon-pp'));
		if(!$(this).hasClass('labelplusicon-pp')) {
			$(this).removeClass('labelplusicon-pnp');
			$(this).addClass('labelplusicon-pp');
		}
	});
}

function adjustLabelPlusIconPNP() {
	console.log("label sobre icono pantalle NO pequeña");
	var aaa = $(".labelplusicon");
	aaa.each(function() {
		console.log(!$(this).hasClass('labelplusicon-pnp'));
		if(!$(this).hasClass('labelplusicon-pnp')) {
			$(this).removeClass('labelplusicon-pp');
			$(this).addClass('labelplusicon-pnp');
		}
	});
}

/* FIN ESTILO CATEGORIAS VISTA BROCHURE */