<?php

/* @var $this NubeFacturaController */
/* @var $model NubeFactura */

/* $this->breadcrumbs=array(
  'Nube Facturas'=>array('index'),
  'Create',
  );

  $this->menu=array(
  array('label'=>'List NubeFactura', 'url'=>array('index')),
  array('label'=>'Manage NubeFactura', 'url'=>array('admin')),
  ); */
?>

<?php //$this->renderPartial('_form', array('model'=>$model));  ?>

<?php

//require_once(Yii::app()->basePath . '/extensions/my-php-file.php');
$opcion['TIP_DOC']='F4';//Tipo Documento
$opcion['NUM_DOC']='000117005';//Numero Documento
$opcion['OP']='1';//1=>todos los Registros y 2=> Un solo registro
$obj = new NubeFactura;
$obj->insertarFacturas($opcion);
//$obj->ClaveAcceso('01','2014-01-01','1790221806001','1','001001','000003012','1');
//$obj->modulo11('060820140109928098410011001001000101253002199121');
//*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//echo "hola";
//$bcode = new CBarCode();
//echo $bcode->output('060820140109928098410011001001000101253002199121',1);


/*
  echo dirname(__FILE__).'<br>';///var/www/html/websea/protected/views/nubeFactura
  echo $ruta = Yii::app()->basePath.'<br>';///var/www/html/websea/protected
  echo Yii::app()->theme->baseUrl.'<br>';///websea/themes/seablue
  echo Yii::app()->baseUrl; */
?>
<?php

/* EJEMPO DE FIRMADO */
//$obj = new VSFirmaDigital;
//$Dataf = $obj->recuperarFirmaDigital('1');
//echo base64_decode($Dataf['Clave']);
//echo base64_decode($Dataf['RutaFile']);

/* $x509 = Yii::app()->phpseclib->createX509(); //Crear el ObjetoX509
  $RutaFile = explode(".", base64_decode($Dataf['RutaFile'])); //Obtiene el Nombre del Certificado x Default = .p12
  $file = Yii::app()->params['seaFirma'] . $RutaFile[0] . '.crt'; //Se crea el Archivo .crt para que lo pueda leer
  //Leer el archivo certificado
  $fd = fopen($file, 'r');
  $p12buf = fread($fd, filesize($file));
  fclose($fd);
  //se carga el Certificado para Manipular
  $cert = $x509->loadX509($p12buf); */

//echo base64_decode('zA829l1Fd0svaK2S0L9snA4NEXI=');
//echo bin2hex(Yii::app()->phpseclib->hash("md2", "test"))."\n";
//echo 'COMPONENTE <BR>';
//echo bin2hex(Yii::app()->phpseclib->hash("md5", "test"))."\n";
//echo 'COMPONENTE <BR>';
//print_r($cert).'<BR>';
/* echo '<BR> CLAVE PUBLICA <BR>';
  echo $x509->getPublicKey();
  echo '<BR> CLAVE PUBLICA <BR>';
  echo $x509->getDN(true);
  echo '<BR> CLAVE PUBLICA <BR>';
  print_r($x509->getDN());
  echo '<BR> CLAVE PUBLICA <BR>';
  print_r($x509->getIssuerDNProp('CN'));
  echo '<BR> CLAVE PUBLICA <BR>';
  print_r($x509->getIssuerDN('CN'));
  echo '<BR> CLAVE PUBLICA <BR>';
  echo $x509->getIssuerDN(true); */
//echo trim($x509->getIssuerDN(true));

/* print_r($x509->getPublicKey());
  echo '<BR> CLAVE PUBLICA <BR>';
  $ps= $x509->getPublicKey();
  print_r($ps);
  echo '<BR> CLAVE PUBLICA <BR>';
  $ps= $x509->getPublicKey();
  print_r($ps);
  echo '<BR> CLAVE PUBLICA <BR>';
  $ps= $x509->getPublicKey();
  print_r($ps); */

//echo $cert['tbsCertificate']['validity']['notBefore']['utcTime'];
//echo '<BR> fechas <BR>';
//echo $cert['tbsCertificate']['validity']['notAfter']['utcTime'];
//$keys = Yii::app()->phpseclib->createRSA()->createKey();
//print_r($keys);
//echo $cert['signature'];
//echo $cert['tbsCertificate']['serialNumber'];
//echo $x509->getIssuerDN(true);
//echo $cert['tbsCertificate']['signature']['algorithm'];
//print_r($cert['tbsCertificate']['signature']['parameters']);
//print_r($cert['tbsCertificate']['issuer']);
//Nota hay que seguir ingresando arry por array para scar los valores
//echo $cert['tbsCertificate']['issuer']['rdnSequence'][0][0]['value']['printableString'];
//print_r($cert['tbsCertificate']['subjectPublicKeyInfo']['subjectPublicKey']);





