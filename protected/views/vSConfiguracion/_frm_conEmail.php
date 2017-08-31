
<form role="form">
    <div class="form-group">
        <label><?php echo Yii::t('GENERAL', 'Name') ?></label>
        <?php
        echo CHtml::textField('txt_NombreMostrar', '', array('size' => 50, 'maxlength' => 200,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('GENERAL', 'Subject') ?></label>
        <?php
        echo CHtml::textArea('txta_Asunto', '', array('maxlength' => 500, 'rows' => 2, 'cols' => 50,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('GENERAL', 'Body') ?></label>
        <?php
        echo CHtml::textArea('txta_Cuerpo', '', array('maxlength' => 5000, 'rows' => 6, 'cols' => 100,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('GENERAL', 'Copy Mail') ?></label>
        <?php
        echo CHtml::textField('txt_CCO', '', array('size' => 10, 'maxlength' => 500,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <!--<div class="form-group tooltip-demo">
        <label><?php //echo Yii::t('GENERAL', 'Parameters')  ?></label>
        <button data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." 
                data-placement="left" data-toggle="popover" data-container="body" class="btn btn-default" type="button" data-original-title="" title="">
                                    Popover on left
        </button>
    </div>-->
    <div class="form-group rowLine">
        <div class="rowTd">
            <label><?php echo Yii::t('GENERAL', 'Send Mail C/Seconds') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_TiempoRespuesta', '', array('size' => 10, 'maxlength' => 2,
                'class' => 'form-control txt_TextboxNumber2',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>
        <div class="rowTd">
            <label><?php echo Yii::t('GENERAL', 'Html') ?></label>
        </div>
        <div class="rowTd">
            <?php //echo CHtml::checkBox('chk_EsHtml', false, array('value' => 136, 'onclick' => 'validadorChk(this)')); ?>
            <?php echo CHtml::checkBox('chk_EsHtml', false, array('value' => '')); ?>
        </div>
        
        
    </div>




</form>


