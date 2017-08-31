/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function fun_Nuevo(accion){
    var link="";
    link=$('#txth_controlador').val()+"/create";
    $('#btn_nuevo').attr("href", link);
}

function retornarIndexArray(array, property, value) {
    var index = -1;
    for (var i = 0; i < array.length; i++) {
        //alert(array[i][property]+'-'+value)
        if (array[i][property] == value) {
            index = i;
            return index;
        }
    }
    return index;
}

function verificaAcciones(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_USUARIO'));
    var count=ids.split(",");
    if(count.length>0 && ids!=""){
        if(count.length==1){
            $("#btn_Update").removeClass("disabled");
        }else{
            $("#btn_Update").addClass("disabled");
        }
        $("#btn_Delete").removeClass("disabled");
    }else{
        $("#btn_Update").addClass("disabled");
        $("#btn_Delete").addClass("disabled");
    }
}

function accionEnter(valor,control){
    if (valor) {//Si el usuario Presiono Enter= True
         control.value = redondea(control.value, Ndecimal);
         //var p_venta=parseFloat(control.value);
         //var p_venta=control.value;
         //actualizaGridPrecioTienda(control,p_venta)
    }
}

function fun_limpiarUser(){
    $('#txt_dni').val('');
    $('#txt_nombre').val('');
    $('#txt_apellido').val('');
    $('#txt_direccion').val('');
    $('#txt_telefono').val('');
    $('#dtp_fec_nacimiento').val('01-01-2015');
    $('#txt_contacto').val('');
    $('#txt_correo').val('');
    $('#txt_usuario').val('');
    $('#txt_password').val('');
    $('#txt_confirma').val('');
    $("#cmb_genero option[value=1]").attr("selected",true);
    $("#cmb_estado option[value=1]").attr("selected",true);
}

function fun_GuardarUser(accion) {
    if (validateForm(accion)) {
        var ID = (accion == "Update") ? $('#txth_PER_ID').val() : 0;
        var link = $('#txth_controlador').val() + "/Save";
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: link,
            data: {
                "DATA": objetoPersona(ID),
                "ACCION": accion
            },
            success: function (data) {
                if (data.status == "OK") {
                    $("#messageInfo").html(data.message + buttonAlert);
                    alerMessage();
                    fun_limpiarUser();
                } else {
                    $("#messageInfo").html(data.message + buttonAlert);
                    alerMessage();
                }
            },
        });
    }

}

function objetoPersona(ID){
    var persona=new Object();
    persona.perId=ID;
    persona.dperId= ($('#txth_DPER_ID').val() != "") ? $('#txth_DPER_ID').val() : 0;
    persona.dni=$('#txt_dni').val();
    persona.nombre=$('#txt_nombre').val();
    persona.apellido=$('#txt_apellido').val();
    persona.direccion=$('#txt_direccion').val();
    persona.telefono=$('#txt_telefono').val();
    persona.fec_nac=$('#dtp_fec_nacimiento').val();
    persona.contacto=$('#txt_contacto').val();
    persona.usuario=$('#txt_usuario').val();
    persona.password=$('#txt_password').val();
    persona.confirma=$('#txt_confirma').val();
    persona.correo=$('#txt_correo').val();
    persona.genero=$('#cmb_genero option:selected').val();
    persona.estado=$('#cmb_estado option:selected').val();
    sessionStorage.tienda = JSON.stringify(persona);
    return JSON.stringify(persona);
}

