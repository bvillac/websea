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
    'dataProvider' => $detFact,
    //'template' => "{items}{pager}",
    'template' => '<div style="overflow:auto;">{items}</div>{pager}{summary}',
    'htmlOptions' => array('style' => 'cursor: pointer;'),
    //'selectableRows' => 2,
    //'selectionChanged' => 'verificaAcciones',
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
        array(
            'id' => 'chkId',
            'class' => 'CCheckBoxColumn',
            //'cssClassExpression' => '($data["Estado"]=="2")?"disabled":""',
            //'disabled' => '($data["Estado"]=="2")?true:false',
        ),
        
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
            'name' => 'IdDoc',
            'header' => Yii::t('COMPANIA', 'N_Pedido'),
            'value' => '$data["IdDoc"]',
        ),
        array(
            'name' => 'TIP_REC',
            'header' => Yii::t('COMPANIA', 'TIP_REC'),
            'value' => '$data["TIP_REC"]',
        ),
        array(
            'name' => 'NOM_CLI',
            'header' => Yii::t('COMPANIA', 'CLIENTE'),
            'htmlOptions' => array('style' => 'text-align:left'),
            'value' => '$data["NOM_CLI"]',
        ),
        
        array(
            'name' => 'COD_VEN',
            'header' => Yii::t('COMPANIA', 'AT'),
            'htmlOptions' => array('style' => 'text-align:center'),
            'value' => '$data["COD_VEN"]',
        ),
        array(
            'name' => 'NUM_CHE',
            'header' => Yii::t('COMPANIA', 'N°CHE'),
            'value'=>'CHtml::textField("txt_num_".$data["IdDoc"],$data["NUM_CHE"], array('
                    . '"size" => 5, "maxlength" => 10,"placeholder" => "###",'
                    . '"class" => "validation_Vs",'
                    . '))',
            'type'=>'raw',
            'htmlOptions' => array('style' => 'text-align:left'),
        ),
        array(
            'name' => 'VAL_CHE',
            'header' => Yii::t('COMPANIA', 'V_CHEQ'),
            //'value' => '$data["ImporteTotal"]',
            //'value' => 'Yii::app()->format->formatNumber($data["VAL_CHE"])',
            'value'=>'CHtml::textField("txt_val_".$data["IdDoc"],$data["VAL_CHE"], array('
                    . '"size" => 5, "maxlength" => 10,"placeholder" => "0.00",'
                    . '"class" => "validation_Vs",'
                    . '))',
            'type'=>'raw',
            'htmlOptions' => array('style' => 'text-align:right'),
        ),
       
        array(
            'name' => 'FEC_REC',
            'header' => Yii::t('COMPANIA', 'F.Recibido'),
            'value' => 'date(Yii::app()->params["datebydefault"],strtotime($data["FEC_REC"]))',
        ),
        array(
            'name' => 'FEC_ENT',
            'header' => Yii::t('COMPANIA', 'F.Entrega'),
            'value' => 'date(Yii::app()->params["datebydefault"],strtotime($data["FEC_ENT"]))',
        ),
        array(
            'name' => 'Estado',
            'header' => Yii::t('COMPANIA', 'EST'),
            'value' => '$data["Estado"]',      
        ),
        array(
            'name' => 'Observacion',
            'header' => Yii::t('TIENDA', 'Observation'),
            'value'=>'CHtml::textField("txt_obs_".$data["IdDoc"],$data["OBSERV"], array('
                    . '"size" => 30, "maxlength" => 300,"placeholder" => "...",'
                    . '"class" => "validation_Vs",'
                    . '))',
            'type'=>'raw',
            //'headerHtmlOptions' => array('style' => 'width:30px;'),
            //'htmlOptions'=>array('width'=>'30px'), 
            'htmlOptions' => array('style' => 'text-align:center'),
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
        */
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