/* $file = Yii::app()->params['seaFirma']."carlos_enrique_castro_espana.crt";
  Yii::import('system.vendors.phpseclib.classes.*');
  //require_once('File/X509.php');
  include('File/X509.php');
  echo Yii::app()->params['seaFirma'].base64_decode($Dataf['RutaFile']);
  $x509 = new File_X509();
  $fd = fopen($file, 'r');
  $p12buf = fread($fd, filesize($file));
  fclose($fd);
  //$cert = $x509->loadX509(Yii::app()->params['seaFirma'].base64_decode($Dataf['RutaFile']));
  $cert = $x509->loadX509($p12buf);
  print_r($cert);
  //echo $x509->getPublicKey(); */

/*
  $file = Yii::app()->params['seaFirma'] . base64_decode($Dataf['RutaFile']);
  //echo $file;
  // puede ser .crt o .cert también
  $fd = fopen($file, 'r');
  $p12buf = fread($fd, filesize($file));
  fclose($fd);

  $p12cert = array();
  $pass = base64_decode($Dataf['Clave']);
  // En este array almacenaremos la info del privatekey
  openssl_pkcs12_read($p12buf, $p12cert, $pass);
  //echo $p12cert["pkey"];
  //print_r($p12cert);

  echo "<h1>Mi Primer Test</h1>";
  if (openssl_pkcs12_read($p12buf, $p12cert, $pass)) {
  echo "Funciona";
  } else {
  echo "No funciona";
  }
  $privatekey = $p12cert["pkey"];
  $res = openssl_pkey_new();
  openssl_pkey_export($res, $p12cert["pkey"]);
  //print_r($res);
  $publickey = openssl_pkey_get_details($res);
  //print_r($publickey);
  $publickey = $publickey["key"];
  //print_r($publickey);

  echo "<h2>Private Key:</h2>$privatekey<br><h2>Public Key:</h2>$publickey<BR>";

  $cleartext = htmlentities('<center><b>Texto HTML</b></center>');

  echo "<h2>Original:</h2>$cleartext<BR><BR>";

  openssl_public_encrypt($cleartext, $crypttext, $publickey);

  echo "<h2>Encriptada:</h2>$crypttext<BR><BR>";

  $PK2 = openssl_get_privatekey($p12cert["pkey"]);

  $Crypted = openssl_private_decrypt($crypttext, $Decrypted, $PK2);
  if (!$Crypted) {
  $MSG.="<p class='error'>Imposible desencriptar ($CCID).</p>";
  } else {
  echo "<h2>Desencriptada:</h2>" . $Decrypted;
  } */


/* Yii::import('system.vendors.xmlseclib.*');
  require_once('xmlseclibs.php');
  //require(dirname(__FILE__) . '/../xmlseclibs.php');
  $filexml = Yii::app()->params['seaDocFact'] . '/FACTURA-001-001-000108133.xml';
  //if (file_exists($filexml)) {
  //    unlink($filexml);
  //}
  $doc = new DOMDocument();
  $doc->load($filexml);
  $objDSig = new XMLSecurityDSig();
  $objDSig->setCanonicalMethod(XMLSecurityDSig::EXC_C14N);
  $objDSig->addReference($doc, XMLSecurityDSig::SHA1, array('http://www.w3.org/2000/09/xmldsig#enveloped-signature'));
  $objKey = new XMLSecurityKey(XMLSecurityKey::RSA_SHA1, array('type' => 'private'));
  //load private key
  $objKey->loadKey(Yii::app()->params['seaFirma'] . $RutaFile[0] . '.pem', TRUE);
  // if key has Passphrase, set it using $objKey->passphrase = <passphrase> "
  $objDSig->sign($objKey);
  //Add associated public key
  $objDSig->add509Cert(file_get_contents(Yii::app()->params['seaFirma'] . $RutaFile[0] . '.pem'));
  $objDSig->appendSignature($doc->documentElement);
  $doc->save($filexml);
  //$sign_output = file_get_contents($filexml);
  //$sign_output_def = file_get_contents(dirname(__FILE__) . '/sign-basic-test.res');
  //if ($sign_output != $sign_output_def) {
  //    echo "NOT THE SAME";
  //}
  //echo "DONE";


  /******************* NUSOAP *********************** */
