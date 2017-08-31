<?php
/* @var $this EMPRESAController */
/* @var $model EMPRESA */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EMPRESA', 'url'=>array('index')),
	array('label'=>'Manage EMPRESA', 'url'=>array('admin')),
);
?>

<h1>Create EMPRESA</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>