<?php
/* @var $this PERSONAController */
/* @var $model PERSONA */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'PER_ID'); ?>
		<?php echo $form->textField($model,'PER_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_NOMBRE'); ?>
		<?php echo $form->textField($model,'PER_NOMBRE',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_APELLIDO'); ?>
		<?php echo $form->textField($model,'PER_APELLIDO',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_EST_LOG'); ?>
		<?php echo $form->textField($model,'PER_EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_FEC_CRE'); ?>
		<?php echo $form->textField($model,'PER_FEC_CRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_FEC_MOD'); ?>
		<?php echo $form->textField($model,'PER_FEC_MOD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->