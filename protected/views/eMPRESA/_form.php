<?php
/* @var $this EMPRESAController */
/* @var $model EMPRESA */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'empresa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'EMP_RUC'); ?>
		<?php echo $form->textField($model,'EMP_RUC',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'EMP_RUC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMP_RAZONSOCIAL'); ?>
		<?php echo $form->textField($model,'EMP_RAZONSOCIAL',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'EMP_RAZONSOCIAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMP_NOM_COMERCIAL'); ?>
		<?php echo $form->textField($model,'EMP_NOM_COMERCIAL',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'EMP_NOM_COMERCIAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMP_TIPO'); ?>
		<?php echo $form->textField($model,'EMP_TIPO',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'EMP_TIPO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMP_TELEFONO'); ?>
		<?php echo $form->textField($model,'EMP_TELEFONO',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'EMP_TELEFONO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMP_FAX'); ?>
		<?php echo $form->textField($model,'EMP_FAX',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'EMP_FAX'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMP_DIRECCION'); ?>
		<?php echo $form->textField($model,'EMP_DIRECCION',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'EMP_DIRECCION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMP_CORREO'); ?>
		<?php echo $form->textField($model,'EMP_CORREO',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'EMP_CORREO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMP_LOGO'); ?>
		<?php echo $form->textField($model,'EMP_LOGO',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'EMP_LOGO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMP_EST_LOG'); ?>
		<?php echo $form->textField($model,'EMP_EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'EMP_EST_LOG'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMP_FEC_MOD'); ?>
		<?php echo $form->textField($model,'EMP_FEC_MOD'); ?>
		<?php echo $form->error($model,'EMP_FEC_MOD'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMP_FEC_CRE'); ?>
		<?php echo $form->textField($model,'EMP_FEC_CRE'); ?>
		<?php echo $form->error($model,'EMP_FEC_CRE'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->