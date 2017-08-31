<?php
/* @var $this EMPRESAController */
/* @var $model EMPRESA */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->EMP_ID,
);

$this->menu=array(
	array('label'=>'List EMPRESA', 'url'=>array('index')),
	array('label'=>'Create EMPRESA', 'url'=>array('create')),
	array('label'=>'Update EMPRESA', 'url'=>array('update', 'id'=>$model->EMP_ID)),
	array('label'=>'Delete EMPRESA', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->EMP_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EMPRESA', 'url'=>array('admin')),
);
?>

<h1>View EMPRESA #<?php echo $model->EMP_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'EMP_ID',
		'EMP_RUC',
		'EMP_RAZONSOCIAL',
		'EMP_NOM_COMERCIAL',
		'EMP_TIPO',
		'EMP_TELEFONO',
		'EMP_FAX',
		'EMP_DIRECCION',
		'EMP_CORREO',
		'EMP_LOGO',
		'EMP_EST_LOG',
		'EMP_FEC_MOD',
		'EMP_FEC_CRE',
	),
)); ?>
