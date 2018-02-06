/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function guardarListaPedido(accion) {
        if (!confirm(mgEnvDocum)) return false;
        //alert(ids);
        accion = "Update"; 
        var tipRec=$('#lbl_tip').text();
        var link = $('#txth_controlador').val() + "/Save";
        $.ajax({
            type: 'POST',
            url: link,
            data: {
                "DTS_LISTA": listaPedidoDetTemp(tipRec),
                "TIP_REC":tipRec,
                "ACCION": accion
            },
            success: function (data) {
                if (data.status == "OK") {
                    $("#messageInfo").html(data.message + buttonAlert);
                    //$('#lbl_pedido').text(data.documento);
                    alerMessage();
                } else {
                    $("#messageInfo").html(data.message + buttonAlert);
                    //$('#lbl_pedido').text('');
                    alerMessage();
                }
            },
            dataType: "json"
        });
    


}





function listaPedidoDetTemp(tipRec) {
    var TbGtable = 'TbG_DOCUMENTO';
    var arrayList = new Array;
    var i = 0;
    $('#' + TbGtable + ' tr').each(function () {
        var idstable = $(this).find("td").eq(1).html();
        //alert(idstable);
        if (idstable != '') {
            //var obserData = parseFloat($(this).find("td").eq(10).html());
            //alert($('#txt_obs_' + idstable).val());
            if ($(this).children(':first-child').children(':first-child').is(':checked')){
                //alert(idstable+"check")
                if(typeof(idstable)!='undefined'){
                    var rowGrid = new Object();
                    rowGrid.DetId = idstable;
                    if(tipRec=="CH"){
                        rowGrid.N_CHE = ($('#txt_num_' + idstable).val() != "") ? $('#txt_num_' + idstable).val() : 0;
                        rowGrid.V_CHE = ($('#txt_val_' + idstable).val() != "") ? $('#txt_val_' + idstable).val() : 0;
                    }
                    rowGrid.OBSERV = $('#txt_obs_' + idstable).val();
                    arrayList[i] = rowGrid;
                    i+=1;
                }
               
                
            }

        }
    });

    return JSON.stringify(arrayList);
}

function buscarDataIndex(control,op){ 
    control=(control=='')?'txt_PER_CEDULA':control;
    var link=$('#txth_controlador').val()+"/Index";
    //var link=$('#txth_controlador').val()+"/BuscaDataIndex";
    $.fn.yiiGridView.update('TbG_DOCUMENTO', {
        type: 'POST',
        url:link,
        data:{
            "CONT_BUSCAR": controlBuscarIndex(control,op)
        }
    }); 
}

function controlBuscarIndex(control,op){
    var buscarArray = new Array();
    var buscarIndex=new Object();
//    if(sessionStorage.src_buscIndex){
//        var arrayList = JSON.parse(sessionStorage.src_buscIndex);
//        buscarIndex.CEDULA=retornarIndLista(arrayList,'RazonSocialComprador',$('#'+control).val(),'IdentificacionComprador');
//    }else{
//        buscarIndex.CEDULA='';
//    }
    buscarIndex.OP=op;
    //buscarIndex.TIPO_APR=$('#cmb_tipoApr option:selected').val();
    //buscarIndex.RAZONSOCIAL=$('#'+control).val(),
   
    buscarIndex.F_INI=$('#dtp_fec_ini').val();
    buscarIndex.F_FIN=$('#dtp_fec_fin').val();
    buscarArray[0] = buscarIndex;
    return JSON.stringify(buscarArray);
}

