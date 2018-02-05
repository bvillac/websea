/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function guardarListaPedido(accion) {
    //alert("ingreso");
    //"DTS_LISTA": (accion == "Create") ? listaPedido() : listaPedidoDetTemp(),
    //var ID = (accion == "Update") ? $('#txth_PedID').val() : 0;
    accion ="Update";
    //var tieId = (accion == "Create") ? $('#cmb_tienda option:selected').val() : ID;//Cuando Es Actualizacion Retorno el Id Cabecera
    var link = $('#txth_controlador').val() + "/Save";
    $.ajax({
        type: 'POST',
        url: link,
        data: {
            "DTS_LISTA": listaPedidoDetTemp(),
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



function listaPedidoDetTemp() {
    var TbGtable = 'TbG_DOCUMENTO';
    var arrayList = new Array;
    var i = -1;
    $('#' + TbGtable + ' tr').each(function () {
        var idstable = $(this).find("td").eq(1).html();
        //alert(idstable);
        if (idstable != '') {
            //var obserData = parseFloat($(this).find("td").eq(10).html());
            //alert($('#txt_obs_' + idstable).val());
            if ($('#txt_obs_' + idstable).val() != '') {
                i += 1;
                var rowGrid = new Object();
                rowGrid.DetId = idstable;
                rowGrid.OBSERV = $('#txt_obs_' + idstable).val();
                arrayList[i] = rowGrid;
                
            }

        }
    });

    return JSON.stringify(arrayList);
}



