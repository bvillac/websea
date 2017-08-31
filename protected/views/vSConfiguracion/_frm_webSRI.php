
<form role="form">
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Environment') ?></label>
        </div>
        <div class="txt_Textbox">
            <?php
            echo CHtml::dropDownList(
                    'cmb_Ambiente', '0'
                    , array('1' => Yii::t('GENERAL', 'Testing'),'2' => Yii::t('GENERAL', 'Production')) 
                    , array('class' => 'form-control')
            );
            ?>

        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Web service reception') ?></label>
        </div>
        <div class="txt_Textbox">
            <?php
            echo CHtml::textField('txt_Recepcion', '', array('size' => 10, 'maxlength' => 200,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>

    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Web service authorization') ?></label>
        </div>
        <div class="txt_Textbox">
            <?php
            echo CHtml::textField('txt_Autorizacion', '', array('size' => 10, 'maxlength' => 200,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>

    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Web service reception batch') ?></label>
        </div>
        <div class="txt_Textbox">
            <?php
            echo CHtml::textField('txt_RecepcionLote', '', array('size' => 10, 'maxlength' => 200,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>

    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Response time') ?></label>
        </div>
        <div class="txt_Textbox">
            <?php
            echo CHtml::textField('txt_TiempoRespuesta', '', array('size' => 10, 'maxlength' => 4,
                'class' => 'form-control txt_TextboxNumber2',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>

    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Synchronization time') ?></label>
        </div>
        <div class="txt_Textbox">
            <?php
            echo CHtml::textField('txt_TiempoSincronizacion', '', array('size' => 10, 'maxlength' => 4,
                'class' => 'form-control txt_TextboxNumber2',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>

    </div>



</form>


