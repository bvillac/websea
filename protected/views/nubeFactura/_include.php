<?php
$ruta = dirname(__FILE__) . DIRECTORY_SEPARATOR;
$cs = Yii::app()->getClientScript();
$baseUrl = Yii::app()->getAssetManager()->publish($ruta . 'js/nubeFactura.js');
$cs->registerScriptFile($baseUrl);
//$baseUrl = Yii::app()->getAssetManager()->publish($ruta . 'css/nubeFactura.css');
//$cs->registerCssFile($baseUrl);
?>