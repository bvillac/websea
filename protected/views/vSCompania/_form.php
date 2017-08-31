<?php
/* @var $this VSCompaniaController */
/* @var $model VSCompania */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vscompania-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<!--	<div class="row">
		<?php //echo $form->labelEx($model,'IdCompania'); ?>
		<?php //echo $form->textField($model,'IdCompania',array('size'=>20,'maxlength'=>20)); ?>
		<?php //echo $form->error($model,'IdCompania'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'Ruc'); ?>
		<?php echo $form->textField($model,'Ruc',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Ruc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RazonSocial'); ?>
		<?php echo $form->textField($model,'RazonSocial',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'RazonSocial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NombreComercial'); ?>
		<?php echo $form->textField($model,'NombreComercial',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'NombreComercial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mail'); ?>
		<?php echo $form->textField($model,'Mail',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Mail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EsContribuyente'); ?>
		<?php echo $form->textField($model,'EsContribuyente'); ?>
		<?php echo $form->error($model,'EsContribuyente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Direccion'); ?>
		<?php echo $form->textField($model,'Direccion',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'Direccion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->