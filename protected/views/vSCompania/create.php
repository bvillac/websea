<?php
/* @var $this VSCompaniaController */
/* @var $model VSCompania */

/* $this->breadcrumbs = array(
  'Vscompanias' => array('index'),
  'Create',
  );

  $this->menu = array(
  array('label' => 'List VSCompania', 'url' => array('index')),
  array('label' => 'Manage VSCompania', 'url' => array('admin')),
  ); */
?>

<?php echo $this->renderPartial('_include'); ?>
<div class="col-lg-12">
    <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Save'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_GuardarEmpresa("Create")')); ?>
    <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Clear'), array('id' => 'btn_limpiar', 'name' => 'btn_limpiar', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_limpiarEmpresa()')); ?>
</div>
<br><br>
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo Yii::t('PERSONA', 'Compañía') ?></div>
        <div class="panel-body">
            <?php $this->renderPartial('_formulario', array('model' => $model)); ?>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo Yii::t('PERSONA', 'Firma Digital') ?></div>
        <div class="panel-body">
            <?php $this->renderPartial('_formulario_1', array('model' => $model)); ?>
        </div>
    </div>
</div>

