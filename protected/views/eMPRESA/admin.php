<?php
/* @var $this EMPRESAController */
/* @var $model EMPRESA */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EMPRESA', 'url'=>array('index')),
	array('label'=>'Create EMPRESA', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#empresa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Empresas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'empresa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'EMP_ID',
		'EMP_RUC',
		'EMP_RAZONSOCIAL',
		'EMP_NOM_COMERCIAL',
		'EMP_TIPO',
		'EMP_TELEFONO',
		/*
		'EMP_FAX',
		'EMP_DIRECCION',
		'EMP_CORREO',
		'EMP_LOGO',
		'EMP_EST_LOG',
		'EMP_FEC_MOD',
		'EMP_FEC_CRE',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
