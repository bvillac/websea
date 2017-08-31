<?php
/* @var $this EMPRESAController */
/* @var $data EMPRESA */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->EMP_ID), array('view', 'id'=>$data->EMP_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_RUC')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_RUC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_RAZONSOCIAL')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_RAZONSOCIAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_NOM_COMERCIAL')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_NOM_COMERCIAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_TIPO')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_TIPO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_TELEFONO')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_TELEFONO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_FAX')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_FAX); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_DIRECCION')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_DIRECCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_CORREO')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_CORREO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_LOGO')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_LOGO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_EST_LOG')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_EST_LOG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_FEC_MOD')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_FEC_MOD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMP_FEC_CRE')); ?>:</b>
	<?php echo CHtml::encode($data->EMP_FEC_CRE); ?>
	<br />

	*/ ?>

</div>