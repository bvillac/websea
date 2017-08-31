<?php /* @var $this Controller */ ?>
<?php if (Yii::app()->getSession()->get('isuser', FALSE)) { 
     //Yii::app()->getClientScript()->registerCoreScript('base64');
    ?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo Yii::app()->language; ?>" lang="<?php echo Yii::app()->language; ?>">
<head>
            <meta http-equiv="Content-Type" content="text/html; charset=<?php echo Yii::app()->charset; ?>" />
            <meta name="language" content="<?php echo Yii::app()->language; ?>" />

            <!-- blueprint CSS framework -->
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
            <!--[if lt IE 8]>
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
            <![endif]-->

            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />


            <!-- Core CSS - Include with every bootstrap -->
            <!--<link href="<?php //echo Yii::app()->theme->baseUrl; ?>/css/bootstrap/bootstrap.min.css" rel="stylesheet" />
            <link href="<?php //echo Yii::app()->theme->baseUrl; ?>/css/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" />-->


            <!-- Core CSS - Include with every page -->
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">

            <!-- SB Admin CSS - Include with every page -->
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/sb-admin.css" rel="stylesheet">
            <!-- SB Admin CSS - Include with every page -->  
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/general/css/generico.css" />
            <!-- implementacion Jquery --> 
            <script src="<?php echo Yii::app()->baseUrl; ?>/themes/general/jquery/jquery.min.js" type="text/javascript"></script>
            <script src="<?php echo Yii::app()->baseUrl; ?>/themes/general/jquery/jquery-ui.min.js" type="text/javascript"></script>
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/general/jquery/css/smoothness/jquery-ui.min.css" />
            <script src="<?php echo Yii::app()->baseUrl; ?>/themes/general/js/general.js" type="text/javascript"></script>
            <!-- implementacion Encriptacion --> 
            <script src="<?php echo Yii::app()->baseUrl; ?>/themes/general/js/base64.js" type="text/javascript"></script>

            <!--<script type="text/javascript" src="<?php //echo Yii::app()->theme->baseUrl;   ?>/js/bootstrap/bootstrap.min.js"></script>-->
            <?php //CJavaScript::getScripts($this->getRoute()); ?>
            <?php //echo Yii::app()->bootstrap->register(); ?>
            <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/plantilla/loguito.ico" type="image/x-icon" />
            <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
    <body>

            <?php
            $cont = explode("/", Yii::app()->controller->route);
            echo CHtml::hiddenField('txth_controlador', Yii::app()->baseUrl . "/" . $cont[0]);
            echo CHtml::hiddenField('txth_rutaImg', Yii::app()->theme->baseUrl . "/images/");
            ?>

            <div id="wrapper">

                <?php include("navsuperior.php"); ?>

                <div id="page-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header"><?php echo $this->titleWindows; ?></h2>
                        </div>
                        <!-- /.col-lg-12 -->
                        <div class="col-lg-12">
                            <div id="messageInfo" style="display: none;" class="alert alert-info alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo $content; ?>
                        </div>
                    </div>

                </div>
                <!-- /#page-wrapper -->

            </div>
            <!-- /#wrapper -->
            <!--<div class="clear"></div>-->
            <div class="row">
                <div id="footer">
                    Copyright &copy; <?php echo date('Y'); ?> by SolucionesVillacreses.com.<br/>
                    All Rights Reserved.<br/>
                    <?php //echo Yii::powered(); ?>
                </div><!-- footer -->
            </div> 

            <!-- Core Scripts - Include with every page -->
            <!--<script src="<?php //echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.10.2.js"></script>-->
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>

            <!-- Page-Level Plugin Scripts - Blank -->

            <!-- SB Admin Scripts - Include with every page -->
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/sb-admin.js"></script>

            <!-- Page-Level Demo Scripts - Blank - Use for reference -->

        </body>
    </html>
    <?php
} else {
    //echo "NO Ingreso";
    $route = $this->getRoute();
    if ($route != "site/login")
        $this->isSession();
    else
        require_once("login.php");
}
?>