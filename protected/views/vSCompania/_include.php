<?php

//$cont = explode("/", Yii::app()->controller->route);
//$baseUrl = Yii::app()->baseUrl . "/" . $cont[0];
//$cs = Yii::app()->getClientScript();
//$cs->registerScriptFile($baseUrl . '/js/vsCompania.js');
//$cs->registerCssFile($baseUrl.'/css/yourcss.css');

$ruta = dirname(__FILE__) . DIRECTORY_SEPARATOR;
$cs = Yii::app()->getClientScript();
$baseUrl = Yii::app()->getAssetManager()->publish($ruta . 'js/vsCompania.js');
$cs->registerScriptFile($baseUrl);
$baseUrl = Yii::app()->getAssetManager()->publish($ruta . 'css/vsCompania.css');
$cs->registerCssFile($baseUrl);
?>