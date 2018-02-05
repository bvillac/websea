<?php
/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-09-24
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
//SELECT A.IDS_REC IdDoc,A.TIP_REC Estado,CONCAT(B.NOM_RUT,' ',B.DETALLE) NOM_RUT,
//                CONCAT(C.MAR_VEH,' ',C.MOD_VEH) MAR_VEH,D.NOM_CON,A.TOT_BUL,A.FEC_CRE,A.EST_ENT
?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'TbG_DOCUMENTO',
    'dataProvider' => $model,
    //'template' => "{items}{pager}",
    'template' => '<div style="overflow:auto;">{items}</div>{pager}{summary}',
    'htmlOptions' => array('style' => 'cursor: pointer;'),
    //'selectableRows' => 2,
    'selectionChanged' => 'verificaAcciones',
    'beforeAjaxUpdate'=>'function(id,options){ options.type="POST";options.data = {  "CONT_BUSCAR": controlBuscarIndex("txt_PER_CEDULA","") } }',
    //'selectionChanged' => 'fun_mostrarFichaPaciente',
    //'ajaxUrl'=>'Yii::app()->controller->createUrl("cOBRANZAS/", array("importarAfiliado" => $this->grid->dataProvider->pagination->currentPage+1))',
    //'summaryText'=>"<div class='whitesec_search'><p>{count} Full Quality Videos</p></div>",
    //'afterAjaxUpdate' => 'dataPrueba' ,
    //'afterAjaxUpdate'=>'function(id, data){alert(data)}',
    //'beforeAjaxUpdate'=>'function(id,options){alert(unescape(options.url)) }',
    //'beforeAjaxUpdate'=>'function(id,options){ options["type"]="POST"; }',
    //'beforeAjaxUpdate' => 'function(id,options){consultFiltros(options)}',
    'columns' => array(
//        array(
//            'id' => 'chkId',
//            'class' => 'CCheckBoxColumn',
//            //'cssClassExpression' => '($data["Estado"]=="2")?"disabled":""',
//            'disabled' => '($data["Estado"]=="2")?true:false',
//        ),
        
        array(
            'name' => 'IdDoc',
            'header' => Yii::t('COMPANIA', 'IdDoc'),
            'value' => '$data["IdDoc"]',
            'header' => false,
            'filter' => false,
            'headerHtmlOptions' => array('style' => 'width:0px; display:none; border:none; textdecoration:none'),
            'htmlOptions' => array('style' => 'display:none; border:none;'),
        ),
        array(
            'header' => Yii::t('COMPANIA', 'Acción'),
            'class' => 'CButtonColumn',
            'htmlOptions' => array('style' => 'text-align:center', 'width' => '85px'),
            //'template' => '{pdf}{xml}{xsd}',
            'template' => '{pdf}',
            'buttons' => array(
                'pdf' => array(
                        'label' => Yii::t('COMPANIA', 'Ver Documento'),
                    'imageUrl' => Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'] . 'search.png', //ruta del icono
                    'url' => 'Yii::app()->createUrl("Recorrido/Documento", array("ids"=>base64_encode($data["IdDoc"])))',
                    'options' => array(
                        "title" => Yii::t('COMPANIA', 'Ver Documento'),
                        "target" => "_blank",
                    ),
                //'url'=>'Yii::app()->createUrl("vSDocumentos/GenerarPdf")',
                //'click' => 'js:generarPdf(this,$data["IdDoc"])',
                ),
               
//                'mailEdit' => array(
//                    'label' => Yii::t('COMPANIA', 'mail Edit'),
//                    'imageUrl' => Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'] . 'email-edit.png', //ruta del icono
//                    'url' => 'Yii::app()->createUrl("NubeFactura/XmlAutorizado", array("ids"=>base64_encode($data["IdDoc"])))',
//                ),
//                'mailSend' => array(
//                    'label' => Yii::t('COMPANIA', 'mail Send'),
//                    'imageUrl' => Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'] . 'mail-send.png', //ruta del icono
//                    //'url' => 'Yii::app()->createUrl("NubeFactura/XmlAutorizado", array("ids"=>base64_encode($data["IdDoc"])))',
//                    //'click' => 'js:fun_ReeEnviarDocumento()',
//                    'click' => 'function(){fun_ReeEnviarDocumento($data->IdDoc)}',
//                ),
            //'xsd' => array(
            //    'label' => Yii::t('COMPANIA', 'Download XSD document'),
            //    'imageUrl'=>Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'].'xsd.png', //ruta del icono
            //'click' => 'js:obtenerSeleccion',
            //'click'=>'function(){$("#dialog_id").dialog("open"); return false;}',
            //),
            ),
        ),

        array(
            'name' => 'IdDoc',
            'header' => Yii::t('COMPANIA', 'N_Pedido'),
            'value' => '$data["IdDoc"]',
        ),
        array(
            'name' => 'TIP_REC',
            'header' => Yii::t('COMPANIA', 'TR'),
            'value' => '$data["TIP_REC"]',
        ),
        array(
            'name' => 'NOM_RUT',
            'header' => Yii::t('COMPANIA', 'Ruta'),
            'htmlOptions' => array('style' => 'text-align:center'),
            'value' => '$data["NOM_RUT"]',
        ),
        array(
            'name' => 'MAR_VEH',
            'header' => Yii::t('COMPANIA', 'Vehiculo'),
            'htmlOptions' => array('style' => 'text-align:center'),
            'value' => '$data["MAR_VEH"]',
        ),
        array(
            'name' => 'NOM_CON',
            'header' => Yii::t('COMPANIA', 'CONDUCTOR'),
            'htmlOptions' => array('style' => 'text-align:center'),
            'value' => '$data["NOM_CON"]',
        ),
        array(
            'name' => 'FEC_CRE',
            'header' => Yii::t('COMPANIA', 'F.Recibido'),
            'value' => 'date(Yii::app()->params["datebydefault"],strtotime($data["FEC_CRE"]))',
        ),
        array(
            'name' => 'Estado',
            'header' => Yii::t('COMPANIA', 'Status'),
            'value' => '$data["Estado"]',      
        ),
        

        /*array(
            'name' => 'IdentificacionComprador',
            'header' => Yii::t('COMPANIA', 'Dni/Ruc'),
            'value' => '$data["IdentificacionComprador"]',
        ),
        array(
            'name' => 'RazonSocialComprador',
            'header' => Yii::t('COMPANIA', 'Company name'),
            //'htmlOptions' => array('style' => 'text-align:left', 'width' => '300px'),
            'value' => '$data["RazonSocialComprador"]',
        ),
        array(
            'name' => 'ImporteTotal',
            'header' => Yii::t('COMPANIA', 'Total amount'),
            //'value' => '$data["ImporteTotal"]',
            'value' => 'Yii::app()->format->formatNumber($data["ImporteTotal"])',
            'htmlOptions' => array('style' => 'text-align:right', 'width' => '8px'),
        ),*/
    /* array(
      'class' => 'CButtonColumn',
      'template' => '{add}{edit}{delete}',
      'htmlOptions' => array('style' => 'width: 50px'),
      'buttons' => array(
      'add' => array(
      //'imageUrl'=>Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'].'afiliado.png', //ruta del icono
      'label' => '',
      'imageUrl' => '', //ruta del icono
      'click' => 'function(){hola();}',
      //'url' => '$this->grid->controller->createUrl("/Extras/update", array("id"=>$data->id,"asDialog"=>1,"gridId"=>$this->grid->id))',
      //'visible' => '($data->id===null)?false:true;'
      'options' => array('class' => 'icon-add', 'rel' => 'tooltip'),
      ),
      'edit' => array(
      'label' => '',
      'imageUrl' => '', //ruta del icono
      'click' => 'function(){hola();}',
      'options' => array('class' => 'icon-edit', 'rel' => 'tooltip'),
      ),
      'delete' => array(
      'label' => '',
      'imageUrl' => '', //ruta del icono
      'click' => 'function(){hola();}',
      'options' => array('class' => 'icon-remove', 'rel' => 'tooltip'),
      ),
      ),
      ), */
    ),
));
?>
