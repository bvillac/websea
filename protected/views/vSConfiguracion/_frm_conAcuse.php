<form role="form">
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Notification received') ?></label>
        </div>
        <div class="txt_Textbox">
             <?php echo CHtml::checkBox('chk_ActivarAcuse', false, array('value' => '1')); ?>
        </div>

    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Notification server') ?></label>
        </div>
        <div class="txt_Textbox">
            <?php
            echo CHtml::textField('txt_ServidorAcuse', '', array('size' => 10, 'maxlength' => 20,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>

    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Forwarding mail') ?></label>
        </div>
        <div class="txt_Textbox">
            <?php
            echo CHtml::textField('txt_TiempoEspera', '', array('size' => 10, 'maxlength' => 2,
                'class' => 'form-control txt_TextboxNumber2',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ));
            ?>
        </div>


    </div>



</form>