function validateForm(accion) {
    var result = true;
    var message = '';
//    if ($('#cmb_cliente option:selected').val()==0) {
//        message += 'Seleccionar Cliente,\n ';
//        result = false;
//    }
//    if ($('#cmb_dia_ini option:selected').val()==0) {
//        message += 'Seleccionar día inicio,\n ';
//        result = false;
//    }
//    if ($('#cmb_dia_fin option:selected').val()==0) {
//        message += 'Seleccionar día de fin,\n ';
//        result = false;
//    }
    if ($('#txt_dni').val().length==0) {
        message += 'Dni,\n ';
        result = false;
    }
    if ($('#txt_nombre').val().length==0) {
        message += 'Nombre,\n ';
        result = false;
    }
    if ($('#txt_apellido').val().length==0) {
        message += 'Apellido,\n ';
        result = false;
    }
    if ($('#txt_direccion').val().length==0) {
        message += 'Dirección,\n ';
        result = false;
    }
    if ($('#txt_telefono').val().length==0) {
        message += 'Teléfono,\n ';
        result = false;
    }
    if ($('#txt_correo').val().length==0) {
        message += 'Correo,\n ';
        result = false;
    }
    if ($('#txt_contacto').val().length==0) {
        message += 'Contacto,\n ';
        result = false;
    }
    
    if (accion == "Create") {
        if ($('#txt_usuario').val().length == 0) {
            message += 'Usuario,\n ';
            result = false;
        }
        if ($('#txt_password').val().length == 0) {
            message += 'Contrasena,\n ';
            result = false;
        }
        if ($('#txt_confirma').val().length == 0) {
            message += 'Confirmar contrasena,\n ';
            result = false;
        }
//        alert($('#txt_confirma').val()+' '+$('#txt_password').val());
//        if ($('#txt_confirma').val() == $('#txt_password').val()) {
//            message += 'La Contraseña no es igual,\n ';
//            result = false;
//        }
    }

  
    //alert(message);
    if (result) {
        return result;
    } else {
        $("#messageInfo").html(message + buttonAlert);
        alerMessage();
        return result;
    }
}


function fun_Update(){
    var link="";
    var id = base64_encode(String($.fn.yiiGridView.getSelection('TbG_USUARIO')));
    var count=id.split(",");
    if(count.length==1 && id!=""){
        link=$('#txth_controlador').val()+"/Update?";
        $('#btn_Update').attr("href", link+"id="+id); 
    }
}

function loadDataUpdate(){
        mostrarPersona(varData);
}
function mostrarPersona(Data){
    $('#txt_dni').val(Data['PER_CED_RUC']);
    $('#txt_nombre').val(Data['PER_NOMBRE']);
    $('#txt_apellido').val(Data['PER_APELLIDO']);
    $('#txt_direccion').val(Data['DPER_DIRECCION']);
    $('#txt_telefono').val(Data['DPER_TELEFONO']);
    $('#dtp_fec_nacimiento').val(Data['PER_FEC_NACIMIENTO']);
    $('#txt_contacto').val(Data['DPER_CONTACTO']);
    $('#txt_usuario').val(Data['USU_NOMBRE']);
    $('#txt_password').val(Data['PASS']);
    $('#txt_confirma').val(Data['PASS']);
    $('#txt_correo').val(Data['USU_CORREO']);
    $("#cmb_genero option[value="+Data['PER_GENERO']+"]").attr("selected",true);
    $("#cmb_estado option[value="+Data['PER_EST_LOG']+"]").attr("selected",true);
}

function fun_Delete(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_USUARIO'));
    var count=ids.split(",");
    if(count.length>0 && ids!=""){
        if(!confirm(mgEliminar)) return false;
        var link=$('#txth_controlador').val()+"/Delete";
        //var encodedIds = base64_encode(ids);  //Verificar cofificacion Base
        $.ajax({
            type: 'POST',
            url: link,
            data:{
                "ids": ids
            } ,
            success: function(data){
                if (data.status=="OK"){ 
                    $("#messageInfo").html(data.message+buttonAlert); 
                    alerMessage();
                    actualizarTbG_USUARIO();
                }
            },
            dataType: "json"
        });
    }
    return true;
}

function fun_DeleteUserTie(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_USUARIO'));
    var count=ids.split(",");
    if(count.length>0 && ids!=""){
        if(!confirm(mgEliminar)) return false;
        var link=$('#txth_controlador').val()+"/DeleteUserTie";
        //var encodedIds = base64_encode(ids);  //Verificar cofificacion Base
        $.ajax({
            type: 'POST',
            url: link,
            data:{
                "ids": ids
            } ,
            success: function(data){
                if (data.status=="OK"){ 
                    $("#messageInfo").html(data.message+buttonAlert); 
                    alerMessage();
                    actualizarTbG_USUARIO();
                }
            },
            dataType: "json"
        });
    }
    return true;
}

function actualizarTbG_USUARIO(){
    $.fn.yiiGridView.update('TbG_USUARIO');
    /*var link=$('#txth_controlador').val()+"/Index";
    $.fn.yiiGridView.update('TbG_COMPANIA', {
        type: 'POST',
        url:link,
        data:{
            //"CONT_BUSCAR": controlBuscarIndex(control,op)
        }
    }); */
}

