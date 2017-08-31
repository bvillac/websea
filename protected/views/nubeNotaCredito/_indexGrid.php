<?php
/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-09-24
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
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
    'columns' => array(
        array(
            'id' => 'chkId',
            'class' => 'CCheckBoxColumn',
            //'cssClassExpression' => '($data["Estado"]=="2")?"disabled":""',
            'disabled' => '($data["Estado"]=="2")?true:false',
        ),
        /* array(
          'header' => '#',
          'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
          ), */
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
            'header' => Yii::t('COMPANIA', 'Download'),
            'class' => 'CButtonColumn',
            'htmlOptions' => array('style' => 'text-align:center', 'width' => '85px'),
            //'template' => '{pdf}{xml}{xsd}',
            'template' => '{pdf}{xml}',
            'buttons' => array(
                'pdf' => array(
                    'label' => Yii::t('COMPANIA', 'Download PDF document'),
                    'imageUrl' => Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'] . 'pdf.png', //ruta del icono
                    'url' => 'Yii::app()->createUrl("NubeNotaCredito/GenerarPdf", array("ids"=>base64_encode($data["IdDoc"])))',
                    'options' => array(
                        "title" => Yii::t('COMPANIA', 'Download PDF document'),
                        "target" => "_blank",
                    ),
                //'url'=>'Yii::app()->createUrl("vSDocumentos/GenerarPdf")',
                //'click' => 'js:generarPdf(this,$data["IdDoc"])',
                ),
                'xml' => array(
                    'label' => Yii::t('COMPANIA', 'Download XML document'),
                    'imageUrl' => Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'] . 'xml.png', //ruta del icono
                    'url' => 'Yii::app()->createUrl("NubeNotaCredito/XmlAutorizado", array("ids"=>base64_encode($data["IdDoc"])))',
                    'options' => array(
                        "title" => Yii::t('COMPANIA', 'Download XML document'),
                        "target" => "_blank",
                    ),
                ),
            //'xsd' => array(
            //    'label' => Yii::t('COMPANIA', 'Download XSD document'),
            //    'imageUrl'=>Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'].'xsd.png', //ruta del icono
            //'click' => 'js:obtenerSeleccion',
            //'click'=>'function(){$("#dialog_id").dialog("open"); return false;}',
            //),
            ),
        ),
        array(
            'name' => 'Estado',
            'header' => Yii::t('COMPANIA', 'Status'),
            'value' => 'VSacceso::estadoAprobacion($data["Estado"])',
        ),
//        array(
//            'name' => 'CodigoTransaccionERP',
//            'header' => Yii::t('COMPANIA', 'Document type'),
//            'value' => '$data["CodigoTransaccionERP"]',
//        ),
//        array(
//            'name' => 'NombreDocumento',
//            'header' => Yii::t('COMPANIA', 'Document type'),
//            'value' => '$data["NombreDocumento"]',
//        ),
        array(
            'name' => 'NumDocumento',
            'header' => Yii::t('COMPANIA', 'Document Number'),
            'htmlOptions' => array('style' => 'text-align:center'),
            'value' => '$data["NumDocumento"]',
        ),
        array(
            'name' => 'FechaEmision',
            'header' => Yii::t('COMPANIA', 'Issuance date'),
            'value' => 'date(Yii::app()->params["datebydefault"],strtotime($data["FechaEmision"]))',
        ),
        array(
            'name' => 'UsuarioCreador',
            'header' => Yii::t('COMPANIA', 'Serving'),
            'value' => '$data["UsuarioCreador"]',
            'htmlOptions' => array('style' => 'text-align:center'),
        ),
        array(
            'name' => 'FechaAutorizacion',
            'header' => Yii::t('COMPANIA', 'Authorization date'),
            'value' => '($data["FechaAutorizacion"]<>"")?date(Yii::app()->params["datebydefault"],strtotime($data["FechaAutorizacion"])):"";',
        ),
//        array(
//            'name' => 'AutorizacionSRI',
//            'header' => Yii::t('COMPANIA', 'Authorization number SRI'),
//            'value' => '$data["AutorizacionSRI"]',
//        ),
//        array(
//            'name' => 'NumDocumento',
//            'header' => Yii::t('COMPANIA', 'NumDocumento'),
//            'value' => '$data["NumDocumento"]',
//        ),
        array(
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
            'name' => 'ValorModificacion',
            'header' => Yii::t('COMPANIA', 'Total amount'),
            //'value' => '$data["ImporteTotal"]',
            'value' => 'Yii::app()->format->formatNumber($data["ValorModificacion"])',
            'htmlOptions' => array('style' => 'text-align:right', 'width' => '8px'),
        ),

    ),
));
?>
