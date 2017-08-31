<?php
/* @var $this PERSONAController */
/* @var $model PERSONA */

$this->breadcrumbs=array(
	'Personas'=>array('index'),
	$model->PER_ID=>array('view','id'=>$model->PER_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List PERSONA', 'url'=>array('index')),
	array('label'=>'Create PERSONA', 'url'=>array('create')),
	array('label'=>'View PERSONA', 'url'=>array('view', 'id'=>$model->PER_ID)),
	array('label'=>'Manage PERSONA', 'url'=>array('admin')),
);
?>

<h1>Update PERSONA <?php echo $model->PER_ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>