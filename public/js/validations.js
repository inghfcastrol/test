function cargarProductosPorTipoProductoId(idTipoProducto) {
	console.log("id tipo producto: "+idTipoProducto);
    var y = {idTipoProducto: "" + idTipoProducto + ""};
    var url = "/webapis/cargarProductosPorTipoProductoId/"+idTipoProducto;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            for(var i=0; i<json.length; i++) {
            	if(json[i]['estado'] == "Inactivo") {
            		htmlText += "<option disabled=\"true\" value='"+json[i]['id']+"' data-nombre='"+json[i]['producto']+"' style='background-color: #c7c7c7'>"+json[i]['producto']+"</option>";
            	} else {
            		htmlText += "<option value='"+json[i]['id']+"' data-nombre='"+json[i]['producto']+"'>"+json[i]['producto']+"</option>";
            	}
            }
            document.getElementById("producto_id").innerHTML = htmlText;
            document.getElementById("marca_producto_id").innerHTML = "<option value='0'>Selecciona una marca</option>";
            document.getElementById("tipo_empaque_id").innerHTML = "<option value='0'>Selecciona un empaque</option>";
            ponerNombreArticulo();
        },
        error: function(err){
            alert("error "+err);
        }
    });
}

 function cargarMarcasYEmpaquesPorProductoId(idProducto) {
 	cargarMarcasPorProductoId(idProducto);
 	cargarEmpaquesPorProductoId(idProducto);
 	
 }

 function cargarMarcasPorProductoId(idProducto) {
 	console.log("id producto: "+idProducto);
    var y = {idProducto: "" + idProducto + ""};
    var url = "/webapis/cargarMarcasPorProductoId/"+idProducto;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            for(var i=0; i<json.length; i++) {
            	if(json[i]['estado'] == "Inactiva") {
            		htmlText += "<option disabled=\"true\" value='"+json[i]['id']+"' data-nombre='"+json[i]['marca']+"' style='background-color: #c7c7c7'>"+json[i]['marca']+"</option>";
            	} else {
            		htmlText += "<option value='"+json[i]['id']+"' data-nombre='"+json[i]['marca']+"'>"+json[i]['marca']+"</option>";
            	}
            }
            document.getElementById("marca_producto_id").innerHTML = htmlText;
            ponerNombreArticulo();
        },
        error: function(err){
            alert("error "+err);
        }
    });
 }

 function cargarEmpaquesPorProductoId(idProducto) {
 	console.log("id producto: "+idProducto);
    var y = {idProducto: "" + idProducto + ""};
    var url = "/webapis/cargarEmpaquesPorProductoId/"+idProducto;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            for(var i=0; i<json.length; i++) {
            	if(json[i]['estado'] == "Inactivo") {
            		htmlText += "<option disabled=\"true\" value='"+json[i]['id']+"' data-nombre='"+json[i]['empaque']+"' style='background-color: #c7c7c7'>"+json[i]['empaque']+"</option>";
            	} else {
            		htmlText += "<option value='"+json[i]['id']+"' data-nombre='"+json[i]['empaque']+"'>"+json[i]['empaque']+"</option>";
            	}
            }
            document.getElementById("tipo_empaque_id").innerHTML = htmlText;
            ponerNombreArticulo();
        },
        error: function(err){
            alert("error "+err);
        }
    });
 }

function resetSelectsCrearArticulo() {
	var textoProductos = "Selecciona un producto";
	var textMarcas = "Selecciona una marca";
	var textoEmpaques = "Selecciona un empaque";
	var prod = $("#producto_id");
	console.log(prod);
}

function ponerNombreArticuloYDecimales(idElm, idElmNumeros) {
	console.log("Variable a colocar decimales a su valor: "+idElm);
	console.log($("#"+idElm).val());
	console.log($("#"+idElm).val().split(".").join(""));
	$("#"+idElm).mask("#.##0", {reverse: true});
	$("#"+idElmNumeros).val(parseInt($("#"+idElm).val().split(".").join("")));
	ponerNombreArticulo();
}

function ponerNombreArticulo() {
	if($("#producto_id").val() == 0 || $("#marca_producto_id").val() == 0 || $("#tipo_empaque_id").val() == 0 || $("#capacidad").val() == "" || $("#unidad_medida_id").val() == 0) {
		$("#nombre_articulo").val("");
	} else {
		console.log($("#producto_id").children(":selected").text() );
		console.log($("#marca_producto_id").children(":selected").text() );
		console.log($("#tipo_empaque_id").children(":selected").text() );
		$("#nombre_articulo").val($("#producto_id").children(":selected").text()+" "+$("#marca_producto_id").children(":selected").text()+" en "+$("#tipo_empaque_id").children(":selected").text()+" - "+$("#capacidad").val()+" "+$("#unidad_medida_id").children(":selected").text());
	}

}

function showMenu(clase, idElm) {
	// console.log("clases a cerrar: "+clase);
	// console.log("elemento a mostrar: "+idElm);
	// if($("#"+idElm).hasClass("hidden")){
	// 	$("."+clase).addClass("hidden");
	// 	$("#"+idElm).removeClass("hidden");
	// } else {
	// 	$("."+clase).addClass("hidden");
	// }
	// $("."+clase).addClass("hidden");
    $("."+clase).hide("slow");
    $("#"+idElm).show("slow");
		
}

