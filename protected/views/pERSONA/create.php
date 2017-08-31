<?php
/* @var $this PERSONAController */
/* @var $model PERSONA */

$this->breadcrumbs=array(
	'Personas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PERSONA', 'url'=>array('index')),
	array('label'=>'Manage PERSONA', 'url'=>array('admin')),
);
?>

<h1>Create PERSONA</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>