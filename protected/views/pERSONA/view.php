<?php
/* @var $this PERSONAController */
/* @var $model PERSONA */

$this->breadcrumbs=array(
	'Personas'=>array('index'),
	$model->PER_ID,
);

$this->menu=array(
	array('label'=>'List PERSONA', 'url'=>array('index')),
	array('label'=>'Create PERSONA', 'url'=>array('create')),
	array('label'=>'Update PERSONA', 'url'=>array('update', 'id'=>$model->PER_ID)),
	array('label'=>'Delete PERSONA', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->PER_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PERSONA', 'url'=>array('admin')),
);
?>

<h1>View PERSONA #<?php echo $model->PER_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'PER_ID',
		'PER_NOMBRE',
		'PER_APELLIDO',
		'PER_EST_LOG',
		'PER_FEC_CRE',
		'PER_FEC_MOD',
	),
)); ?>
