<?php
/* @var $this NubeNotaDebitoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nube Nota Debitos',
);

$this->menu=array(
	array('label'=>'Create NubeNotaDebito', 'url'=>array('create')),
	array('label'=>'Manage NubeNotaDebito', 'url'=>array('admin')),
);
?>

<h1>Nube Nota Debitos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
