
<form role="form">
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Mail') ?></label>
        </div>
        <div class="txt_Textbox">
            <?php
            echo CHtml::textField('txt_Mail', '', array('size' => 50, 'maxlength' => 100,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Smtp server') ?></label>
        </div>
        <div class="txt_Textbox">
            <?php
            echo CHtml::textField('txt_SMTPServidor', '', array('size' => 10, 'maxlength' => 4,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>

    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Port') ?></label>
        </div>
        <div class="txt_Textbox">
            <?php
            echo CHtml::textField('txt_SMTPPuerto', '', array('size' => 10, 'maxlength' => 4,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>

    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'User') ?></label>
        </div>
        <div class="txt_Textbox">
            <?php
            echo CHtml::textField('txt_Usuario', '', array('size' => 10, 'maxlength' => 100,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>

    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Pass') ?></label>
        </div>
        <div class="txt_Textbox">
            <?php
            echo CHtml::textField('txt_Clave', '', array('size' => 10, 'maxlength' => 25,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>

    </div>



</form>


