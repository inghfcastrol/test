$('div.alert').not('.alert-important').delay(3500).fadeOut(500);

function validarAbreviaturaDivisa(elm) {
    console.log(elm);

}

function cargarDepartamentosPorIdPais(idPais) {
    console.log("id pais: "+idPais);
    var y = {idPais: "" + idPais + ""};
    var url = "http://hfdevelop.net/devs/proshare/public/getDepartamentosByIdPais/"+idPais;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            for(var i=0; i<json.length; i++) {
                htmlText += "<option value='"+json[i]['id']+"'>"+json[i]['departamento']+"</option>";
            }
            document.getElementById("departamento_id").innerHTML = htmlText;
            
        },
        error: function(err){
            alert("error "+err);
        }
    });
}

function cargarSegmentosPorIdGrupo(idGrupo) {
    console.log("id grupo: "+idGrupo);
    var y = {idGrupo: "" + idGrupo + ""};
    var url = "http://hfdevelop.net/devs/proshare/public/getSegmentosByIdGrupo/"+idGrupo;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            for(var i=0; i<json.length; i++) {
                htmlText += "<option value='"+json[i]['id']+"'>"+json[i]['segmento']+"</option>";
            }
            document.getElementById("segmento_id").innerHTML = htmlText;
            
        },
        error: function(err){
            alert("error "+err);
        }
    });
}

function cargarFamiliasPorIdSegmento(idSegmento) {
    console.log("id segmento: "+idSegmento);
    var y = {idSegmento: "" + idSegmento + ""};
    var url = "http://hfdevelop.net/devs/proshare/public/getFamiliasByIdSegmento/"+idSegmento;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            for(var i=0; i<json.length; i++) {
                htmlText += "<option value='"+json[i]['id']+"'>"+json[i]['familia']+"</option>";
            }
            document.getElementById("familia_id").innerHTML = htmlText;
            
        },
        error: function(err){
            alert("error "+err);
        }
    });
}

function cargarClasesPorIdFamilia(idFamilia) {
    console.log("id familia: "+idFamilia);
    var y = {idFamilia: "" + idFamilia + ""};
    var url = "http://hfdevelop.net/devs/proshare/public/getClasesByIdFamilia/"+idFamilia;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            for(var i=0; i<json.length; i++) {
                htmlText += "<option value='"+json[i]['id']+"'>"+json[i]['clase']+"</option>";
            }
            document.getElementById("clase_id").innerHTML = htmlText;
            
        },
        error: function(err){
            alert("error "+err);
        }
    });
}

function cargarProductosPorIdClase(idClase) {
    console.log("id clase: "+idClase);
    var y = {idClase: "" + idClase + ""};
    var url = "http://hfdevelop.net/devs/proshare/public/getProductosByIdClase/"+idClase;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            for(var i=0; i<json.length; i++) {
                htmlText += "<option value='"+json[i]['id']+"'>"+json[i]['producto']+"</option>";
            }
            document.getElementById("producto_id").innerHTML = htmlText;
            
        },
        error: function(err){
            alert("error "+err);
        }
    });
}

function cargarRolesPorIdUsuario(idUsuario, nombreCompleto) {
    console.log('id usuario: '+idUsuario);
    console.log('nombre completo: '+nombreCompleto);
    var y = {idUsuario: "" + idUsuario + ""};
    var url = "http://hfdevelop.net/devs/proshare/public/getRolesByIdUsuario/"+idUsuario;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            //var htmlText = "<h5 class='col-form-label text-center'>Roles</h5>";
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            for(var i=0; i<json.length; i++) {
                htmlText += "<div class='col-xs-12'>";
                if(json[i]['check'] == true || json[i]['check'] == 'true') {
                    htmlText += "<input id='check_rol_"+json[i]['idRol']+"' name='roles[]' type='checkbox' value='"+json[i]['idRol']+"' class='check_' checked>";
                } else {
                    htmlText += "<input id='check_rol_"+json[i]['idRol']+"' name='roles[]' type='checkbox' value='"+json[i]['idRol']+"' class='check_'>";
                }
                htmlText += "<label for='check_rol_"+json[i]['idRol']+"' class='col-form-label'> "+json[i]['nombre_rol']+"</label>";
                htmlText += "</div>";
            }
            document.getElementById("info_roles_modal").innerHTML = htmlText;
            $("#nombre_usuario").text(nombreCompleto);
            $("#usuario_id").val(idUsuario);
            $("#modalAsignarRoles").modal();
            /**/
            
        },
        error: function(err){
            alert("error "+err);
        }
    });
    /**/
}

