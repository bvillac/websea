<?php
/* @var $this USUARIOController */
/* @var $model USUARIO */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->USU_ID=>array('view','id'=>$model->USU_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List USUARIO', 'url'=>array('index')),
	array('label'=>'Create USUARIO', 'url'=>array('create')),
	array('label'=>'View USUARIO', 'url'=>array('view', 'id'=>$model->USU_ID)),
	array('label'=>'Manage USUARIO', 'url'=>array('admin')),
);
?>

<h1>Update USUARIO <?php echo $model->USU_ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>