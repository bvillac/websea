
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
