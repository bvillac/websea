<?php
/* @var $this USUARIOController */
/* @var $model USUARIO */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'USU_ID'); ?>
		<?php echo $form->textField($model,'USU_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_ID'); ?>
		<?php echo $form->textField($model,'PER_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USU_NOMBRE'); ?>
		<?php echo $form->textField($model,'USU_NOMBRE',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USU_PASSWORD'); ?>
		<?php echo $form->textField($model,'USU_PASSWORD',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USU_EST_LOG'); ?>
		<?php echo $form->textField($model,'USU_EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USU_FEC_CRE'); ?>
		<?php echo $form->textField($model,'USU_FEC_CRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USU_FEC_MOD'); ?>
		<?php echo $form->textField($model,'USU_FEC_MOD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->