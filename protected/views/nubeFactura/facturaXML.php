<?php

$xmldata = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<factura id="comprobante" version="1.1.0">
    <infoTributaria>
        <ambiente>' . $cabFact["Ambiente"] . '</ambiente>
        <tipoEmision>' . $cabFact["TipoEmision"] . '</tipoEmision>
        <razonSocial>' . Yii::app()->getSession()->get('RazonSocial', FALSE) . '</razonSocial>
        <nombreComercial>' . Yii::app()->getSession()->get('NombreComercial', FALSE) . '</nombreComercial>
        <ruc>' . Yii::app()->getSession()->get('Ruc', FALSE) . '</ruc>
        <claveAcceso>' . $cabFact["ClaveAcceso"] . '</claveAcceso>
        <codDoc>' . $cabFact["CodigoDocumento"] . '</codDoc>
        <estab>' . $cabFact["Establecimiento"] . '</estab>
        <ptoEmi>' . $cabFact["PuntoEmision"] . '</ptoEmi>
        <secuencial>' . $cabFact["Secuencial"] . '</secuencial>
        <dirMatriz>' . $cabFact["DireccionMatriz"] . '</dirMatriz>
    </infoTributaria>
    <infoFactura>
        <fechaEmision>' . date(Yii::app()->params["dateXML"], strtotime($cabFact["FechaEmision"])) . '</fechaEmision>
        <dirEstablecimiento>' . $cabFact["DireccionEstablecimiento"] . '</dirEstablecimiento>
        <contribuyenteEspecial>' . $cabFact["ContribuyenteEspecial"] . '</contribuyenteEspecial>
        <obligadoContabilidad>' . $cabFact["ObligadoContabilidad"] . '</obligadoContabilidad>
        <tipoIdentificacionComprador>' . $cabFact["TipoIdentificacionComprador"] . '</tipoIdentificacionComprador>
        <razonSocialComprador>' . $cabFact["RazonSocialComprador"] . '</razonSocialComprador>
        <identificacionComprador>' . $cabFact["IdentificacionComprador"] . '</identificacionComprador>
        <totalSinImpuestos>' . Yii::app()->format->formatNumber($cabFact["TotalSinImpuesto"]) . '</totalSinImpuestos>
        <totalDescuento>' . Yii::app()->format->formatNumber($cabFact["TotalDescuento"]) . '</totalDescuento>';
$xmldata .='<totalConImpuestos>';
$IRBPNR = 0; //NOta validar si existe casos para estos
$ICE = 0;
for ($i = 0; $i < sizeof($impFact); $i++) {
    if ($impFact[$i]['Codigo'] == '2') {//Valores de IVA
        switch ($impFact[$i]['CodigoPorcentaje']) {
            case 0:
                //$BASEIVA0=$impFact[$i]['BaseImponible'];
                break;
            case 2:
                $BASEIVA12 = $impFact[$i]['BaseImponible'];
                $VALORIVA12 = $impFact[$i]['Valor'];
                $xmldata .='<totalImpuesto>
                                <codigo>' . $impFact[$i]["Codigo"] . '</codigo>
                                <codigoPorcentaje>' . $impFact[$i]["CodigoPorcentaje"] . '</codigoPorcentaje>
                                <baseImponible>' . Yii::app()->format->formatNumber($impFact[$i]["BaseImponible"]) . '</baseImponible>
                                <tarifa>' . Yii::app()->format->formatNumber($impFact[$i]["Tarifa"]) . '</tarifa>
                                <valor>' . Yii::app()->format->formatNumber($impFact[$i]["Valor"]) . '</valor>
                            </totalImpuesto>';
                break;
            case 6://No objeto Iva
                //$NOOBJIVA=$impFact[$i]['BaseImponible'];
                break;
            case 7://Excento de Iva
                //$EXENTOIVA=$impFact[$i]['BaseImponible'];
                break;
            default:
        }
    }
    //NOta Verificar cuando el COdigo sea igual a 3 o 5 Para los demas impuestos
}

$xmldata .='</totalConImpuestos>
                <propina>' . Yii::app()->format->formatNumber($cabFact["Propina"]) . '</propina>
                <importeTotal>' . Yii::app()->format->formatNumber($cabFact["ImporteTotal"]) . '</importeTotal>
                <moneda>' . $cabFact["Moneda"] . '</moneda>
            </infoFactura>';
