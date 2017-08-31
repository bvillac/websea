<?php
/* @var $this VSCompaniaController */
/* @var $model VSCompania */

$this->breadcrumbs=array(
	'Vscompanias'=>array('index'),
	$model->IdCompania,
);

$this->menu=array(
	array('label'=>'List VSCompania', 'url'=>array('index')),
	array('label'=>'Create VSCompania', 'url'=>array('create')),
	array('label'=>'Update VSCompania', 'url'=>array('update', 'id'=>$model->IdCompania)),
	array('label'=>'Delete VSCompania', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdCompania),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VSCompania', 'url'=>array('admin')),
);
?>

<h1>View VSCompania #<?php echo $model->IdCompania; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdCompania',
		'Ruc',
		'RazonSocial',
		'NombreComercial',
		'Mail',
		'EsContribuyente',
		'Direccion',
		'UsuarioCreacion',
		'FechaCreacion',
		'UsuarioModificacion',
		'FechaModificacion',
		'UsuarioEliminacion',
		'FechaEliminacion',
		'Estado',
	),
)); ?>
