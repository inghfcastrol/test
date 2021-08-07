/* muestra el contenido del menú */

function showMenuContent(size) {
	// console.log(size);
	var htmlMenu = '';
	var htmlSubMenu = '';
	switch(size) {
		case 'pp':
			// console.log('pantalla pequeña');
			$("#menu-webpage").removeClass('text-center');
			$("#menu-webpage").addClass('text-right');
			htmlMenu += '<div class="col-xs-2 col-xs-offset-10 no-padding item-menu-webpage-icono text-center" style="height: 9vh; padding-top: 2vh !important;" onclick="mostrarOcultarSubmenu(\'submenu-webpage\')"><label class="col-xs-12 no-padding glyphicon glyphicon-menu-hamburger"></label></div>';
			
			htmlSubMenu += '<a class="col-xs-12 no-padding item-submenu" href="/config">Configuración</a>';
			htmlSubMenu += '<a class="col-xs-12 no-padding item-submenu" href="/finanzas">Finanzas</a>';
			htmlSubMenu += '<a class="col-xs-12 no-padding item-submenu" href="/locativos">Locativos</a>';
			htmlSubMenu += '<a class="col-xs-12 no-padding item-submenu" href="/eventos">Eventos</a>';
			break;
		case 'pnp':
			// console.log('pantalla NO pequeña');
			$("#menu-webpage").removeClass('text-right');
			$("#menu-webpage").addClass('text-center');
			htmlMenu += '<div class="col-xs-3 no-padding item-menu-webpage" style="height: 9vh; padding-top: 2vh !important;"><a id="menu-configuracion" class="col-xs-12 no-padding" href="/config" style="font-size: 2.5vh; text-decoration: none;">Configuración</a></div>';
			htmlMenu += '<div class="col-xs-3 no-padding item-menu-webpage" style="height: 9vh; padding-top: 2vh !important;"><a id="menu-finanzas" class="col-xs-12 no-padding" href="/finanzas" style="font-size: 2.5vh; text-decoration: none;">Finanzas</a></div>';
			htmlMenu += '<div class="col-xs-3 no-padding item-menu-webpage" style="height: 9vh; padding-top: 2vh !important;"><a id="menu-locativos" class="col-xs-12 no-padding" href="/locativos" style="font-size: 2.5vh; text-decoration: none;">Locativos</a></div>';
			htmlMenu += '<div class="col-xs-3 no-padding item-menu-webpage" style="height: 9vh; padding-top: 2vh !important;"><a id="menu-eventos" class="col-xs-12 no-padding" href="/eventos" style="font-size: 2.5vh; text-decoration: none;">Eventos</a></div>';
			htmlSubMenu = '';
			break;
		// case 'pm':
		// 	console.log('pantalla mediana');
		// 	break;
		// case 'pg':
		// 	console.log('pantalla grande');
		// 	break;
		// case 'pgg':
		// 	console.log('pantalla muy grande');
		// 	break;
		default:
			console.log('Size Screen???');
			alert('Size Screen???');
	}
	$("#menu-webpage").html(htmlMenu);
    $("#submenu-webpage").html(htmlSubMenu);
}