<?php
/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-09-24
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>

<?php echo $this->renderPartial('_include'); ?>
<div class="col-lg-12">
    <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Save'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_GuardarConfig("Update")')); ?>
    <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Clear'), array('id' => 'btn_limpiar', 'name' => 'btn_limpiar', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_limpiarServer()')); ?>
</div>
<br><br>
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo Yii::t('GENERAL', 'Mail server') ?></div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_conCorreo', array('model' => $model)); ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo Yii::t('GENERAL', 'Received confirmation') ?></div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_conAcuse', array('model' => $model)); ?>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo Yii::t('GENERAL', 'Email settings') ?></div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_conEmail', array('model' => $model)); ?>
        </div>
    </div>
</div>

<script>
    var varData = JSON.parse(base64_decode('<?php echo $data; ?>')) ;
    loadDataUpdate();
</script>