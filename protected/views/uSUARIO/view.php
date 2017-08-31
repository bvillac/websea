<?php
/* @var $this USUARIOController */
/* @var $model USUARIO */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->USU_ID,
);

$this->menu=array(
	array('label'=>'List USUARIO', 'url'=>array('index')),
	array('label'=>'Create USUARIO', 'url'=>array('create')),
	array('label'=>'Update USUARIO', 'url'=>array('update', 'id'=>$model->USU_ID)),
	array('label'=>'Delete USUARIO', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->USU_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage USUARIO', 'url'=>array('admin')),
);
?>

<h1>View USUARIO #<?php echo $model->USU_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'USU_ID',
		'PER_ID',
		'USU_NOMBRE',
		'USU_PASSWORD',
		'USU_EST_LOG',
		'USU_FEC_CRE',
		'USU_FEC_MOD',
	),
)); ?>
