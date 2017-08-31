<?php
/* @var $this VSCompaniaController */
/* @var $data VSCompania */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCompania')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdCompania), array('view', 'id'=>$data->IdCompania)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ruc')); ?>:</b>
	<?php echo CHtml::encode($data->Ruc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RazonSocial')); ?>:</b>
	<?php echo CHtml::encode($data->RazonSocial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreComercial')); ?>:</b>
	<?php echo CHtml::encode($data->NombreComercial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Mail')); ?>:</b>
	<?php echo CHtml::encode($data->Mail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EsContribuyente')); ?>:</b>
	<?php echo CHtml::encode($data->EsContribuyente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Direccion')); ?>:</b>
	<?php echo CHtml::encode($data->Direccion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('UsuarioCreacion')); ?>:</b>
	<?php echo CHtml::encode($data->UsuarioCreacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaCreacion')); ?>:</b>
	<?php echo CHtml::encode($data->FechaCreacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UsuarioModificacion')); ?>:</b>
	<?php echo CHtml::encode($data->UsuarioModificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaModificacion')); ?>:</b>
	<?php echo CHtml::encode($data->FechaModificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UsuarioEliminacion')); ?>:</b>
	<?php echo CHtml::encode($data->UsuarioEliminacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaEliminacion')); ?>:</b>
	<?php echo CHtml::encode($data->FechaEliminacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php echo CHtml::encode($data->Estado); ?>
	<br />

	*/ ?>

</div>