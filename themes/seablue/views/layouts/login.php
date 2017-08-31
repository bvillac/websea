<?php
/*if (Yii::app()->params["rsaEncryptUse"]) {
        Yii::app()->getClientScript()->registerCoreScript('bigint');
        Yii::app()->getClientScript()->registerCoreScript('rsa');
        Yii::app()->getClientScript()->registerCoreScript('base64');
    }*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/login-box.css" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/plantilla/loguito.ico" type="image/x-icon" />
        <!-- Core CSS - Include with every page -->
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/sb-admin.css" rel="stylesheet">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <div class="login" id="contenedor" align="center">
                
                <div class="row">
                    <div class="col-md-3 col-md-offset-5">
                        <div class="login-panel panel panel-default">
                            <div class="panel-heading">
                                <?php echo CHtml::image(Yii::app()->theme->baseUrl.'/images/plantilla/logo.png','Utimpor',array('width'=>'200px','height'=>'50px')); ?>
                            </div>
                            <div class="panel-body">
                                <?php echo $content; ?> 
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </body>
</html>
