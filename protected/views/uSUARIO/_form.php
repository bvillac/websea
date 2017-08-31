<?php
/* @var $this USUARIOController */
/* @var $model USUARIO */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_ID'); ?>
		<?php echo $form->textField($model,'PER_ID',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'PER_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USU_NOMBRE'); ?>
		<?php echo $form->textField($model,'USU_NOMBRE',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'USU_NOMBRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USU_PASSWORD'); ?>
		<?php echo $form->textField($model,'USU_PASSWORD',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'USU_PASSWORD'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USU_EST_LOG'); ?>
		<?php echo $form->textField($model,'USU_EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'USU_EST_LOG'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USU_FEC_CRE'); ?>
		<?php echo $form->textField($model,'USU_FEC_CRE'); ?>
		<?php echo $form->error($model,'USU_FEC_CRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USU_FEC_MOD'); ?>
		<?php echo $form->textField($model,'USU_FEC_MOD'); ?>
		<?php echo $form->error($model,'USU_FEC_MOD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->