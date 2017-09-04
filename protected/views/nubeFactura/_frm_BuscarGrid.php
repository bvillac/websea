<div class="col-lg-4 form-group">
    <?php
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'name' => 'txt_PER_CEDULA',
        'id' => 'txt_PER_CEDULA',
        'source' => "js: function(request, response){ 
                  autocompletarBuscarPersona(request, response,'txt_PER_CEDULA','COD-NOM');
                }",
        'options' => array(
            'minLength' => '2',
            'showAnim' => 'fold',
            'select' => "js:function(event, ui) {
                    //actualizaBuscarPersona(ui.item.PER_ID);     
                }"
        ),
        'htmlOptions' => array(
            'class' => 'form-control',
            "data-type" => "number",
            'size'=>35, 
            //'onKeyup' => "verificarTextCedula(isEnter(event),'txt_PER_CEDULA')",
            'placeholder' => Yii::t('COMPANIA', 'Social reason o Ruc'),
            //'onkeydown' => "nextControl(isEnter(event),'txt_nombre_medico_aten')",
            //'onkeydown' => "buscarCodigo(isEnter(event),'txt_cod_paciente','COD-ID')",
            //'onkeydown' => "verificarTextCedula(isEnter(event),'txt_PER_CEDULA')",
            //'value' => 'search',
        ),
    ));
    ?>
</div>
<div class="col-lg-2 form-group">
    <?php
    echo CHtml::dropDownList(
            'cmb_tipoApr', '0'
            , array('0' => Yii::t('COMPANIA', 'All')) + $tipoApr
            , array('class' => 'form-control')
    );
    ?> 
</div>
<div class="col-lg-2 form-group">
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'dtp_fec_ini',
        'attribute' => 'dtp_fec_ini',
        //'value' => date(Yii::app()->params['datebydefault']),//date(Yii::app()->params['dateStart']),
        'language' => Yii::app()->language,
        'options' => array(
            'showAnim' => 'fold',
            'autoSize' => true,
            'changeMonth' => 'true',
            'changeYear' => 'true',
            'showOtherMonths' => true,
            'showButtonPanel' => true,
            'dateFormat' => Yii::app()->params['datepicker'],
            //'buttonImage' => Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'] . 'date-icon1.png',
            //'buttonImageOnly' => true,
            //'showOn' => 'button',
        ),
        'htmlOptions' => array(
            'class' => 'form-control',
            'readonly' => 'readonly',
            'placeholder' => Yii::t('COMPANIA', 'Date Start'),
        ),
    ));
    ?>
</div>
<div class="col-lg-2 form-group">
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'dtp_fec_fin',
        'attribute' => 'dtp_fec_fin',
        //'value' => date(Yii::app()->params['datebydefault']),
        'language' => Yii::app()->language,
        'options' => array(
            'showAnim' => 'fold',
            'autoSize' => true,
            'changeMonth' => 'true',
            'changeYear' => 'true',
            'showOtherMonths' => true,
            'showButtonPanel' => true,
            'dateFormat' => Yii::app()->params['datepicker'],
            //'buttonImage' => Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'] . 'date-icon1.png',
            //'buttonImageOnly' => true,
            //'showOn' => 'button',
        ),
        'htmlOptions' => array(
            'class' => 'form-control ',
            'readonly' => 'readonly',
            'placeholder' => Yii::t('COMPANIA', 'Date End'),
        ),
    ));
    ?>
</div>
<div class="col-lg-2 form-group">
    <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Search'), array('id' => 'btn_buscar', 'name' => 'btn_buscar', 'class' => 'btn btn-success', 'onclick' => 'buscarDataIndex("","")')); ?>
</div>
<div class="col-lg-12 form-group">
    <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Authorizing document'), array('id' => 'btn_enviar', 'name' => 'btn_enviar', 'class' => 'btn btn-success', 'onclick' => 'fun_EnviarDocumento()')); ?>
    
    <?php
    //Yii::app()->getSession()->get('user_name', FALSE); CONTROLA POR USUARIO
    if (Yii::app()->getSession()->get('RolNombre', FALSE) == 'ADMIN') { //CONTROLA POR ROL ADMIN
        echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'To correct'), array('id' => 'btn_corregir', 'name' => 'btn_corregir', 'class' => 'btn btn-danger', 'onclick' => 'fun_EnviarCorreccion()'));
        echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Cancel'), array('id' => 'btn_cancel', 'name' => 'btn_cancel', 'class' => 'btn btn-danger', 'onclick' => 'fun_EnviarAnular()'));
    }
    ?>
    <?php echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Edit mail'), array('NubeFactura/updatemail'), array('id' => 'btn_Update', 'name' => 'btn_Update', 'title' => Yii::t('CONTROL_ACCIONES', 'Edit mail'), 'class' => 'btn btn-primary', 'onclick' => 'fun_UpdateMail()')); ?>
    <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Forward mail'), array('id' => 'btn_reenviar', 'name' => 'btn_reenviar', 'class' => 'btn btn-primary', 'onclick' => 'fun_EnviarCorreo()')); ?> 
</div>