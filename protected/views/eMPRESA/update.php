<?php
/* @var $this EMPRESAController */
/* @var $model EMPRESA */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->EMP_ID=>array('view','id'=>$model->EMP_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List EMPRESA', 'url'=>array('index')),
	array('label'=>'Create EMPRESA', 'url'=>array('create')),
	array('label'=>'View EMPRESA', 'url'=>array('view', 'id'=>$model->EMP_ID)),
	array('label'=>'Manage EMPRESA', 'url'=>array('admin')),
);
?>

<h1>Update EMPRESA <?php echo $model->EMP_ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>