<?php

/**
 * This is the model class for table "NubeGuiaRemision".
 *
 * The followings are the available columns in table 'NubeGuiaRemision':
 * @property string $IdGuiaRemision
 * @property string $AutorizacionSRI
 * @property string $FechaAutorizacion
 * @property integer $Ambiente
 * @property integer $TipoEmision
 * @property string $RazonSocial
 * @property string $NombreComercial
 * @property string $Ruc
 * @property string $ClaveAcceso
 * @property string $CodigoDocumento
 * @property string $Establecimiento
 * @property string $PuntoEmision
 * @property string $Secuencial
 * @property string $DireccionMatriz
 * @property string $DireccionEstablecimiento
 * @property string $DireccionPartida
 * @property string $RazonSocialTransportista
 * @property string $TipoIdentificacionTransportista
 * @property string $IdentificacionTransportista
 * @property string $Rise
 * @property string $ObligadoContabilidad
 * @property integer $ContribuyenteEspecial
 * @property string $FechaInicioTransporte
 * @property string $FechaFinTransporte
 * @property string $Placa
 * @property string $UsuarioCreador
 * @property string $EmailResponsable
 * @property string $EstadoDocumento
 * @property string $DescripcionError
 * @property string $CodigoError
 * @property string $DirectorioDocumento
 * @property string $NombreDocumento
 * @property integer $GeneradoXls
 * @property string $SecuencialERP
 * @property integer $Estado
 * @property string $IdLote
 *
 * The followings are the available model relations:
 * @property NubeDatoAdicionalGuiaRemision[] $nubeDatoAdicionalGuiaRemisions
 * @property NubeGuiaRemisionDestinatario[] $nubeGuiaRemisionDestinatarios
 */
