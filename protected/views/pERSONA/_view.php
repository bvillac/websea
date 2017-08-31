<?php
/* @var $this PERSONAController */
/* @var $data PERSONA */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PER_ID), array('view', 'id'=>$data->PER_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->PER_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_APELLIDO')); ?>:</b>
	<?php echo CHtml::encode($data->PER_APELLIDO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_EST_LOG')); ?>:</b>
	<?php echo CHtml::encode($data->PER_EST_LOG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_FEC_CRE')); ?>:</b>
	<?php echo CHtml::encode($data->PER_FEC_CRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_FEC_MOD')); ?>:</b>
	<?php echo CHtml::encode($data->PER_FEC_MOD); ?>
	<br />


</div>