function mostrarListaTienda(ids) {
    if (ids > 0) {
        var link=$('#txth_controlador').val()+"/ClienteTienda";
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: link,
            data: {
                "DATA": ids,
            },
            success: function (data) {
                var str='<option value="0">Seleccionar</option>';
                if (data.length>0){
                    for (var i = 0; i < data.length; i++) {
                        str+='<option value="'+data[i]['TIE_ID']+'">'+data[i]['TIE_NOMBRE']+'</option>';
                    }
                }
                $("#cmb_tienda").html(str);
            },
        });
    }

}


/******************   GRID BUSCAR ITEMS  ******************/

function autocompletarBuscarUser(request, response, control, op) {
    var link = $('#txth_controlador').val() + "/BuscarUsuario";
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link,
        data: {
            valor: $('#' + control).val(),
            op: op
        },
        success: function (data) {
            var arrayList = new Array;
            var count = data.length;
            for (var i = 0; i < count; i++) {
                var row = new Object();
                row.Ids = data[i]['Ids'];
                row.Nombre = data[i]['Nombre'];

                // Campos Importandes relacionados con el  CJuiAutoComplete
                row.id = data[i]['Ids'];
                row.label = data[i]['Nombre'];
                row.value = data[i]['Nombre'];//lo que se almacena en en la caja de texto
                arrayList[i] = row;
            }
            sessionStorage.src_buscUsuario = JSON.stringify(arrayList);//dss=>DataSessionStore
            response(arrayList);
        }
    })
}

/****************AGREGAR USUARIO TIENDA***********/

function fun_agregarUserTienda(accion) {
    if ($('#cmb_cliente option:selected').val() > 0) {
        if ($('#cmb_tienda option:selected').val() > 0) {
            if ($('#cmb_rol option:selected').val() > 0 && $('#txt_nombreUser').val().length != 0) {
                //var ID = (accion == "Update") ? $('#txth_TIE_ID').val() : 0;
                var link = $('#txth_controlador').val() + "/SaveUserTie";
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: link,
                    data: {
                        "DATA": objetoUsuarioTie(),
                        "ACCION": accion
                    },
                    success: function (data) {
                        if (data.status == "OK") {
                            $("#messageInfo").html(data.message + buttonAlert);
                            alerMessage();
                            $.fn.yiiGridView.update('TbG_USUARIO');
                        } else {
                            $("#messageInfo").html(data.message + buttonAlert);
                            alerMessage();
                        }
                    },
                });

            } else {
                alert('Seleccionar Rol y Usuario');
            }
        } else {
            alert('Seleccionar Tienda');
        }
    } else {
        alert('Seleccionar Cliente');
    }
}

function objetoUsuarioTie(){
    var data=new Object();
    data.CLI=$('#cmb_cliente option:selected').val();
    data.TIE=$('#cmb_tienda option:selected').val();
    data.ROL=$('#cmb_rol option:selected').val();
    var valor=$('#txt_nombreUser').val();
    var Grid=JSON.parse(sessionStorage.src_buscUsuario)
    var ind=retornarIndexArray(Grid, 'Nombre', valor)
    data.IDS=Grid[ind]['Ids'];
    return JSON.stringify(data);
}

/************** BUSCAR USUARIO TIENDA **************/
function fun_buscarDataUseTie(op){ 
    var link=$('#txth_controlador').val()+"/usertienda";
    $.fn.yiiGridView.update('TbG_USUARIO', {
        type: 'POST',
        url:link,
        data:{
            "CONT_BUSCAR": controlBuscarUseTie(op)
        }
    }); 
}

function controlBuscarUseTie(op){
    //var buscarArray = new Array();
    var buscarIndex=new Object();
    buscarIndex.OP=op;
    buscarIndex.TIE_ID=$('#cmb_tienda option:selected').val();
    buscarIndex.CLI_ID=$('#cmb_cliente option:selected').val();
    buscarIndex.ROL_ID=$('#cmb_rol option:selected').val();
    //buscarArray[0] = buscarIndex;
    return JSON.stringify(buscarIndex);
}

function fun_CambiaPass() {
    var pass = $('#txt_password').val();
    if ($('#txt_confirma').val()==pass) {
        pass = base64_encode(pass);
        var link = $('#txth_controlador').val() + "/Contrasena";
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: link,
            data: {
                "DATA": pass,
            },
            success: function (data) {
                if (data.status == "OK") {
                    $("#messageInfo").html(data.message + buttonAlert);
                    alerMessage();
                } else {
                    $("#messageInfo").html(data.message + buttonAlert);
                    alerMessage();
                }
            },
        });
    }else{
        alert('Los Datos No son Iguales');
    }

}