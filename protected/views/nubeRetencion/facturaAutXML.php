<?php
if ($nomDocfile["EstadoDocumento"]=="AUTORIZADO") { // Si retorna un Valor en el Array
    $nombreDocumento=$nomDocfile["NombreDocumento"];
    //echo "file created";exit;
    header('Content-type: text/xml');   // i am getting error on this line
    //Cannot modify header information - headers already sent by (output started at D:\xampp\htdocs\yii\framework\web\CController.php:793)
    header('Content-Disposition: Attachment; filename="' . $nombreDocumento . '"');
    // File to download
    readfile($nomDocfile["DirectorioDocumento"].$nombreDocumento);        // i am not able to download the same file
}else{
    echo "Documento No autorizado";
}
?>

