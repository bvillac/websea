<?php
/* @var $this EMPRESAController */
/* @var $model EMPRESA */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'EMP_ID'); ?>
		<?php echo $form->textField($model,'EMP_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMP_RUC'); ?>
		<?php echo $form->textField($model,'EMP_RUC',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMP_RAZONSOCIAL'); ?>
		<?php echo $form->textField($model,'EMP_RAZONSOCIAL',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMP_NOM_COMERCIAL'); ?>
		<?php echo $form->textField($model,'EMP_NOM_COMERCIAL',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMP_TIPO'); ?>
		<?php echo $form->textField($model,'EMP_TIPO',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMP_TELEFONO'); ?>
		<?php echo $form->textField($model,'EMP_TELEFONO',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMP_FAX'); ?>
		<?php echo $form->textField($model,'EMP_FAX',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMP_DIRECCION'); ?>
		<?php echo $form->textField($model,'EMP_DIRECCION',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMP_CORREO'); ?>
		<?php echo $form->textField($model,'EMP_CORREO',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMP_LOGO'); ?>
		<?php echo $form->textField($model,'EMP_LOGO',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMP_EST_LOG'); ?>
		<?php echo $form->textField($model,'EMP_EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMP_FEC_MOD'); ?>
		<?php echo $form->textField($model,'EMP_FEC_MOD'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMP_FEC_CRE'); ?>
		<?php echo $form->textField($model,'EMP_FEC_CRE'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->