function cargarRolesPorLogin(login) {
    console.log(login);
    var htmlText = "";
    if(login != ""){
        var y = {login: "" + login + ""};
        var url = "http://hfdevelop.net/devs/proshare/public/getRolesByLogin/"+login;
        console.log(url);
        console.log(y);
        var objeto = $.ajax({
            type: "GET", url: url, data: y, cache: false,
            success: function(){
                var json = JSON.parse(objeto.responseText);
                console.log(json);
                for(var i=0; i<json.length; i++){
                    htmlText+="<div class='col-xs-12'>";
                    htmlText+="<input type='radio' name='rol_acceso' id='rol_acceso_"+json[i]['idRol']+"' value='"+json[i]['idRol']+"'> ";
                    htmlText+="<label for='rol_acceso_"+json[i]['idRol']+"'>"+json[i]['nombre_rol']+"</label>";
                    htmlText+="</div>";
                }
                document.getElementById('roles_acceso_div').innerHTML = htmlText;
            },
            error: function(err){
                alert("Error: "+err);
            }
        });
    }
    document.getElementById('roles_acceso_div').innerHTML = htmlText;
}

function cargarMarcasPorIdClaseVehiculo(idClaseVehiculo) {
    console.log("id clase: "+idClaseVehiculo);
    var y = {idClaseVehiculo: "" + idClaseVehiculo + ""};
    var url = "http://hfdevelop.net/devs/proshare/public/getMarcasByIdClaseVehiculo/"+idClaseVehiculo;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            for(var i=0; i<json.length; i++) {
                htmlText += "<option value='"+json[i]['id']+"'>"+json[i]['marca_vehiculo']+"</option>";
            }
            document.getElementById("marca_vehiculo_id").innerHTML = htmlText;
            
        },
        error: function(err){
            alert("error "+err);
        }
    });
}

function validarform()
{
    var cantidadChecks = $(".check_:checked").length;
    console.log(cantidadChecks);
    if(cantidadChecks == 0) {
        alert("Debe seleccionar al menos un rol");
    } else {
        $("#asignacion_roles_form").submit();
    }
    
}

function cargarModalBanner(idSucursal, empresa, sucursal) {
    console.log(idSucursal);
    console.log(sucursal);
    var y = {idSucursal: "" + idSucursal + ""};
    var url = "http://hfdevelop.net/devs/proshare/public/getBannersByIdSucursal/"+idSucursal;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            for(var i=0; i<json.length; i++) {
                htmlText += "<div class='col-xs-4' style='margin-bottom: 5px; margin-top: 5px;'>";
                htmlText += "<img src='"+json[i]['ruta_banner']+"' height='100px' width='80%'>";
                htmlText += "</div>";
            }
            htmlText += "<div class='col-xs-4' style='margin-bottom: 5px; margin-top: 5px;'>";
            htmlText += "<img src='img/project/add-image.png' height='100px' width='80%' style='cursor: pointer;' onclick='$(\"#ruta_banner\").click()'>";
            htmlText += "</div>";
            document.getElementById("info_banner_modal").innerHTML = htmlText;
            $("#nombre_sucursal_banner").text("Banners "+empresa+" - "+sucursal);
            $("#sucursal_id_banner").val(idSucursal);
            $("#ruta_banner").val("");
            $("#nombre_banner_cargar").text("");
            $("#modalVerBanners").modal();            
        },
        error: function(err){
            alert("error "+err);
        }
    });
    
}

function verLabelCarga() {
    var filename = $("#ruta_banner").val();
    console.log(filename);
    $("#nombre_banner_cargar").text(filename);
    if(filename == "") {
        console.log("ocultar boton");
        $("#boton_cargar_banner").addClass('hidden');
    } else {
        console.log("ver boton");
        $("#boton_cargar_banner").removeClass('hidden');
    }
}

