<div id="div-table">
    <div class="trow">
        <div class="tcol-td form-group">
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
        <!--<div class="tcol-td">
            <span> <?php //echo Yii::t('COMPANIA', 'Document') ?></span>
        </div>
        <div class="tcol-td">
            <?php
//            echo CHtml::dropDownList(
//                    'cmb_tipDoc', '0'
//                    , array('0' => Yii::t('COMPANIA', '-Select-')) + CHtml::listData($tipoDoc, 'TipoDocumento', 'Descripcion')
//                    , array('class' => 'form-control')
//            );
            ?> 
        </div>-->
        <div class="tcol-td form-group">
            <?php
            echo CHtml::dropDownList(
                    'cmb_tipoApr', '0'
                    , array('0' => Yii::t('COMPANIA', 'All')) + $tipoApr
                    , array('class' => 'form-control')
            );
            ?> 
        </div>
        <div class="tcol-td form-group">
            <span> <?php echo Yii::t('COMPANIA', 'Date Start') ?></span>
        </div>
        <div class="tcol-td form-group">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'dtp_fec_ini',
                'attribute' => 'dtp_fec_ini',
                'value' => date(Yii::app()->params['datebydefault']),//date(Yii::app()->params['dateStart']),
                'language' => Yii::app()->language,
                'options' => array(
                    'showAnim' => 'fold',
                    'autoSize' => true,
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                    'showOtherMonths' => true,
                    'showButtonPanel' => true,
                    'dateFormat' => Yii::app()->params['datepicker'],
                    'buttonImage' => Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'] . 'date-icon1.png',
                    'buttonImageOnly' => true,
                    'showOn' => 'button',
                ),
                'htmlOptions' => array(
                    //'style' => 'height:10px;',
                    //'style' => 'width:100px;vertical-align:top !important',
                    //'style'=>'width:200px !important',
                    //'modal'=>true,
                    //'size'=>10, 
                    'class' => 'form-control imgDate',
                    'readonly' => 'readonly',
                ),
            ));
            ?>
        </div>
        <div class="tcol-td form-group">
            <span> <?php echo Yii::t('COMPANIA', 'Date End') ?></span>
        </div>
        <div class="tcol-td form-group">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'dtp_fec_fin',
                'attribute' => 'dtp_fec_fin',
                'value' => date(Yii::app()->params['datebydefault']),
                'language' => Yii::app()->language,
                'options' => array(
                    'showAnim' => 'fold',
                    'autoSize' => true,
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                    'showOtherMonths' => true,
                    'showButtonPanel' => true,
                    'dateFormat' => Yii::app()->params['datepicker'],
                    'buttonImage' => Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'] . 'date-icon1.png',
                    'buttonImageOnly' => true,
                    'showOn' => 'button',
                ),
                'htmlOptions' => array(
                    //'style' => 'height:10px;',
                    //'style' => 'width:100px;vertical-align:top',
                    //'style'=>'width:200px !important',
                    //'modal'=>true,
                    //'size'=>10, 
                    'class' => 'form-control imgDate',
                    'readonly' => 'readonly',
                ),
            ));
            ?>
        </div>
        <div class="tcol-td form-group">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Search'), array('id' => 'btn_buscar', 'name' => 'btn_buscar', 'class' => 'btn btn-success', 'onclick' => 'buscarDataIndex("","")')); ?>
        </div>
        
    </div>
    <div class="trow">
        <div >
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Authorizing document'), array('id' => 'btn_enviar', 'name' => 'btn_enviar', 'class' => 'btn btn-success', 'onclick' => 'fun_EnviarDocumento()')); ?>
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Cancel'), array('id' => 'btn_cancel', 'name' => 'btn_cancel', 'class' => 'btn btn-danger', 'onclick' => 'fun_EnviarAnular()')); ?>
            <?php 
                if(Yii::app()->getSession()->get('RolNombre', FALSE)=='ADMIN'){
                    echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'To correct'), array('id' => 'btn_corregir', 'name' => 'btn_corregir', 'class' => 'btn btn-danger', 'onclick' => 'fun_EnviarCorreccion()')); 
                }
            ?>
            <?php echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Edit mail'),array('NubeFactura/updatemail'), array('id' => 'btn_Update', 'name' => 'btn_Update','title' => Yii::t('CONTROL_ACCIONES', 'Edit mail'),'class' => 'btn btn-primary','onclick' => 'fun_UpdateMail()'));    ?>
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Forward mail'), array('id' => 'btn_reenviar', 'name' => 'btn_reenviar', 'class' => 'btn btn-primary', 'onclick' => 'fun_EnviarCorreo()')); ?>
        </div>
    </div>
</div>