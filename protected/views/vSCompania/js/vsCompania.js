/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function fun_Nuevo(accion){
    //alert(accion);
    var link="";
    link=$('#txth_controlador').val()+"/create";
    //alert(link)
    $('#btn_nuevo').attr("href", link);
    /*link=$('#txth_controlador').val()+"/Update?";
    $('#btn_Update').attr("href", link+"id="+id);
    var id = String($.fn.yiiGridView.getSelection('TbG_DESCARGO_ORDEN_PRIN'));
    var count=id.split(",");
    if(count.length==1 && id!=""){
        //sessionStorage.accion="update";
        sessionStorage.removeItem('detalleGrid')
        sessionStorage.removeItem('dataList')
        sessionStorage.removeItem('arrayList')
        sessionStorage.removeItem('dataListAfiliado')
        sessionStorage.removeItem('dataListDoctor')
        sessionStorage.removeItem('cabOrden')
        
        link=$('#txth_controlador').val()+"/Update?";
        $('#btn_Update').attr("href", link+"id="+id); 
    }*/
}

function verificaAcciones(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_COMPANIA'));
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

function fun_limpiarEmpresa(){
    $('#txt_RUC').val('');
    $('#txt_RazonSocial').val('');
    $('#txt_NombreComercial').val('');
    $('#txt_Mail').val('');
    $('#txt_ContribuyenteEspecial').val('');
    $('#txt_DireccionMatriz').val('');
    
    $('#txt_Telefono').val('');
    $('#txt_CorreoElectonico').val('');
    $('#txt_CorreoContador').val('');
    $('#txt_Moneda').val('');
    $('#txt_Website').val('');
    
    $('#cmb_Ambiente').val(1);
    $('#cmb_TipoEmision').val(1);
    $('#cmb_ObligadoContabilidad').val(1);

    $('#txt_Clave').val('');
    $('#txt_conf_clave').val('');
    $('#txt_RutaFirma').val(''); 
    $('#archivo').val('');//label del archivo
}

function fun_GuardarEmpresa(accion){
    var ID=(accion=="Update")?$('#txth_IdCompania').val():0;
    var link=$('#txth_controlador').val()+"/Save";
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link,
        data:{
            "EMPRESA":objetoEmpresa(ID),
            //"DET_ORDEN":sessionStorage.detalleGrid,
            "ACCION": accion
        },
        success: function(data){
            if (data.status=="OK"){ 
                //$.fn.yiiGridView.update(idGrid);
                //showResponse(data.type, data.status, data.label, data.message);
                $("#messageInfo").html(data.message+buttonAlert); 
            }else{
                //showResponse(data.type, data.status, data.label, data.message);
                $("#messageInfo").html(data.message+buttonAlert); 
            }
            alerMessage();
        },
    });
}

function objetoEmpresa(ID){
    var empArray = new Array();
    var empresa=new Object();
    empresa.IdCompania=ID;
    empresa.Ruc=$('#txt_RUC').val();
    empresa.RazonSocial=$('#txt_RazonSocial').val();
    empresa.NombreComercial=$('#txt_NombreComercial').val();
    empresa.Mail=$('#txt_Mail').val();
    empresa.DireccionMatriz=$('#txt_DireccionMatriz').val();
    empresa.Telefono=$('#txt_Telefono').val();
    empresa.CorreoElectonico=$('#txt_CorreoElectonico').val();
    empresa.CorreoContador=$('#txt_CorreoContador').val();
    empresa.Moneda=$('#txt_Moneda').val();
    empresa.Website=$('#txt_Website').val();
    
    empresa.Ambiente = $('#cmb_Ambiente option:selected').val();
    empresa.TipoEmision = $('#cmb_TipoEmision option:selected').val();
    empresa.ObligadoContabilidad = $('#cmb_ObligadoContabilidad option:selected').val();
    empresa.EsContribuyente=$('#txt_ContribuyenteEspecial').val();
    
    //DATOS DE FIRMA 
    empresa.Clave=$('#txt_Clave').val();
    empresa.conf_clave=$('#txt_conf_clave').val();
    empresa.RutaFirma=$('#txt_RutaFirma').val(); 
    empresa.FechaCaducidad='';
    empresa.EmpresaCertificadora='';
    empresa.Estado='1';
    empArray[0] = empresa;
    sessionStorage.empresa = JSON.stringify(empArray);
    return JSON.stringify(empArray);
}

function mostrarEmpresa(Data){ 
    $('#txt_RUC').val(Data[0]['Ruc']);
    $('#txt_RazonSocial').val(Data[0]['RazonSocial']);
    $('#txt_NombreComercial').val(Data[0]['NombreComercial']);
    $('#txt_Mail').val(Data[0]['Correo']);
    $('#txt_ContribuyenteEspecial').val(Data[0]['EsContribuyente']);
    $('#txt_DireccionMatriz').val(Data[0]['DireccionMatriz']);
    
    $('#txt_Telefono').val(Data[0]['Telefono']);
    $('#txt_Moneda').val(Data[0]['Moneda']);
    $('#txt_Website').val(Data[0]['Website']);
    $('#txt_CorreoContador').val(Data[0]['CorreoContador']);
    $('#txt_CorreoElectonico').val(Data[0]['CorreoDigital']);
    
    $('#cmb_Ambiente').val((Data[0]['Ambiente']!=null)?Data[0]['Ambiente']:'1');
    $('#cmb_TipoEmision').val((Data[0]['TipoEmision']!=null)?Data[0]['TipoEmision']:'1');
    $('#cmb_ObligadoContabilidad').val((Data[0]['ObligadoContabilidad']!=null)?Data[0]['ObligadoContabilidad']:'1');
    
    
    //$('#txt_Clave').val(varData[0]['Clave']);
    //$('#txt_conf_clave').val(varData[0]['EMP_ID']);
    $('#txt_RutaFirma').val(Data[0]['RutaFirma']);
    
}

function fun_Delete(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_COMPANIA'));
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
                    actualizarTbG_COMPANIA();
                }
            },
            dataType: "json"
        });
    }
    return true;
}

function actualizarTbG_COMPANIA(){
    $.fn.yiiGridView.update('TbG_COMPANIA');
    /*var link=$('#txth_controlador').val()+"/Index";
    $.fn.yiiGridView.update('TbG_COMPANIA', {
        type: 'POST',
        url:link,
        data:{
            //"CONT_BUSCAR": controlBuscarIndex(control,op)
        }
    }); */
}

function fun_Update(){
    var link="";
    var id = String($.fn.yiiGridView.getSelection('TbG_COMPANIA'));
    var count=id.split(",");
    if(count.length==1 && id!=""){
        //sessionStorage.accion="update";
        //sessionStorage.removeItem('detalleGrid')
        link=$('#txth_controlador').val()+"/Update?";
        $('#btn_Update').attr("href", link+"id="+id); 
    }
}

function loadDataUpdate(){
        mostrarEmpresa(varData);
        //sessionStorage.detalleGrid = JSON.stringify(arr_detalleGrid);
}