function cargarModalTelefonoSucursal(idSucursal, empresa, sucursal) {
    console.log(idSucursal);
    console.log(sucursal);
    var y = {idSucursal: "" + idSucursal + ""};
    var url = "http://hfdevelop.net/devs/proshare/public/getTelefonosByIdSucursal/"+idSucursal;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "<h4 class='text-center' style='margin-top: 0px;'>Números almacenados</h4>";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            for(var i=0; i<json.length; i++) {
                htmlText += "<div class='col-xs-12'>";
                htmlText += "<label>+"+json[i]['codigo_telefonico']+" "+json[i]['numero_telefonico']+"</label>";
                htmlText += "</div>";
                console.log(json[i]['codigo_telefonico']+" "+json[i]['numero_telefonico']);
            }
            document.getElementById("info_telefono_modal").innerHTML = htmlText;
            $("#nombre_sucursal_telefono").text("Teléfonos "+empresa+" - "+sucursal);
            $("#sucursal_id_telefono").val(idSucursal);
            $("#telefono_sucursal").val("");
            $("#modalVerTelefonos").modal();            
        },
        error: function(err){
            alert("error "+err);
        }
    });
    
}

function habilitarBotonCargar(idElem) {
    var telefono = $("#"+idElem).val();
    if(telefono == "" || telefono.length < 7) {
        $("#boton_cargar_telefono").addClass('hidden');
    } else {
        $("#boton_cargar_telefono").removeClass('hidden');
    }
}

function cargarModalTelefonoUsuario(idUsuario, nombreCompleto) {
    console.log(idUsuario);
    console.log(nombreCompleto);
    var y = {idUsuario: "" + idUsuario + ""};
    var url = "http://hfdevelop.net/devs/proshare/public/getTelefonosByIdUsuario/"+idUsuario;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "<h4 class='text-center' style='margin-top: 0px;'>Números almacenados</h4>";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            for(var i=0; i<json.length; i++) {
                htmlText += "<div class='col-xs-12'>";
                htmlText += "<label>+"+json[i]['codigo_telefonico']+" "+json[i]['numero_telefonico']+"</label>";
                htmlText += "</div>";
                console.log(json[i]['codigo_telefonico']+" "+json[i]['numero_telefonico']);
            }
            document.getElementById("info_telefono_modal").innerHTML = htmlText;
            $("#nombre_usuario_telefono").text("Teléfonos "+nombreCompleto);
            $("#usuario_id_telefono").val(idUsuario);
            $("#telefono_usuario").val("");
            $("#modalVerTelefonos").modal();            
        },
        error: function(err){
            alert("error "+err);
        }
    });    
}