/*
  Yii::import('system.vendors.nusoap.lib.*');
  require_once('nusoap.php');
  $obj = new VSFirmaDigital;
  $Dataf = $obj->recuperarFirmaDigital('1');
  $fileCertificado = Yii::app()->params['seaFirma'] . base64_decode($Dataf['RutaFile']);
  //echo '<br>';
  $pass = base64_decode($Dataf['Clave']);
  //echo '<br>';
  $filexml = Yii::app()->params['seaDocXml'] . 'FACTURA-001-001-000116980.xml';
  //$client = new nusoap_client('http://www.lapolitecnica.net/webservices/servicio.php?wsdl', 'wsdl');


  $client = new nusoap_client('http://127.0.0.1:8080/FIRMARSRI/FirmaElectronicaSRI?wsdl', 'wsdl');
  $err = $client->getError();
  if ($err) {
  echo 'Error en Constructor' . $err;
  }
  $ruta23 = Yii::app()->params['seaDocFact'];
  //$param = array('param_id' => '2', 'param_txt' => 'DVD');
  $param = array(
  'pathOrigen' => $filexml,
  'pathFirmado' => Yii::app()->params['seaDocFact'],
  'pathCertificado' => $fileCertificado,
  'clave' => $pass,
  'nombreFirmado' => 'FACTURA-001-001-000108133.xml'
  );

  $result = $client->call('firmar', $param);

  if ($client->fault) {
  echo 'Fallo';
  print_r($result);
  } else { // Chequea errores
  $err = $client->getError();
  if ($err) {  // Muestra el error
  echo 'Error' . $err;
  } else {  // Muestra el resultado
  //echo 'Resultado';
  //print_r($result);
  echo $result['return'];
  }
  }
*/

/*
        $obj = new NubeFactura;
        $ids=63;
        $cabFact = $obj->mostrarCabFactura($ids, '01');
        $detFact = $obj->mostrarDetFacturaImp($ids);
        $impFact = $obj->mostrarFacturaImp($ids);
        $adiFact = $obj->mostrarFacturaDataAdicional($ids);
        print_r($impFact);
        //echo sizeof($impFact);
        
        $xmldata ='<totalConImpuestos>';
                        $IRBPNR = 0; //NOta validar si existe casos para estos
                        $ICE = 0;
                        for ($i = 0; $i < sizeof($impFact); $i++) {
                            
                            if ($impFact[$i]['Codigo'] == '2') {//Valores de IVA
                                echo $impFact[$i]['Codigo'];
                                switch ($impFact[$i]['CodigoPorcentaje']) {
                                    case 0:
                                        $BASEIVA0=$impFact[$i]['BaseImponible'];
                                        $xmldata .='<totalImpuesto>';
                                                $xmldata .='<codigo>' . $impFact[$i]["Codigo"] . '</codigo>';
                                                $xmldata .='<codigoPorcentaje>' . $impFact[$i]["CodigoPorcentaje"] . '</codigoPorcentaje>';
                                                $xmldata .='<baseImponible>' . Yii::app()->format->formatNumber($impFact[$i]["BaseImponible"]) . '</baseImponible>';
                                                $xmldata .='<tarifa>' . Yii::app()->format->formatNumber($impFact[$i]["Tarifa"]) . '</tarifa>';
                                                $xmldata .='<valor>' . Yii::app()->format->formatNumber($impFact[$i]["Valor"]) . '</valor>';
                                        $xmldata .='</totalImpuesto>';
                                        break;
                                    case 2:
                                        $BASEIVA12 = $impFact[$i]['BaseImponible'];
                                        $VALORIVA12 = $impFact[$i]['Valor'];
                                        $xmldata .='<totalImpuesto>';
                                                $xmldata .='<codigo>' . $impFact[$i]["Codigo"] . '</codigo>';
                                                $xmldata .='<codigoPorcentaje>' . $impFact[$i]["CodigoPorcentaje"] . '</codigoPorcentaje>';
                                                $xmldata .='<baseImponible>' . Yii::app()->format->formatNumber($impFact[$i]["BaseImponible"]) . '</baseImponible>';
                                                $xmldata .='<tarifa>' . Yii::app()->format->formatNumber($impFact[$i]["Tarifa"]) . '</tarifa>';
                                                $xmldata .='<valor>' . Yii::app()->format->formatNumber($impFact[$i]["Valor"]) . '</valor>';
                                            $xmldata .='</totalImpuesto>';
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
                        $xmldata .='</totalConImpuestos>';
                        
        echo htmlentities($xmldata);
*/

