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
    <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Process'), array('id' => 'btn_procesar', 'name' => 'btn_procesar', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_Procesar()')); ?>
    <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Clear'), array('id' => 'btn_limpiar', 'name' => 'btn_limpiar', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_limpiarWebSri()')); ?>
</div>
<br><br>
<div class="col-lg-10">
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo Yii::t('GENERAL', 'Sri web service') ?></div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_cContigencia', array('model' => $model)); ?>
        </div>
    </div>
</div>

<script>
    //var varDataSri = JSON.parse(base64_decode('<?php //echo $data; ?>')) ;
    //loadDataUpdateSri();
</script>