<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<!--<p><?php //echo Yii::t('GENERAL', 'Please fill out the following form with your login credentials:') ?></p>-->
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

        <?php //echo Yii::t('GENERAL', 'Fields with * are required.') ?>

	<div class="form-group">
                <?php //echo $form->labelEx($model,'username'); ?>
                <?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'E-mail')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
	<div class="form-group">
                <?php //echo $form->labelEx($model,'password'); ?>
                <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Contraseña')); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			<!--Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.-->
                        <!--<?php //echo Yii::t('GENERAL', 'Hint: You may login with demo/demo or admin/admin.') ?>-->
		</p>
	</div>

	<div class="checkbox">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
            <span style="text-align:left"><?php echo $form->label($model,'rememberMe'); ?></span>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton(Yii::t('GENERAL', 'Login'),array('class'=>'btn btn-lg btn-success btn-block')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->