function cargarArticulosPorTipoProductoId(idTipoProducto) {
	console.log("id tipo producto: "+idTipoProducto);
    var y = {idTipoProducto: "" + idTipoProducto + ""};
    var url = "/webapis/cargarArticulosPorTipoProductoId/"+idTipoProducto;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            for(var i=0; i<json.length; i++) {
            	htmlText += "<div class='col-xs-12'>";
            	htmlText += "<legend style='font-size: 1.4vw; margin-top: 15px;'>"+json[i].producto+"</legend>";
            	for(var j=0; j<json[i].articulos.length; j++) {
            		if(json[i].articulos[j].cantidad_articulos != null) {
            			htmlText += "<div id='informacion-articulo-modal-"+json[i].articulos[j].id+"' data-id='"+json[i].articulos[j].id+"' data-nombre='"+json[i].articulos[j].nombre_articulo+"' data-ruta='"+json[i].articulos[j].ruta_imagen_articulo+"' class='col-xs-12 col-sm-6 col-md-4' style='border: 1px solid #cecece; min-height: 30px; padding: 10px;'>";
	            		htmlText += "<div class='col-xs-12 text-center'>";
	            		htmlText += "<img src='"+json[i].articulos[j].ruta_imagen_articulo+"' height='90vw' width='auto'>";
	            		htmlText += "</div>";
	            		htmlText += "<div class='col-xs-12 text-center' style='border: 1px solid transparent; min-height: 30px'>";
	            		htmlText += "<label style='font-size: 1.1vw'>"+json[i].articulos[j].nombre_articulo+"</label>";
	            		htmlText += "<label style='font-size: 0.9vw'><i>Unidades disponibles</i> - "+json[i].articulos[j].cantidad_articulos+"</label>";
                        htmlText += "<button class='btn btn-primary' onclick='verModalCantidadPedido("+json[i].articulos[j].id+")'>Agregar</button>";
	            		htmlText += "</div>";
	            		htmlText += "</div>";
            		}
            	}
            	htmlText += "</div>";
            	// if(json[i]['estado'] == "Inactivo") {
            	// 	htmlText += "<option disabled=\"true\" value='"+json[i]['id']+"' data-nombre='"+json[i]['empaque']+"' style='background-color: #c7c7c7'>"+json[i]['empaque']+"</option>";
            	// } else {
            	// 	htmlText += "<option value='"+json[i]['id']+"' data-nombre='"+json[i]['empaque']+"'>"+json[i]['empaque']+"</option>";
            	// }
            }
            document.getElementById('div-contenido').innerHTML = htmlText;
        },
        error: function(err){
            alert("error "+err);
        }
    });
}

function cargarListadoCombos(idCombo) {
	var html = "Cargar listado del combo "+idCombo;
	document.getElementById('div-contenido').innerHTML = html;
}

function cargarListadoPromociones(idPromocion) {
	// 	$("#div-contenido").text("");
	var html = "Cargar listado de la promoción "+idPromocion;
	document.getElementById('div-contenido').innerHTML = html;
}


function verModalCantidadPedido(articulo_id){
    console.log($("#informacion-articulo-modal"));
    console.log($("#informacion-articulo-modal-"+articulo_id).attr("data-id"));
    console.log($("#informacion-articulo-modal-"+articulo_id).attr("data-nombre"));
    console.log($("#informacion-articulo-modal-"+articulo_id).attr("data-ruta"));
    idArticulo = $("#informacion-articulo-modal-"+articulo_id).attr("data-id");
    nombreArticulo = $("#informacion-articulo-modal-"+articulo_id).attr("data-nombre");
    rutaImagen = $("#informacion-articulo-modal-"+articulo_id).attr("data-ruta");
    $("#title-modal-cantidad-articulo").text(idArticulo+" - "+nombreArticulo);
    $("#btn-modal-agregar-articulo").attr('onclick', 'agregarArticuloAlListadoPedido('+idArticulo+')');
    var htmlText = "";
    htmlText += "<div class='col-xs-12'><img class='col-xs-6 col-xs-offset-3' src="+rutaImagen+" height='200vw' width='85vw'></div>";
    htmlText += "<div class='col-xs-12'><input type='number' id='input-modal-cantidad-articulos-agregar-"+idArticulo+"' class='form-control' value='0'></div>";
    $("#contenido-modal-cantidad-articulo").html(htmlText);
    $('#modalSeleccionarCantidad').modal();
}


function verContenidoMenuDesplegable(idElm) {
    var idProducto = $("#"+idElm).attr("data-id");
    if( $("#contenido-menu-desplegable-"+idProducto).attr("data-ver") == "false" ) {
        $(".contenido-menu-desplegable").attr("data-ver", "false");
        $(".contenido-menu-desplegable").hide("slow");
        $("#contenido-menu-desplegable-"+idProducto).show("slow");
        $("#contenido-menu-desplegable-"+idProducto).attr("data-ver", "true");
    } else if( $("#contenido-menu-desplegable-"+idProducto).attr("data-ver") == "true" ) {
        $(".contenido-menu-desplegable").hide("slow");
        $(".contenido-menu-desplegable").attr("data-ver", "false");
    } else {
        $(".contenido-menu-desplegable").hide("slow");
    }
}

function agregarArticuloAlListadoPedido(idArticulo) {
    var cantidadArticulos = $("#input-modal-cantidad-articulos-agregar-"+idArticulo).val();
    alert(idArticulo+" - "+cantidadArticulos);
}

function facturarPedido() {
    alert("Generar factura PDF, crear registro en la base de datos del pedido -> TABLA pedidos, CREAR EL QR DE LA TRANSACCION, enviar al proceso de PAGO()");
}