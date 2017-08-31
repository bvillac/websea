<?php
/* @var $this USUARIOController */
/* @var $data USUARIO */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('USU_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->USU_ID), array('view', 'id'=>$data->USU_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PER_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USU_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->USU_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USU_PASSWORD')); ?>:</b>
	<?php echo CHtml::encode($data->USU_PASSWORD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USU_EST_LOG')); ?>:</b>
	<?php echo CHtml::encode($data->USU_EST_LOG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USU_FEC_CRE')); ?>:</b>
	<?php echo CHtml::encode($data->USU_FEC_CRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USU_FEC_MOD')); ?>:</b>
	<?php echo CHtml::encode($data->USU_FEC_MOD); ?>
	<br />


</div>