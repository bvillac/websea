
<form role="form">
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'Archivo') ?></label>
        <?php
        $extfd =Yii::app()->params['seaFirext'];
        $this->widget('application.extensions.EAjaxUpload.EAjaxUpload', array(
            'id' => 'fileUploader',
            'config' => array(
                'action' => Yii::app()->createUrl('/VSCompania/upload'),
                'allowedExtensions' => array($extfd, "pdf"), //array("jpg","jpeg","gif","exe","mov" and etc...
                'sizeLimit' => 10 * 1024 * 1024, // maximum file size in bytes
                'minSizeLimit' => 1024, // minimum file size in bytes
                'onComplete' => "js:function(id, fileName, responseJSON){ $('#archivo').val(fileName);$('#txt_RutaFirma').val(fileName); $('#botones').css('display','inline'); }",
            )
        ));
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'Clave') ?></label>
        <?php 
        echo CHtml::passwordField('txt_Clave', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'Confirmar Clave') ?></label>
        <?php
        echo CHtml::passwordField('txt_conf_clave', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'Ruta Firma') ?></label>
        <?php
        echo CHtml::textField('txt_RutaFirma', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>




</form>