$xmldata .='<detalles>';
for ($i = 0; $i < sizeof($detFact); $i++) {//DETALLE DE FACTURAS
    $xmldata .='<detalle>
            <codigoPrincipal>' . $detFact[$i]['CodigoPrincipal'] . '</codigoPrincipal>
            <codigoAuxiliar>' . $detFact[$i]['CodigoAuxiliar'] . '</codigoAuxiliar>
            <descripcion>' . $detFact[$i]['Descripcion'] . '</descripcion>
            <cantidad>' . Yii::app()->format->formatNumber($detFact[$i]['Cantidad']) . '</cantidad>
            <precioUnitario>' . Yii::app()->format->formatNumber($detFact[$i]['PrecioUnitario']) . '</precioUnitario>
            <descuento>' . Yii::app()->format->formatNumber($detFact[$i]['Descuento']) . '</descuento>
            <precioTotalSinImpuesto>' . Yii::app()->format->formatNumber($detFact[$i]['PrecioTotalSinImpuesto']) . '</precioTotalSinImpuesto>
            <impuestos>';
    $impuesto = $detFact[$i]['impuestos'];
    for ($j = 0; $j < sizeof($impuesto); $j++) {//DETALLE IMPUESTO DE FACTURA
        $xmldata .='<impuesto>
                        <codigo>' . $impuesto[$j]['Codigo'] . '</codigo>
                        <codigoPorcentaje>' . $impuesto[$j]['CodigoPorcentaje'] . '</codigoPorcentaje>
                        <tarifa>' . Yii::app()->format->formatNumber($impuesto[$j]['Tarifa']) . '</tarifa>
                        <baseImponible>' . Yii::app()->format->formatNumber($impuesto[$j]['BaseImponible']) . '</baseImponible>
                        <valor>' . Yii::app()->format->formatNumber($impuesto[$j]['Valor']) . '</valor>
                    </impuesto>';
    }
    $xmldata .='</impuestos>
        </detalle>';
}
$xmldata .='</detalles>';
//    <retenciones>
//        <retencion>
//	    <codigo>4</codigo>
//	    <codigoPorcentaje>327</codigoPorcentaje>
//	    <tarifa>0.00</tarifa>	    
//	    <valor>0.00</valor>
//        </retencion>
//        <retencion>
//	    <codigo>4</codigo>
//	    <codigoPorcentaje>328</codigoPorcentaje>
//	    <tarifa>0.00</tarifa>	    
//	    <valor>0.00</valor>
//        </retencion>
//		 <retencion>
//	    <codigo>4</codigo>
//	    <codigoPorcentaje>3</codigoPorcentaje>
//	    <tarifa>1</tarifa>	    
//	    <valor>0.00</valor>
//        </retencion>
//    </retenciones>

$xmldata .='<infoAdicional>';
for ($i = 0; $i < sizeof($adiFact); $i++) {
    $xmldata .='<campoAdicional nombre="' . $adiFact[$i]['Nombre'] . '">' . $adiFact[$i]['Descripcion'] . '</campoAdicional>';
}
$xmldata .='</infoAdicional>';
$xmldata .=$firma;
$xmldata .='</factura>';
$nomDocfile = $cabFact['NombreDocumento'] . '-' . $cabFact['NumDocumento'] . '.xml';
if (file_put_contents(Yii::app()->params['seaDocFact'] . $nomDocfile, $xmldata)) { // this code is working fine xml get created
    //echo "file created";exit;
    header('Content-type: text/xml');   // i am getting error on this line
    //Cannot modify header information - headers already sent by (output started at D:\xampp\htdocs\yii\framework\web\CController.php:793)

    header('Content-Disposition: Attachment; filename="' . $nomDocfile . '"');
    // File to download
    readfile(Yii::app()->params['seaDocFact'] . $nomDocfile);        // i am not able to download the same file
}
//$xmlobj = new SimpleXMLElement($xmldata);
//$xmlobj->asXML(Yii::app()->params['seaDocFact'] . "memberBill.xml");
//echo htmlentities($xmldata);
?>

