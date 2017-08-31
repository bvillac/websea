
<form role="form">
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'Ruc') ?></label>
        <?php
        echo CHtml::textField('txt_RUC', '', array('size' => 50, 'maxlength' => 50,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'RazonSocial') ?></label>
        <?php
        echo CHtml::textField('txt_RazonSocial', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'NombreComercial') ?></label>
        <?php
        echo CHtml::textField('txt_NombreComercial', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'Ambiente') ?></label>
        <?= CHtml::dropDownList("cmb_Ambiente", 0, VSValidador::tipoAmbiente(), ["class" => "form-control", "id" => "cmb_Ambiente"]) ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'TipoEmision') ?></label>
        <?= CHtml::dropDownList("cmb_TipoEmision", 0, VSValidador::tipoEmision(), ["class" => "form-control", "id" => "cmb_TipoEmision"]) ?>
    </div>
    

    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'ObligadoContabilidad') ?></label>
        <?= CHtml::dropDownList("cmb_ObligadoContabilidad", 0, VSValidador::tipoEstado(), ["class" => "form-control", "id" => "cmb_ObligadoContabilidad"]) ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'ContribuyenteEspecial') ?></label>
        <?php
        echo CHtml::textField('txt_ContribuyenteEspecial', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
        <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'Correo Empresa') ?></label>
        <?php
        echo CHtml::textField('txt_Mail', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>

    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'DireccionMatriz') ?></label>
        <?php
        echo CHtml::textField('txt_DireccionMatriz', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'Teléfono') ?></label>
        <?php
        echo CHtml::textField('txt_Telefono', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'Correo Electonico de Envios Automáticos') ?></label>
        <?php
        echo CHtml::textField('txt_CorreoElectonico', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'CorreoContador') ?></label>
        <?php
        echo CHtml::textField('txt_CorreoContador', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'Moneda') ?></label>
        <?php
        echo CHtml::textField('txt_Moneda', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'Website') ?></label>
        <?php
        echo CHtml::textField('txt_Website', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>



</form>


