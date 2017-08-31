<div class="col-lg-2 form-group">
    <?php
    echo CHtml::dropDownList(
            'cmb_tipoDoc', '0'
            , array('0' => Yii::t('COMPANIA', 'All'),'01' => 'Factura','05' => 'Nota de Debito','04' => 'Nota de Crédito','06' => 'Guia de Remisión','07' => 'Retención') 
            , array('class' => 'form-control')
    );
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
    <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Search'), array('id' => 'btn_buscar', 'name' => 'btn_buscar', 'class' => 'btn btn-success', 'onclick' => 'buscarDataIndex("","")')); ?>
    <?php
        echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Search'), array('vSDocumentos/Documentos'), array('id' => 'btn_aceptar', 'name' => 'btn_aceptar', 'title' => Yii::t('CONTROL_ACCIONES', 'Search'), 'class' => 'btn btn-success', "target"=>"_blank",'onclick' => 'fun_documentos(1)'));
    ?>
</div>
<div class="col-lg-12 form-group">
    <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Authorizing document'), array('id' => 'btn_enviar', 'name' => 'btn_enviar', 'class' => 'btn btn-success', 'onclick' => 'fun_EnviarDocumento()')); ?>
    <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Cancel'), array('id' => 'btn_cancel', 'name' => 'btn_cancel', 'class' => 'btn btn-danger', 'onclick' => 'fun_EnviarAnular()')); ?>
    <?php
    //Yii::app()->getSession()->get('user_name', FALSE); CONTROLA POR USUARIO
    //if (Yii::app()->getSession()->get('RolNombre', FALSE) == 'ADMIN') { //CONTROLA POR ROL ADMIN
    //    echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'To correct'), array('id' => 'btn_corregir', 'name' => 'btn_corregir', 'class' => 'btn btn-danger', 'onclick' => 'fun_EnviarCorreccion()'));
    //}
    ?>
    <?php //echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Edit mail'), array('NubeFactura/updatemail'), array('id' => 'btn_Update', 'name' => 'btn_Update', 'title' => Yii::t('CONTROL_ACCIONES', 'Edit mail'), 'class' => 'btn btn-primary', 'onclick' => 'fun_UpdateMail()')); ?>
    <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Forward mail'), array('id' => 'btn_reenviar', 'name' => 'btn_reenviar', 'class' => 'btn btn-primary', 'onclick' => 'fun_EnviarCorreo()')); ?> 
</div>