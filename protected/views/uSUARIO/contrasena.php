<?php echo $this->renderPartial('_include'); ?>
<div class="col-lg-5">
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo Yii::t('GENERAL', 'Change password') ?></div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_CambContrasena', 
                    array(
                        //'model' => $model,
                        )); ?>
        </div>
    </div>
</div>
