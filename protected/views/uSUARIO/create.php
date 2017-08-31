<?php
/* @var $this USUARIOController */
/* @var $model USUARIO */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List USUARIO', 'url'=>array('index')),
	array('label'=>'Manage USUARIO', 'url'=>array('admin')),
);
?>

<h1>Create USUARIO</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>