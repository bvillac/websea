<?php
/* @var $this PERSONAController */
/* @var $model PERSONA */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'persona-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_NOMBRE'); ?>
		<?php echo $form->textField($model,'PER_NOMBRE',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'PER_NOMBRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_APELLIDO'); ?>
		<?php echo $form->textField($model,'PER_APELLIDO',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'PER_APELLIDO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_EST_LOG'); ?>
		<?php echo $form->textField($model,'PER_EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'PER_EST_LOG'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_FEC_CRE'); ?>
		<?php echo $form->textField($model,'PER_FEC_CRE'); ?>
		<?php echo $form->error($model,'PER_FEC_CRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_FEC_MOD'); ?>
		<?php echo $form->textField($model,'PER_FEC_MOD'); ?>
		<?php echo $form->error($model,'PER_FEC_MOD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->