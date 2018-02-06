<?php
/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-09-24
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>
<?php echo $this->renderPartial('_include'); ?>
<div class="col-md-12">
    <h3><?= Yii::t("perfil", "N°Entrega  ") ?>
        <label id="lbl_tip"><?php echo $cabFact['TIP_REC'] ?></label>
        <label id="lbl_ids"><?php echo $cabFact['IDS_REC'] ?></label>
    </h3>
</div>
<div class="col-lg-4">
    <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Save'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'guardarListaPedido("Update")')); ?>
</div>
<!--<div class="col-md-6">
    <div class="form-group">
        <label for="txt_per_nombre" class="col-sm-3 control-label"><?= Yii::t("perfil", "First Name") ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control PBvalidation keyupmce" id="txt_per_nombre" data-type="alfa" data-keydown="true" placeholder="<?= Yii::t("perfil", "First Name") ?>">
        </div>
    </div>
</div>-->
<div class="col-lg-12">
    <?php //echo $this->renderPartial('_frm_BuscarGrid', array('tipoApr'=> $tipoApr)); ?>
</div>
<div class="col-md-12">
    <?php echo $this->renderPartial('_indexGridDetalle', array('detFact' => $detFact)); ?>
</div>
