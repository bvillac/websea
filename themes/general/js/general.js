/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var t_show=0;
var t_hide=5000;
var t_transi=1500;
var buttonAlert='<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>';
var selecDoc='Seleccionar documento para autorizar';
var selecDocAnu='Seleccionar documento para Anular';
var selecDocMail='Seleccionar documento para Reenviar';
var mgEliminar='Está seguro que desea Eliminar estos Item';
var mgEnvDocum='Está seguro que desea Enviar estos Documentos';
var mgEnvDocumAnu='Está seguro que desea Anular estos Documentos';

function alerMessage(){
    setTimeout(function() {$("#messageInfo").fadeIn(t_transi);},t_show);
    setTimeout(function() {$("#messageInfo").fadeOut(t_transi);},t_hide);
}

function nuevoItem(){
    //var link=$('#txth_controlador').val()+"/_boxDetalle?popup=content"; 
    //'data-toggle'=>'modal',
    //'data-target'=>'#myModal',
    //$("#btn_add").addClass("lightboxTd");
    //$('#btn_add').attr("href", "#boxDetalle");
    //$('#btn_add').attr("href", link+"&acc=new&id=0");
//limpiarItems();
}


