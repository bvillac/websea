<?php
$ruta = dirname(__FILE__) . DIRECTORY_SEPARATOR;
$cs = Yii::app()->getClientScript();
$baseUrl = Yii::app()->getAssetManager()->publish($ruta . 'js/usuario.js');
$cs->registerScriptFile($baseUrl);
//$baseUrl = Yii::app()->getAssetManager()->publish($ruta . 'css/vsCompania.css');
//$cs->registerCssFile($baseUrl);
?>