/* * *******    ENVIO DE LA INFORMACION WEB SERVICE  *********** */
/*
Yii::import('system.vendors.nusoap.lib.*');
require_once('nusoap.php');
$obj = new VSFirmaDigital;
$filexml = Yii::app()->params['seaDocFact'] . 'FACTURA-001-001-000116973.xml';
//echo $filexml . '<br>';
//$file_size = $obj->convertFileSize(filesize($filexml));
//print_r($file_size);
//echo $file_size['size'];
//$contenido=file_get_contents($filexml);
//echo $contenido;
//$filebyte = $obj->Base64StrToByteArray($contenido);
//print_r($filebyte);
//$file64base = base64_encode(file_get_contents($filexml)); //SE OBTIEN EL XML Y SE LO LLEVA BASE64
//print_r($file64base);
//$filebyte = $obj->Base64StrToByteArray($file64base); //LOS TRASNFORMA UN ARRAY DE BYTES

//contrario.. primero a bynario y despues base64
$file64base = $obj->StrToByteArray(file_get_contents($filexml));
$filebyte=base64_encode(file_get_contents($filexml));



//print_r($filebyte);
//echo count($filebyte);
//$res=$obj->ByteArrayToStr($filebyte);//DEVUELVE A STRING
//echo '<br>'.$res;
//echo base64_decode($res);
//APLICANADO NUSOAP
//$wdsl = 'https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantes?wsdl'; //Ruta del Web service SRI RecepcionComprobantes
$wdsl = 'https://celcer.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes?wsdl'; //Ruta del Web service SRI AutorizacionComprobantes

//echo $wdsl. '<br>';
$client = new nusoap_client($wdsl, 'wsdl');
//$client->useHTTPPersistentConnection();

$err = $client->getError();
if ($err) {
    echo 'Error en Constructor' . $err;
}
$param = array(
    //'xml' => $filebyte
    'claveAccesoComprobante' => '1711201401099236253700110010010001169739088802118'
);

//$response = $client->call('validarComprobante', $param);
$response = $client->call('autorizacionComprobante', $param);

if ($client->fault) {
    echo 'Existe un Problemas en el Envio';
    print_r($response);
} else { // Chequea errores
    $err = $client->getError();
    if ($err) {  // Muestra el error
        echo 'Error' . $err;
    } else {  // Muestra el resultado
        //echo 'Resultado';
        print_r($response);
        //$Recepcion=$response['RespuestaRecepcionComprobante'];//Response Recibido
        //$estado=$Recepcion['estado'];//Devuelve el Estod del Documento
        //$comprobantes=$Recepcion['comprobantes'];//Array del Comprobante
        //$comprobante=$comprobantes['comprobante'];//Mensajes del COmprobante
        //$mensajes=$comprobante['mensajes'];//Data mensajes del Error Recibido
        //print_r($mensajes);
        //echo $mensajes['mensaje']['identificador'];
        //echo $mensajes['mensaje']['mensaje'];
        //echo $mensajes['mensaje']['informacionAdicional'];
        //echo $mensajes['mensaje']['tipo'];
    }
}
*/


/****************** PRUEBA ERRORES SRI **********************/
//$obj = new VSFirmaDigital;
////$obj->insertarFacturas();
////$response=$obj->validarComprobante('FACTURA-001-001-000117002.xml');XML=1
////$response=$obj->validarComprobante('FACTURA-001-001-000117001.xml');//XML=2
////$response=$obj->autorizacionComprobante('1711201401099236253700110010010001169769089035214');
////$response=$obj->autorizacionComprobante('1711201401099236253700110010010001169769089035214');//Ojo error de diferencias
////$response=$obj->autorizacionComprobante('1711201401099236253700110010010001169779089112915');//Autorizado Normal
////$response=$obj->autorizacionComprobante('1711201401099236253700110010010001170029091055410');//XML=1
//$response=$obj->autorizacionComprobante('1711201401099236253700110010010001170019090977718');//XML=2
////print_r($response);
////[status] => OK [error] => [message] => Respuesta Ok WebService: autorizacionComprobante [data]
//
//if($response['status']=='OK'){
//    $numeroAutorizacion=(int)$response['data']['RespuestaAutorizacionComprobante']['numeroComprobantes'];
//    if($numeroAutorizacion>0){//Verifica si Autorizo algun Comprobante Apesar de recibirlo Autorizo Comprobante
//        $obj->actualizaDocRecibidoSri($response['data']['RespuestaAutorizacionComprobante'],'144','FACTURA-001-001-000117001.xml',Yii::app()->params['seaDocFact']);
//        $obj->newXMLDocRecibidoSri($response['data']['RespuestaAutorizacionComprobante'],'FACTURA-001-001-000117001.xml');
//        //print_r($response['data']);
//    }
//  
//}


?>