class NubeGuiaRemision extends VsSeaIntermedia {
    private $tipoDoc='06';
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        //return 'NubeGuiaRemision';
        $dbname = parent::$dbname;
        if ($dbname != "")
            $dbname.=".";
        return $dbname . 'NubeGuiaRemision'; //Empresas es la Utilizada.
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Ambiente, TipoEmision, ContribuyenteEspecial, GeneradoXls, Estado', 'numerical', 'integerOnly' => true),
            array('AutorizacionSRI, EmailResponsable, DirectorioDocumento', 'length', 'max' => 100),
            array('RazonSocial, NombreComercial, DireccionMatriz, DireccionEstablecimiento, DireccionPartida, RazonSocialTransportista, UsuarioCreador, DescripcionError, NombreDocumento', 'length', 'max' => 300),
            array('Ruc, IdentificacionTransportista', 'length', 'max' => 13),
            array('ClaveAcceso, IdLote', 'length', 'max' => 50),
            array('CodigoDocumento, TipoIdentificacionTransportista, ObligadoContabilidad', 'length', 'max' => 2),
            array('Establecimiento, PuntoEmision', 'length', 'max' => 3),
            array('Secuencial', 'length', 'max' => 15),
            array('Rise', 'length', 'max' => 40),
            array('Placa', 'length', 'max' => 20),
            array('EstadoDocumento', 'length', 'max' => 25),
            array('CodigoError', 'length', 'max' => 4),
            array('SecuencialERP', 'length', 'max' => 30),
            array('FechaAutorizacion, FechaInicioTransporte, FechaFinTransporte', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdGuiaRemision, AutorizacionSRI, FechaAutorizacion, Ambiente, TipoEmision, RazonSocial, NombreComercial, Ruc, ClaveAcceso, CodigoDocumento, Establecimiento, PuntoEmision, Secuencial, DireccionMatriz, DireccionEstablecimiento, DireccionPartida, RazonSocialTransportista, TipoIdentificacionTransportista, IdentificacionTransportista, Rise, ObligadoContabilidad, ContribuyenteEspecial, FechaInicioTransporte, FechaFinTransporte, Placa, UsuarioCreador, EmailResponsable, EstadoDocumento, DescripcionError, CodigoError, DirectorioDocumento, NombreDocumento, GeneradoXls, SecuencialERP, Estado, IdLote', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'nubeDatoAdicionalGuiaRemisions' => array(self::HAS_MANY, 'NubeDatoAdicionalGuiaRemision', 'IdGuiaRemision'),
            'nubeGuiaRemisionDestinatarios' => array(self::HAS_MANY, 'NubeGuiaRemisionDestinatario', 'IdGuiaRemision'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'IdGuiaRemision' => 'Id Guia Remision',
            'AutorizacionSRI' => 'Autorizacion Sri',
            'FechaAutorizacion' => 'Fecha Autorizacion',
            'Ambiente' => 'Ambiente',
            'TipoEmision' => 'Tipo Emision',
            'RazonSocial' => 'Razon Social',
            'NombreComercial' => 'Nombre Comercial',
            'Ruc' => 'Ruc',
            'ClaveAcceso' => 'Clave Acceso',
            'CodigoDocumento' => 'Codigo Documento',
            'Establecimiento' => 'Establecimiento',
            'PuntoEmision' => 'Punto Emision',
            'Secuencial' => 'Secuencial',
            'DireccionMatriz' => 'Direccion Matriz',
            'DireccionEstablecimiento' => 'Direccion Establecimiento',
            'DireccionPartida' => 'Direccion Partida',
            'RazonSocialTransportista' => 'Razon Social Transportista',
            'TipoIdentificacionTransportista' => 'Tipo Identificacion Transportista',
            'IdentificacionTransportista' => 'Identificacion Transportista',
            'Rise' => 'Rise',
            'ObligadoContabilidad' => 'Obligado Contabilidad',
            'ContribuyenteEspecial' => 'Contribuyente Especial',
            'FechaInicioTransporte' => 'Fecha Inicio Transporte',
            'FechaFinTransporte' => 'Fecha Fin Transporte',
            'Placa' => 'Placa',
            'UsuarioCreador' => 'Usuario Creador',
            'EmailResponsable' => 'Email Responsable',
            'EstadoDocumento' => 'Estado Documento',
            'DescripcionError' => 'Descripcion Error',
            'CodigoError' => 'Codigo Error',
            'DirectorioDocumento' => 'Directorio Documento',
            'NombreDocumento' => 'Nombre Documento',
            'GeneradoXls' => 'Generado Xls',
            'SecuencialERP' => 'Secuencial Erp',
            'Estado' => 'Estado',
            'IdLote' => 'Id Lote',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('IdGuiaRemision', $this->IdGuiaRemision, true);
        $criteria->compare('AutorizacionSRI', $this->AutorizacionSRI, true);
        $criteria->compare('FechaAutorizacion', $this->FechaAutorizacion, true);
        $criteria->compare('Ambiente', $this->Ambiente);
        $criteria->compare('TipoEmision', $this->TipoEmision);
        $criteria->compare('RazonSocial', $this->RazonSocial, true);
        $criteria->compare('NombreComercial', $this->NombreComercial, true);
        $criteria->compare('Ruc', $this->Ruc, true);
        $criteria->compare('ClaveAcceso', $this->ClaveAcceso, true);
        $criteria->compare('CodigoDocumento', $this->CodigoDocumento, true);
        $criteria->compare('Establecimiento', $this->Establecimiento, true);
        $criteria->compare('PuntoEmision', $this->PuntoEmision, true);
        $criteria->compare('Secuencial', $this->Secuencial, true);
        $criteria->compare('DireccionMatriz', $this->DireccionMatriz, true);
        $criteria->compare('DireccionEstablecimiento', $this->DireccionEstablecimiento, true);
        $criteria->compare('DireccionPartida', $this->DireccionPartida, true);
        $criteria->compare('RazonSocialTransportista', $this->RazonSocialTransportista, true);
        $criteria->compare('TipoIdentificacionTransportista', $this->TipoIdentificacionTransportista, true);
        $criteria->compare('IdentificacionTransportista', $this->IdentificacionTransportista, true);
        $criteria->compare('Rise', $this->Rise, true);
        $criteria->compare('ObligadoContabilidad', $this->ObligadoContabilidad, true);
        $criteria->compare('ContribuyenteEspecial', $this->ContribuyenteEspecial);
        $criteria->compare('FechaInicioTransporte', $this->FechaInicioTransporte, true);
        $criteria->compare('FechaFinTransporte', $this->FechaFinTransporte, true);
        $criteria->compare('Placa', $this->Placa, true);
        $criteria->compare('UsuarioCreador', $this->UsuarioCreador, true);
        $criteria->compare('EmailResponsable', $this->EmailResponsable, true);
        $criteria->compare('EstadoDocumento', $this->EstadoDocumento, true);
        $criteria->compare('DescripcionError', $this->DescripcionError, true);
        $criteria->compare('CodigoError', $this->CodigoError, true);
        $criteria->compare('DirectorioDocumento', $this->DirectorioDocumento, true);
        $criteria->compare('NombreDocumento', $this->NombreDocumento, true);
        $criteria->compare('GeneradoXls', $this->GeneradoXls);
        $criteria->compare('SecuencialERP', $this->SecuencialERP, true);
        $criteria->compare('Estado', $this->Estado);
        $criteria->compare('IdLote', $this->IdLote, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return NubeGuiaRemision the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function mostrarDocumentos($control) {
        $page= new VSValidador;
        $rawData = array();
        $limitrowsql=$page->paginado($control);
        $tipoUser=Yii::app()->getSession()->get('RolId', FALSE);
        $usuarioErp=$this->concatenarUserERP(Yii::app()->getSession()->get('UsuarioErp', FALSE));
        //echo $usuarioErp;
        //$fecInifact=Yii::app()->params['dateStartFact'];//Fecha Inicial de Facturacion Electronica
        $fecInifact= date(Yii::app()->params['datebydefault']);
        $con = Yii::app()->dbvsseaint;

        $sql = "SELECT A.IdGuiaRemision IdDoc,A.Estado,A.SecuencialERP,A.UsuarioCreador,
                    A.FechaAutorizacion,A.AutorizacionSRI,A.ClaveAcceso,
                    CONCAT(A.Establecimiento,'-',A.PuntoEmision,'-',A.Secuencial) NumDocumento,
                B.FechaEmisionDocSustento,B.IdentificacionDestinatario,B.RazonSocialDestinatario,
                B.MotivoTraslado,'GUIA DE REMISION' NombreDocumento,A.FechaEmisionErp	
                    FROM " . $con->dbname . ".NubeGuiaRemision A
                            INNER JOIN " . $con->dbname . ".NubeGuiaRemisionDestinatario B
                                    ON A.IdGuiaRemision=B.IdGuiaRemision
            WHERE A.CodigoDocumento='$this->tipoDoc' AND A.Estado NOT IN (5) ";
        
        //Usuarios Vendedor con * es privilegiado y puede ver lo que factura el resta
        $sql .= ($usuarioErp!='*') ? "AND A.UsuarioCreador IN ('$usuarioErp')" : "";//Para Usuario Vendedores.
        //$sql .= "AND A.UsuarioCreador IN ('$usuarioErp') " ;//Para Usuario Vendedores.*/
        
        if (!empty($control)) {//Verifica la Opcion op para los filtros
            $sql .= ($control[0]['TIPO_APR'] != "0") ? " AND A.Estado = '" . $control[0]['TIPO_APR'] . "' " : " AND A.Estado NOT IN (5) ";
            $sql .= ($control[0]['CEDULA'] > 0) ? "AND A.IdentificacionDestinatario = '" . $control[0]['CEDULA'] . "' " : "";
            if($control[0]['F_INI']!='' AND $control[0]['F_FIN']!=''){//Si vienen valores en blanco en las fechas muestra todos
                $sql .= "AND DATE(A.FechaEmisionErp) BETWEEN '" . date("Y-m-d", strtotime($control[0]['F_INI'])) . "' AND '" . date("Y-m-d", strtotime($control[0]['F_FIN'])) . "'  ";
            }
        }
        $sql .= "ORDER BY A.IdGuiaRemision DESC  $limitrowsql";
        //echo $sql;

        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'IdDoc',
            'sort' => array(
                'attributes' => array(
                    'IdDoc', 'Estado', 'SecuencialERP', 'UsuarioCreador',
                    'FechaAutorizacion', 'AutorizacionSRI', 'NumDocumento', 'FechaEmisionDocSustento', 'IdentificacionDestinatario',
                    'RazonSocialDestinatario', 'NombreDocumento','FechaEmisionErp',
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            //'itemCount'=>count($rawData),
            ),
        ));
    }
    
    private function concatenarUserERP($str) {
        $UERPId="";
        $rawData = explode(",", $str);
        for ($i = 0; $i < sizeof($rawData); $i++) {
            $UERPId .= ($i == 0)?$rawData[$i]:"','".$rawData[$i];
        }
        return $UERPId;
    }
    
    
    /**
     * Función 
     *
     * @author Byron Villacreses
     * @access public
     * @return Retorna Los Datos de las Retenciones GENERADAS
     */
    public function retornarPersona($valor, $op) {
        $con = Yii::app()->dbvsseaint;
        $rawData = array();
        //Patron de Busqueda
        /* http://www.mclibre.org/consultar/php/lecciones/php_expresiones_regulares.html */
        $patron = "/^[[:digit:]]+$/"; //Los patrones deben empezar y acabar con el carácter / (barra).
        if (preg_match($patron, $valor)) {
            $op = "CED"; //La cadena son sólo números.
        } else {
            $op = "NOM"; //La cadena son Alfanumericos.
            //Las separa en un array 
            $aux = explode(" ", $valor);
            $condicion = " ";
            for ($i = 0; $i < count($aux); $i++) {
                //Crea la Sentencia de Busqueda
                //$condicion .=" AND (PER_NOMBRE LIKE '%$aux[$i]%' OR PER_APELLIDO LIKE '%$aux[$i]%' ) ";
                $condicion .=" AND RazonSocialDestinatario LIKE '%$aux[$i]%' ";
            }
        }
        $sql = "SELECT B.IdentificacionDestinatario,B.RazonSocialDestinatario
                    FROM " . $con->dbname . ".NubeGuiaRemision A
                            INNER JOIN " . $con->dbname . ".NubeGuiaRemisionDestinatario B
                                    ON A.IdGuiaRemision=B.IdGuiaRemision
                  WHERE A.Estado<>0 GROUP BY B.IdentificacionDestinatario ";

        switch ($op) {
            case 'CED':
                $sql .=" AND IdentificacionDestinatario LIKE '%$valor%' ";
                break;
            case 'NOM':
                $sql .=$condicion;
                break;
            default:
        }
        $sql .= " LIMIT " . Yii::app()->params['limitRow'];
        //$sql .= " LIMIT 10";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    public function mostrarCabGuia($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        
        $sql = "SELECT A.IdGuiaRemision IdDoc,A.Estado,A.SecuencialERP,A.UsuarioCreador,
                    A.FechaAutorizacion,A.AutorizacionSRI,A.ClaveAcceso,A.Ambiente,A.TipoEmision,
                    CONCAT(A.Establecimiento,'-',A.PuntoEmision,'-',A.Secuencial) NumDocumento,
                    A.DireccionPartida,A.RazonSocialTransportista,A.IdentificacionTransportista,
                    A.FechaInicioTransporte,A.FechaFinTransporte,A.Placa,A.DireccionEstablecimiento,
                    'GUIA DE REMISION' NombreDocumento,A.TipoIdentificacionTransportista,A.Rise,A.CodigoDocumento,A.FechaEmisionErp,
                    A.Establecimiento,A.PuntoEmision,A.Secuencial,A.DireccionMatriz,A.ObligadoContabilidad,A.ContribuyenteEspecial
                    FROM " . $con->dbname . ".NubeGuiaRemision A
            WHERE A.CodigoDocumento='$this->tipoDoc' AND A.IdGuiaRemision =$id ";
        
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryRow(); //Recupera Solo 1
        $con->active = false;
        return $rawData;
    }
    
    public function mostrarDestinoGuia($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT * FROM " . $con->dbname . ".NubeGuiaRemisionDestinatario WHERE IdGuiaRemision=$id";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll(); 
        $con->active = false;
        for ($i = 0; $i < sizeof($rawData); $i++) {
            $rawData[$i]['GuiaDet'] = $this->mostrarDetGuia($rawData[$i]['IdGuiaRemisionDestinatario']); //Retorna el Detalle del Impuesto
        }
        return $rawData;
    }
    
    private function mostrarDetGuia($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT * FROM " . $con->dbname . ".NubeGuiaRemisionDetalle WHERE IdGuiaRemisionDestinatario=$id";
        $rawData = $con->createCommand($sql)->queryAll(); 
        $con->active = false;
        for ($i = 0; $i < sizeof($rawData); $i++) {
            $rawData[$i]['GuiaDetAdi'] = $this->mostrarDetGuiaDatoAdi($rawData[$i]['IdGuiaRemisionDetalle']); //Retorna el Detalle del Impuesto
        }
        return $rawData;
    }
    
    private function mostrarDetGuiaDatoAdi($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT * FROM " . $con->dbname . ".NubeDatoAdicionalGuiaRemisionDetalle WHERE IdGuiaRemisionDetalle=$id";
        $rawData = $con->createCommand($sql)->queryAll(); 
        $con->active = false;
        return $rawData;
    }
    
    public function mostrarCabGuiaDataAdicional($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT * FROM " . $con->dbname . ".NubeDatoAdicionalGuiaRemision WHERE IdGuiaRemision=$id";
        $rawData = $con->createCommand($sql)->queryAll(); //Recupera Solo 1
        $con->active = false;
        return $rawData;
    }
    
    public function mostrarRutaXMLAutorizado($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT EstadoDocumento,DirectorioDocumento,NombreDocumento FROM " . $con->dbname . ".NubeGuiaRemision WHERE "
                . "IdGuiaRemision=$id AND EstadoDocumento='AUTORIZADO'";
        $rawData = $con->createCommand($sql)->queryRow(); //Recupera Solo 1
        $con->active = false;
        return $rawData;
    }
    
    /**
     * Funcion que Envia documentos de 1 en 1 para su Autorizacion
     * **/
     public function enviarDocumentos($id) {
        try {  
            $autDoc=new VSAutoDocumento();
            $errAuto= new VSexception();
            $ids = explode(",", $id);
            for ($i = 0; $i < count($ids); $i++) {
                if ($ids[$i] !== "") {
                    $result = $this->generarFileXML($ids[$i]);
                    $DirDocAutorizado=Yii::app()->params['seaDocAutGuia']; 
                    $DirDocFirmado=Yii::app()->params['seaDocGuia'];
                    if ($result['status'] == 'OK') {//Retorna True o False 
                        //echo $result['nomDoc'];
                        //Para Validaciones Masivas Hay que verificar lo que retorna la funcion
                        return $autDoc->AutorizaDocumento($result,$ids,$i,$DirDocAutorizado,$DirDocFirmado,'NubeGuiaRemision','GUIA','IdGuiaRemision');
                    }elseif ($result['status'] == 'OK_REG') {
                        //LA CLAVE DE ACCESO REGISTRADA ingresa directamente a Obtener su autorizacion
                        //Autorizacion de Comprobantes 
                        return $autDoc->autorizaComprobante($result, $ids, $i, $DirDocAutorizado, $DirDocFirmado, 'NubeGuiaRemision','GUIA','IdGuiaRemision');
                   
                    }else{
                        return $result;//$errAuto->messageSystem('NO_OK', $result["error"],1,null, null);
                    }
                }
            }
            return $errAuto->messageSystem('OK', null,40,null, null);
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            return $errAuto->messageSystem('NO_OK', $e->getMessage(), 41, null, null);
        }
    }
    
    private function generarFileXML($ids) {
        $autDoc=new VSAutoDocumento();
        $msgAuto= new VSexception();
        $valida= new VSValidador();
        $xmlGen=new VSXmlGenerador();
        $codDoc = $this->tipoDoc; //Documento Factura
        $cabFact = $this->mostrarCabGuia($ids);
        if (count($cabFact)>0) {
            switch ($cabFact["Estado"]) {
                case 2://RECIBIDO SRI (AUTORIZADOS)
                    return $msgAuto->messageFileXML('NO_OK', $cabFact["NumDocumento"], null, 42, null, null);
                    break;
                case 4://DEVUELTA (NO AUTORIZADOS EN PROCESO)                    
                    //Cuando son devueltas no se deben generar de nuevo la clave de acceso
                    //hay que esperar hasta que responda
                    switch ($cabFact["CodigoError"]) {
                        case 43://CLAVE DE ACCESO REGISTRADA
                            //No genera Nada Envia los datos generados anteriormente
                            //Retorna Automaticamente sin Generar Documento
                            //LA CLAVE DE ACCESO REGISTRADA ingresa directamente a Obtener su autorizacion
                            return $msgAuto->messageFileXML('OK_REG', $cabFact["NombreDocumento"], $cabFact["ClaveAcceso"], 43, null, null);
                            break;
                        case 70://CLAVE DE ACCESO EN PROCESO
                            return $msgAuto->messageFileXML('OK', $cabFact["NombreDocumento"], $cabFact["ClaveAcceso"], 43, null, null);
                            break;
                        default:
                            //Documento Devuelto hay que volver a generar la clave de Acceso
                            //Esto es Opcional
                            /*$objCla = new VSClaveAcceso();
                            $serie = $cabFact['Establecimiento'] . $cabFact['PuntoEmision'];
                            $fec_doc = date("Y-m-d", strtotime($cabFact['FechaEmisionErp']));
                            $ClaveAcceso = $objCla->claveAcceso($codDoc, $fec_doc, $cabFact['Ruc'], $cabFact['Ambiente'], $serie, $cabFact['Secuencial'], $cabFact['TipoEmision']);
                            $autDoc->actualizaClaveAccesoDocumento($ids, $ClaveAcceso, 'NubeGuiaRemision', 'IdGuiaRemision');
                            $cabFact = $this->mostrarCabGuia($ids);//Vuelve a Consultar con la Clave de Acceso Nueva.*/
                    }
                    break;
                case 8://DOCUMENTO ANULADO
                    return $msgAuto->messageSystem('NO_OK', null,11,null, null);//Peticion Invalida
                    break;
                default:
            }
        }else{
            //Si la Cabecera no devuelve registros Retorna un resultado  de False
            return $msgAuto->messageFileXML('NO_OK', null, null, 1, null, null);
        }
        
        $destDoc = $this->mostrarDestinoGuia($ids);
        $adiFact = $this->mostrarCabGuiaDataAdicional($ids);

        $xmldata = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
            $xmldata .='<guiaRemision id="comprobante" version="1.0.0">';//Version Normal Para 2 Decimales
            //$xmldata .='<comprobanteRetencion id="comprobante" version="1.1.0">';//Version para 4 Decimales en Precio Unitario
                $xmldata .= $xmlGen->infoTributaria($cabFact);                         
                $xmldata .='<infoGuiaRemision>';
                        if(strlen(trim($cabFact['DireccionEstablecimiento']))>0){
                            $xmldata .='<dirEstablecimiento>' . utf8_encode(trim($cabFact["DireccionEstablecimiento"])) . '</dirEstablecimiento>';//Obligado cuando Corresponda
                        } 
                        $xmldata .='<dirPartida>' . utf8_encode(trim($cabFact["DireccionPartida"])) . '</dirPartida>';
                        $xmldata .='<razonSocialTransportista>' . $valida->limpioCaracteresXML(trim($cabFact["RazonSocialTransportista"])) . '</razonSocialTransportista>';
                        $xmldata .='<tipoIdentificacionTransportista>' . utf8_encode(trim($cabFact["TipoIdentificacionTransportista"])) . '</tipoIdentificacionTransportista>';
                        $xmldata .='<rucTransportista>' . trim($cabFact["IdentificacionTransportista"]) . '</rucTransportista>';
                        if(strlen(trim($cabFact['Rise']))>0){
                            $xmldata .='<rise>' . utf8_encode(trim($cabFact["Rise"])) . '</rise>';//Obligado cuando Corresponda
                        }
                        if(strlen(trim($cabFact['ObligadoContabilidad']))>0){
                            $xmldata .='<obligadoContabilidad>' . utf8_encode(trim($cabFact["ObligadoContabilidad"])) . '</obligadoContabilidad>';//Obligado cuando Corresponda
                        }
                        if(strlen(trim($cabFact['ContribuyenteEspecial']))>0){
                            $xmldata .='<contribuyenteEspecial>' . utf8_encode(trim($cabFact["ContribuyenteEspecial"])) . '</contribuyenteEspecial>';//Obligado cuando Corresponda
                        }                      
                        $xmldata .='<fechaIniTransporte>' . date(Yii::app()->params["dateXML"], strtotime($cabFact["FechaInicioTransporte"])) . '</fechaIniTransporte>';
                        $xmldata .='<fechaFinTransporte>' . date(Yii::app()->params["dateXML"], strtotime($cabFact["FechaFinTransporte"])) . '</fechaFinTransporte>';
                        $xmldata .='<placa>' . trim($cabFact["Placa"]) . '</placa>';
                $xmldata .='</infoGuiaRemision>';
                $xmldata .='<destinatarios>';
                    for ($i = 0; $i < sizeof($destDoc); $i++) {
                        $xmldata .='<destinatario>';
                                $xmldata .='<identificacionDestinatario>' . utf8_encode(trim($destDoc[$i]['IdentificacionDestinatario'])) . '</identificacionDestinatario>';
                                $xmldata .='<razonSocialDestinatario>' . $valida->limpioCaracteresXML(trim($destDoc[$i]["RazonSocialDestinatario"])) . '</razonSocialDestinatario>';
                                $xmldata .='<dirDestinatario>' . $valida->limpioCaracteresXML(trim($destDoc[$i]["DirDestinatario"])) . '</dirDestinatario>';
                                $xmldata .='<motivoTraslado>' . trim($destDoc[$i]['MotivoTraslado']) . '</motivoTraslado>';
                                
                                //NOTA Verificar si estos campos No Obligados son Necesarios si en algun momento almens uno se cumple
                                if(strlen(trim($destDoc[$i]['DocAduaneroUnico']))>0){
                                    $xmldata .='<docAduaneroUnico>' . utf8_encode(trim($destDoc[$i]['DocAduaneroUnico'])) . '</docAduaneroUnico>';//Obligado cuando Corresponda
                                }
                                if(strlen(trim($destDoc[$i]['CodEstabDestino']))>0){
                                    $xmldata .='<codEstabDestino>' . utf8_encode(trim($destDoc[$i]['CodEstabDestino'])) . '</codEstabDestino>';//Obligado cuando Corresponda
                                }
                                if(strlen(trim($destDoc[$i]['Ruta']))>0){
                                    $xmldata .='<ruta>' . $valida->limpioCaracteresXML(trim($destDoc[$i]["Ruta"])) . '</ruta>';//Obligado cuando Corresponda
                                }
                                if(strlen(trim($destDoc[$i]['CodDocSustento']))>0){
                                    $xmldata .='<codDocSustento>' . utf8_encode(trim($destDoc[$i]['CodDocSustento'])) . '</codDocSustento>';//Obligado cuando Corresponda
                                }
                                if(strlen(trim($destDoc[$i]['NumDocSustento']))>0){
                                    $xmldata .='<numDocSustento>' . utf8_encode(trim($destDoc[$i]['NumDocSustento'])) . '</numDocSustento>';//Obligado cuando Corresponda
                                }
                                if(strlen(trim($destDoc[$i]['NumAutDocSustento']))>0){
                                    $xmldata .='<numAutDocSustento>' . utf8_encode(trim($destDoc[$i]['NumAutDocSustento'])) . '</numAutDocSustento>';//Obligado cuando Corresponda
                                }
                                if(trim($destDoc[$i]['FechaEmisionDocSustento'])<>'0000-00-00'){//Formato de Fecha Mysql
                                    $xmldata .='<fechaEmisionDocSustento>' . date(Yii::app()->params["dateXML"], strtotime($destDoc[$i]["FechaEmisionDocSustento"])) . '</fechaEmisionDocSustento>';//Obligado cuando Corresponda
                                }

                                $xmldata .='<detalles>';
                                    $detDoc=$destDoc[$i]['GuiaDet'];//Extrae el Detalle de la Guia de Remision
                                    for ($j = 0; $j < sizeof($detDoc); $j++) {
                                        $xmldata .='<detalle>';
                                                $xmldata .='<codigoInterno>' . utf8_encode(trim($detDoc[$j]['CodigoInterno'])) . '</codigoInterno>';
                                                if(strlen(trim($detDoc[$j]['CodigoAdicional']))>0){
                                                    $xmldata .='<codigoAdicional>' . utf8_encode(trim($detDoc[$j]['CodigoAdicional'])) . '</codigoAdicional>';//Obligado cuando Corresponda
                                                }                                                
                                                $xmldata .='<descripcion>' . utf8_encode($valida->limpioCaracteresXML(trim($detDoc[$j]["Descripcion"]))) . '</descripcion>';
                                                $xmldata .='<cantidad>' . Yii::app()->format->formatNumber($detDoc[$j]['Cantidad']) . '</cantidad>';
                                                $detAdi=$detDoc[$j]['GuiaDetAdi'];//Recupera Datos Adicionales del Detalle de la GUia
                                                if(sizeof($detAdi)>0){
                                                    $xmldata .= $xmlGen->guiadetallesAdicionales($detAdi);
                                                }  
                                        $xmldata .='</detalle>';
                                    }
                                $xmldata .='</detalles>';
                        $xmldata .='</destinatario>';
                    }
                $xmldata .='</destinatarios>';                
                $xmldata .= $xmlGen->infoAdicional($adiFact); 
        //$xmldata .=$firma;
        $xmldata .='</guiaRemision>';
        //echo htmlentities($xmldata);
        $nomDocfile = $cabFact['NombreDocumento'] . '-' . $cabFact['NumDocumento'] . '.xml';
        file_put_contents(Yii::app()->params['seaDocXml'] . $nomDocfile, $xmldata); //Escribo el Archivo Xml
        return $msgAuto->messageFileXML('OK', $nomDocfile, $cabFact["ClaveAcceso"], 2, null, null);
    }

}
