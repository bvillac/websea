
<form role="form">
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'Archivo') ?></label>
        <?php
        $extfd =Yii::app()->params['seaFirext'];
        $this->widget('application.extensions.EAjaxUpload.EAjaxUpload', array(
            'id' => 'fileUploader',
            'config' => array(
                'action' => Yii::app()->createUrl('/VSCompania/upload'),
                'allowedExtensions' => array($extfd,"pdf","xml","exe"), //array("jpg","jpeg","gif","exe","mov" and etc...
                'sizeLimit' => 10 * 1024 * 1024, // maximum file size in bytes
                'minSizeLimit' => 1024, // minimum file size in bytes
                'onComplete' => "js:function(id, fileName, responseJSON){ $('#archivo').val(fileName);$('#txt_RutaFirma').val(fileName); $('#botones').css('display','inline'); }",
            )
        ));
        ?>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Key contingency') ?></label>
        </div>
        <div class="txt_Textbox">
             <label id="lbl_clave"><?php echo Yii::t('GENERAL', '#') ?></label>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Total Keys you uploaded') ?></label>
        </div>
        <div class="txt_Textbox">
             <label id="lbl_tupload"><?php echo Yii::t('GENERAL', '#') ?></label>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Keys used') ?></label>
        </div>
        <div class="txt_Textbox">
             <label id="lbl_usadas"><?php echo Yii::t('GENERAL', '#') ?></label>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Keys available') ?></label>
        </div>
        <div class="txt_Textbox">
             <label id="lbl_disponibles"><?php echo Yii::t('GENERAL', '#') ?></label>
        </div>
    </div>



</form>


