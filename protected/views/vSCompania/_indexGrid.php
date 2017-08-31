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
    'selectableRows' => 2,
    'selectionChanged' => 'verificaAcciones',
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
          'class' => 'CCheckBoxColumn',
          ),
          /*array(
          'header' => '#',
          'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
          ), */
        /*array(
            'name' => 'IdCompania',
            'header' => Yii::t('COMPANIA', 'Dni'),
            'value' => '$data["IdCompania"]',
        ),*/
        array(
            'name' => 'Ruc',
            'header' => Yii::t('COMPANIA', 'Ruc'),
            'value' => '$data["Ruc"]',
        ),
        array(
            'name' => 'RazonSocial',
            'header' => Yii::t('COMPANIA', 'Company name'),
            'value' => '$data["RazonSocial"]',
        ),
        array(
            'name' => 'NombreComercial',
            'header' => Yii::t('COMPANIA', 'Nombre Comercial'),
            'value' => '$data["NombreComercial"]',
        ),
        array(
            'name' => 'DireccionMatriz',
            'header' => Yii::t('COMPANIA', 'Address'),
            'value' => '$data["DireccionMatriz"]',
        ),
        /*array(
            'class' => 'CButtonColumn',
            'template' => '{edit}{deletex}',
            'buttons' => array(
                'edit' => array(
                    'label' => 'Editar',
                    'imageUrl'=>Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'].'edit.png', //ruta del icono
                    //'click' => 'js:obtenerSeleccion',
                ),
                'deletex' => array(
                    'label' => ' Eliminar',
                    'imageUrl'=>Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'].'delete.png', //ruta del icono
                    //'click' => 'js:obtenerSeleccion',
                    //'click'=>'function(){$("#dialog_id").dialog("open"); return false;}',
                ),
            ),
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
