/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function fun_GuardarConfig(accion){
    //var ID=(accion=="Update")?$('#txth_IdCompania').val():0;
    var ID='1';
    var link=$('#txth_controlador').val()+"/Save";
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link,
        data:{
            "SERVER":objServidor(ID),
            "ACCION": accion
        },
        success: function(data){
            if (data.status=="OK"){ 
                $("#messageInfo").html(data.message+buttonAlert); 
            }else{
                $("#messageInfo").html(data.message+buttonAlert); 
            }
            alerMessage();
        },
    });
}

function objServidor(ID){
    var serArray = new Array();
    var objEnt=new Object();
    objEnt.Id=ID;
    objEnt.IDCompania=ID;
    objEnt.Mail=$('#txt_Mail').val();
    objEnt.NombreMostrar=$('#txt_NombreMostrar').val();
    objEnt.Asunto=$('#txta_Asunto').val();
    objEnt.Cuerpo=$('#txta_Cuerpo').val();
    objEnt.EsHtml=($("#chk_EsHtml").prop("checked"))?1:0;
    objEnt.Clave=$('#txt_Clave').val();
    objEnt.Usuario=$('#txt_Usuario').val();
    objEnt.SMTPServidor=$('#txt_SMTPServidor').val();
    objEnt.SMTPPuerto=$('#txt_SMTPPuerto').val();
    objEnt.TiempoRespuesta=$('#txt_TiempoRespuesta').val();
    objEnt.TiempoEspera=$('#txt_TiempoEspera').val();
    objEnt.ServidorAcuse=$('#txt_ServidorAcuse').val();
    objEnt.ActivarAcuse=($("#chk_ActivarAcuse").prop("checked"))?1:0;//$('#chk_ActivarAcuse').val();
    objEnt.CCO=$('#txt_CCO').val();
    objEnt.Estado='1';
    
    serArray[0] = objEnt;
    //sessionStorage.servidor = JSON.stringify(serArray);
    return JSON.stringify(serArray);
}

function loadDataUpdate(){
        mostrarServer(varData);
        //sessionStorage.detalleGrid = JSON.stringify(arr_detalleGrid);
}

function mostrarServer(Data){
    $('#txt_Mail').val(Data[0]['Mail']);
    $('#txt_NombreMostrar').val(Data[0]['NombreMostrar']);
    $('#txta_Asunto').val(Data[0]['Asunto']);
    $('#txta_Cuerpo').val(Data[0]['Cuerpo']);
    $("#chk_EsHtml").prop("checked",(Data[0]['EsHtml']=='1')?true:false);
    $('#txt_Clave').val(Data[0]['Clave']);
    $('#txt_Usuario').val(Data[0]['Usuario']);
    $('#txt_SMTPServidor').val(Data[0]['SMTPServidor']);
    $('#txt_SMTPPuerto').val(Data[0]['SMTPPuerto']);
    $('#txt_TiempoRespuesta').val(Data[0]['TiempoRespuesta']);
    $('#txt_TiempoEspera').val(Data[0]['TiempoEspera']);
    $('#txt_ServidorAcuse').val(Data[0]['ServidorAcuse']);
    $("#chk_ActivarAcuse").prop("checked",(Data[0]['ActivarAcuse']=='1')?true:false);
    $('#txt_CCO').val(Data[0]['CCO']);
}

function fun_limpiarServer(){
    $('#txt_Mail').val('');
    $('#txt_NombreMostrar').val('');
    $('#txta_Asunto').val('');
    $('#txta_Cuerpo').val('');
    $("#chk_EsHtml").prop("checked",false);
    $('#txt_Clave').val('');
    $('#txt_Usuario').val('');
    $('#txt_SMTPServidor').val('');
    $('#txt_SMTPPuerto').val('');
    $('#txt_TiempoRespuesta').val('');
    $('#txt_TiempoEspera').val('');
    $('#txt_ServidorAcuse').val('');
    $("#chk_ActivarAcuse").prop("checked",false);
    $('#txt_CCO').val('');
}

/*
 * CONFIGURACION DE WEB SRI
 */

function loadDataUpdateSri(){
        mostrarWebSri(varDataSri);
        //sessionStorage.detalleGrid = JSON.stringify(arr_detalleGrid);
}

function mostrarWebSri(Data){
    $("#cmb_Ambiente option[value="+Data[0]['Ambiente']+"]").attr("selected",true);
    $('#txt_Recepcion').val(Data[0]['Recepcion']);
    $('#txt_Autorizacion').val(Data[0]['Autorizacion']);
    $('#txt_RecepcionLote').val(Data[0]['RecepcionLote']);
    $('#txt_TiempoRespuesta').val(Data[0]['TiempoRespuesta']);
    $('#txt_TiempoSincronizacion').val(Data[0]['TiempoSincronizacion']);
}

function fun_GuardarWebSri(accion){
    //var ID=(accion=="Update")?$('#txth_IdCompania').val():0;
    var ID='1';
    var link=$('#txth_controlador').val()+"/SaveSri";
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link,
        data:{
            "SERVER":objWebSri(ID),
            "ACCION": accion
        },
        success: function(data){
            if (data.status=="OK"){ 
                $("#messageInfo").html(data.message+buttonAlert); 
            }else{
                $("#messageInfo").html(data.message+buttonAlert); 
            }
            alerMessage();
        },
    });
}

function objWebSri(ID){
    var serArray = new Array();
    var objEnt=new Object();
    objEnt.Id=ID;
    objEnt.IdCompania=ID;
    objEnt.Ambiente=$('#cmb_Ambiente option:selected').val();
    objEnt.Recepcion=$('#txt_Recepcion').val();
    objEnt.Autorizacion=$('#txt_Autorizacion').val();
    objEnt.RecepcionLote=$('#txt_RecepcionLote').val();
    objEnt.TiempoRespuesta=$('#txt_TiempoRespuesta').val();
    objEnt.TiempoSincronizacion=$('#txt_TiempoSincronizacion').val();
    objEnt.Estado='1';

    serArray[0] = objEnt;
    //sessionStorage.servidor = JSON.stringify(serArray);
    return JSON.stringify(serArray);
}
/*
 * CONFIGURACION DE CLAVES
 */
function fun_Procesar(){
    
}