/*

function validarResultadosForm() {
	if($('input[name="__1[]"]:checked').length>0 && $('input[name="__2[]"]:checked').length>0 && $('input[name="__3[]"]:checked').length>0 && $('input[name="__4[]"]:checked').length>0 && $('input[name="__5[]"]:checked').length>0 && $('input[name="__6[]"]:checked').length>0 && $('input[name="__7[]"]:checked').length>0 && $('input[name="__8[]"]:checked').length>0 && $('input[name="__9[]"]:checked').length>0 && $('input[name="__10[]"]:checked').length>0 && $('input[name="__11[]"]:checked').length>0 && $('input[name="__12[]"]:checked').length>0 && $('input[name="__13[]"]:checked').length>0 && $('input[name="__14[]"]:checked').length>0) {
		return true;
	} else {
		alert("Seleccione al menos un resultado de cada partido");
		return false;
	}
}


function showUpdateForm(id)
{
    //alert(id);
    if($("#cliente_fila_input_"+id).hasClass("elm_hidden")) {
        $("#cliente_fila_input_"+id).removeClass("elm_hidden");
        $("#cliente_fila_info_"+id).addClass("elm_hidden")
        $("#cliente_fila_input_"+id).addClass("elm_shown");
    }
}

function hideUpdateForm(id) {
    //alert(id);
    if($("#cliente_fila_input_"+id).hasClass("elm_shown")) {
        $("#cliente_fila_input_"+id).removeClass("elm_shown");
        $("#cliente_fila_info_"+id).removeClass("elm_hidden")
        $("#cliente_fila_input_"+id).addClass("elm_hidden");
    }
}

function sendUpdateCliente(id) {
    alert(id);
    var id = 'update_cliente_form_'+id;
    //document.getElementById('update_cliente_form_').submit();
}

function loadCamapaniasByCliente(idCliente) {
    console.log("id cliente: "+idCliente);
    var y = {idCliente: "" + idCliente + ""};
    var url = "http://hfdevelop.net/devs/facturacion/public/getCampaniasByIdCliente/"+idCliente;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            console.log(json.length);
            for(var i=0; i<json.length; i++) {
                htmlText += "<option value='"+json[i]['id']+"'>"+json[i]['campania']+"</option>";
            }
            document.getElementById("campania_id").innerHTML = htmlText;
            obtenerPreciosRuta();
        },
        error: function(err){
            alert("error "+err);
        }
    });
}


function loadVehiculosByIdTipoVehiculo(idTipoVehiculo) {
    console.log("id tipo vehiculo: "+idTipoVehiculo);
    var y = {idTipoVehiculo: "" + idTipoVehiculo + ""};
    var url = "http://hfdevelop.net/devs/facturacion/public/getVehiculosByIdTipoVehiculo/"+idTipoVehiculo;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            console.log(json.length);
            for(var i=0; i<json.length; i++) {
                htmlText += "<option value='"+json[i]['id']+"'>"+json[i]['vehiculo']+"</option>";
            }
            document.getElementById("vehiculo_id").innerHTML = htmlText;
            htmlText1 = "<option value='0'>Selecciona un conductor...</option>";
            document.getElementById("conductor_id").innerHTML = htmlText1;
            obtenerPreciosRuta();
        },
        error: function(err){
            alert("error "+err);
        }
    });
}

function loadConductoresByIdVehiculo(idVehiculo) {
    console.log("id vehiculo: "+idVehiculo);
    $(".check_").attr("checked", false);
    var y = {idVehiculo: "" + idVehiculo + ""};
    var url = "http://hfdevelop.net/devs/facturacion/public/getConductoresByIdVehiculo/"+idVehiculo;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            console.log(json.length);
            for(var i=0; i<json.length; i++) {
                //htmlText += "<option value='"+json[i]['id']+"'>"+json[i]['vehiculo']+"</option>";
                $("#check_"+json[i]).attr("checked", true);
            }
        },
        error: function(err){
            alert("error "+err);
        }
    });
}

function loadConductoresPorIdVehiculo(idVehiculo) {
    console.log("id vehiculo: "+idVehiculo);
    var y = {idVehiculo: "" + idVehiculo + ""};
    var url = "http://hfdevelop.net/devs/facturacion/public/getConductoresPorIdVehiculo/"+idVehiculo;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            console.log(json.length);
            for(var i=0; i<json.length; i++) {
                htmlText += "<option value='"+json[i]['id']+"'>"+json[i]['conductor']+"</option>";
            }
            document.getElementById("conductor_id").innerHTML = htmlText;
        },
        error: function(err){
            alert("error "+err);
        }
    });
}

function obtenerPreciosRuta() {
    var idCliente = $("#cliente_id").val();
    var idTipoServicio = $("#tipo_servicio_id").val();
    var idTipoVehiculo = $("#tipo_vehiculo_id").val();
    console.log("ENTRO A VALIDAR COMBINACION PARA TRAER PRECIOS DE RUTA, si existe");
    console.log("id cliente: "+idCliente);
    console.log("id tipo servicio: "+idTipoServicio);
    console.log("id tipo vehiculo: "+idTipoVehiculo);
    var y = {idCliente: "" + idCliente + "", idTipoServicio: "" + idTipoServicio + "", idTipoVehiculo: "" + idTipoVehiculo + ""};
    var url = "http://hfdevelop.net/devs/facturacion/public/getPreciosFijos/"+idCliente+"/"+idTipoServicio+"/"+idTipoVehiculo;
    console.log(url);
    console.log(y);
    var objeto = $.ajax({
        type: "GET", url: url, data: y, cache: false,
        success: function(){
            var htmlText = "";
            var json = JSON.parse(objeto.responseText);
            console.log(json);
            console.log(json.length);
            if(json.length == 0) {
                $("#valor_ruta").val(0);
                $("#valor_pago_ruta").val(0);
            } else {
                alert("Valores de cobro y pago establecidos");
                $("#valor_ruta").val(parseInt(json[0]['valor_cobro']));
                $("#valor_pago_ruta").val(parseInt(json[0]['valor_pago']));
            }
        },
        error: function(err) {
            alert("error "+err);
        }
    });
}
*/