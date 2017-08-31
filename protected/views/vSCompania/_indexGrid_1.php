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
    'id' => 'TbG_COMPANIA',
    'dataProvider' => $model,
    //'template' => "{items}",
    'htmlOptions' => array('style' => 'cursor: pointer;'),
    //'selectableRows' => 2,
    //'selectionChanged' => 'fun_UpdateFichaMedica',
    'selectionChanged' => 'fun_mostrarFichaPaciente',
    //'ajaxUrl'=>'Yii::app()->controller->createUrl("cOBRANZAS/", array("importarAfiliado" => $this->grid->dataProvider->pagination->currentPage+1))',
    //'summaryText'=>"<div class='whitesec_search'><p>{count} Full Quality Videos</p></div>",
    //'afterAjaxUpdate' => 'dataPrueba' ,
    //'afterAjaxUpdate'=>'function(id, data){alert(data)}',
    //'beforeAjaxUpdate'=>'function(id,options){alert(unescape(options.url)) }',
    //'beforeAjaxUpdate'=>'function(id,options){ options["type"]="POST"; }',
    //'beforeAjaxUpdate' => 'function(id,options){consultFiltros(options)}',
    'columns' => array(
        /* array(
          'class' => 'CCheckBoxColumn',
          ),
          array(
          'header' => '#',
          'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
          ), */
        array(
            'name' => 'NOMBRE',
            'header' => Yii::t('FICHA_MEDICA', 'Name'),
            'value' => '$data["NOMBRE"]',
        ),
        array(
            'name' => 'PER_CEDULA',
            'header' => Yii::t('PERSONA', 'DNI'),
            'value' => '$data["PER_CEDULA"]',
        ),
        array(
            'name' => 'FMED_FECHA_INGRESO',
            'header' => Yii::t('FICHA_MEDICA', 'Admission date'),
            'value' => 'date(Yii::app()->params["datebydefault"],strtotime($data["FMED_FECHA_INGRESO"]))',
        ),
//        array(
//            'name' => 'FMED_NUMERO_HISTO_CLINICA',
//            'header' => Yii::t('FICHA_MEDICA', 'Medical History Number'),
//            'value' => '$data["FMED_NUMERO_HISTO_CLINICA"]',
//        ),
        array(
            'name' => 'PER_DOMICILIO_DIRECCION',
            'header' => Yii::t('FICHA_MEDICA', 'Address'),
            'value' => '$data["PER_DOMICILIO_DIRECCION"]',
        ),
    /* array(
      'class' => 'CButtonColumn',
      'template' => '{edit}{delete}',
      'htmlOptions' => array('style' => 'width: 50px'),
      'buttons' => array(
      'add' => array(
      //'imageUrl'=>Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'].'afiliado.png', //ruta del icono
      'label'=>'',
      'imageUrl'=>'', //ruta del icono
      'click' => 'function(){hola();}',
      //'url' => '$this->grid->controller->createUrl("/Extras/update", array("id"=>$data->id,"asDialog"=>1,"gridId"=>$this->grid->id))',
      //'visible' => '($data->id===null)?false:true;'
      'options' => array('class' => 'icon-add', 'rel' => 'tooltip'),
      ),
      'edit' => array(
      'label'=>'',
      'imageUrl'=>'', //ruta del icono
      'click' => 'function(){hola();}',
      'options' => array('class' => 'icon-edit', 'rel' => 'tooltip'),
      ),
      'delete' => array(
      'label'=>'',
      'imageUrl'=>'', //ruta del icono
      'click' => 'function(){hola();}',
      'options' => array('class' => 'icon-remove', 'rel' => 'tooltip'),
      ),
      ),
      ), */
    ),
));
?>
