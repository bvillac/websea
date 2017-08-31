<?php

/**
 * This is the model class for table "NubeRetencion".
 *
 * The followings are the available columns in table 'NubeRetencion':
 * @property string $IdRetencion
 * @property string $AutorizacionSRI
 * @property string $FechaAutorizacion
 * @property integer $Ambiente
 * @property integer $TipoEmision
 * @property string $RazonSocial
 * @property string $NombreComercial
 * @property string $Ruc
 * @property string $ClaveAcceso
 * @property string $CodigoDocumento
 * @property string $PuntoEmision
 * @property string $Establecimiento
 * @property string $Secuencial
 * @property string $DireccionMatriz
 * @property string $FechaEmision
 * @property string $DireccionEstablecimiento
 * @property string $ContribuyenteEspecial
 * @property string $ObligadoContabilidad
 * @property string $TipoIdentificacionSujetoRetenido
 * @property string $IdentificacionSujetoRetenido
 * @property string $RazonSocialSujetoRetenido
 * @property string $PeriodoFiscal
 * @property string $TotalRetencion
 * @property string $UsuarioCreador
 * @property string $EmailResponsable
 * @property string $EstadoDocumento
 * @property string $DescripcionError
 * @property string $CodigoError
 * @property string $DirectorioDocumento
 * @property string $NombreDocumento
 * @property integer $GeneradoXls
 * @property string $SecuencialERP
 * @property string $CodigoTransaccionERP
 * @property integer $Estado
 * @property string $FechaCarga
 * @property string $IdLote
 *
 * The followings are the available model relations:
 * @property NubeDatoAdicionalRetencion[] $nubeDatoAdicionalRetencions
 * @property NubeDetalleRetencion[] $nubeDetalleRetencions
 */
class NubeRetencion extends VsSeaIntermedia {
    private $tipoDoc='07';
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        //return 'NubeRetencion';
        $dbname = parent::$dbname;
        if ($dbname != "")
            $dbname.=".";
        return $dbname . 'NubeRetencion'; //Empresas es la Utilizada.
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Ambiente, TipoEmision, GeneradoXls, Estado', 'numerical', 'integerOnly' => true),
            array('AutorizacionSRI, EmailResponsable, DirectorioDocumento', 'length', 'max' => 100),
            array('RazonSocial, NombreComercial, DireccionMatriz, DireccionEstablecimiento, RazonSocialSujetoRetenido, UsuarioCreador, DescripcionError, NombreDocumento', 'length', 'max' => 300),
            array('Ruc', 'length', 'max' => 13),
            array('ClaveAcceso, ContribuyenteEspecial, IdentificacionSujetoRetenido, CodigoTransaccionERP, IdLote', 'length', 'max' => 50),
            array('CodigoDocumento, ObligadoContabilidad, TipoIdentificacionSujetoRetenido', 'length', 'max' => 2),
            array('PuntoEmision, Establecimiento', 'length', 'max' => 3),
            array('Secuencial', 'length', 'max' => 15),
            array('PeriodoFiscal', 'length', 'max' => 10),
            array('TotalRetencion', 'length', 'max' => 19),
            array('EstadoDocumento', 'length', 'max' => 25),
            array('CodigoError', 'length', 'max' => 4),
            array('SecuencialERP', 'length', 'max' => 30),
            array('FechaAutorizacion, FechaEmision, FechaCarga', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdRetencion, AutorizacionSRI, FechaAutorizacion, Ambiente, TipoEmision, RazonSocial, NombreComercial, Ruc, ClaveAcceso, CodigoDocumento, PuntoEmision, Establecimiento, Secuencial, DireccionMatriz, FechaEmision, DireccionEstablecimiento, ContribuyenteEspecial, ObligadoContabilidad, TipoIdentificacionSujetoRetenido, IdentificacionSujetoRetenido, RazonSocialSujetoRetenido, PeriodoFiscal, TotalRetencion, UsuarioCreador, EmailResponsable, EstadoDocumento, DescripcionError, CodigoError, DirectorioDocumento, NombreDocumento, GeneradoXls, SecuencialERP, CodigoTransaccionERP, Estado, FechaCarga, IdLote', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'nubeDatoAdicionalRetencions' => array(self::HAS_MANY, 'NubeDatoAdicionalRetencion', 'IdRetencion'),
            'nubeDetalleRetencions' => array(self::HAS_MANY, 'NubeDetalleRetencion', 'IdRetencion'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'IdRetencion' => 'Id Retencion',
            'AutorizacionSRI' => 'Autorizacion Sri',
            'FechaAutorizacion' => 'Fecha Autorizacion',
            'Ambiente' => 'Ambiente',
            'TipoEmision' => 'Tipo Emision',
            'RazonSocial' => 'Razon Social',
            'NombreComercial' => 'Nombre Comercial',
            'Ruc' => 'Ruc',
            'ClaveAcceso' => 'Clave Acceso',
            'CodigoDocumento' => 'Codigo Documento',
            'PuntoEmision' => 'Punto Emision',
            'Establecimiento' => 'Establecimiento',
            'Secuencial' => 'Secuencial',
            'DireccionMatriz' => 'Direccion Matriz',
            'FechaEmision' => 'Fecha Emision',
            'DireccionEstablecimiento' => 'Direccion Establecimiento',
            'ContribuyenteEspecial' => 'Contribuyente Especial',
            'ObligadoContabilidad' => 'Obligado Contabilidad',
            'TipoIdentificacionSujetoRetenido' => 'Tipo Identificacion Sujeto Retenido',
            'IdentificacionSujetoRetenido' => 'Identificacion Sujeto Retenido',
            'RazonSocialSujetoRetenido' => 'Razon Social Sujeto Retenido',
            'PeriodoFiscal' => 'Periodo Fiscal',
            'TotalRetencion' => 'Total Retencion',
            'UsuarioCreador' => 'Usuario Creador',
            'EmailResponsable' => 'Email Responsable',
            'EstadoDocumento' => 'Estado Documento',
            'DescripcionError' => 'Descripcion Error',
            'CodigoError' => 'Codigo Error',
            'DirectorioDocumento' => 'Directorio Documento',
            'NombreDocumento' => 'Nombre Documento',
            'GeneradoXls' => 'Generado Xls',
            'SecuencialERP' => 'Secuencial Erp',
            'CodigoTransaccionERP' => 'Codigo Transaccion Erp',
            'Estado' => 'Estado',
            'FechaCarga' => 'Fecha Carga',
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

        $criteria->compare('IdRetencion', $this->IdRetencion, true);
        $criteria->compare('AutorizacionSRI', $this->AutorizacionSRI, true);
        $criteria->compare('FechaAutorizacion', $this->FechaAutorizacion, true);
        $criteria->compare('Ambiente', $this->Ambiente);
        $criteria->compare('TipoEmision', $this->TipoEmision);
        $criteria->compare('RazonSocial', $this->RazonSocial, true);
        $criteria->compare('NombreComercial', $this->NombreComercial, true);
        $criteria->compare('Ruc', $this->Ruc, true);
        $criteria->compare('ClaveAcceso', $this->ClaveAcceso, true);
        $criteria->compare('CodigoDocumento', $this->CodigoDocumento, true);
        $criteria->compare('PuntoEmision', $this->PuntoEmision, true);
        $criteria->compare('Establecimiento', $this->Establecimiento, true);
        $criteria->compare('Secuencial', $this->Secuencial, true);
        $criteria->compare('DireccionMatriz', $this->DireccionMatriz, true);
        $criteria->compare('FechaEmision', $this->FechaEmision, true);
        $criteria->compare('DireccionEstablecimiento', $this->DireccionEstablecimiento, true);
        $criteria->compare('ContribuyenteEspecial', $this->ContribuyenteEspecial, true);
        $criteria->compare('ObligadoContabilidad', $this->ObligadoContabilidad, true);
        $criteria->compare('TipoIdentificacionSujetoRetenido', $this->TipoIdentificacionSujetoRetenido, true);
        $criteria->compare('IdentificacionSujetoRetenido', $this->IdentificacionSujetoRetenido, true);
        $criteria->compare('RazonSocialSujetoRetenido', $this->RazonSocialSujetoRetenido, true);
        $criteria->compare('PeriodoFiscal', $this->PeriodoFiscal, true);
        $criteria->compare('TotalRetencion', $this->TotalRetencion, true);
        $criteria->compare('UsuarioCreador', $this->UsuarioCreador, true);
        $criteria->compare('EmailResponsable', $this->EmailResponsable, true);
        $criteria->compare('EstadoDocumento', $this->EstadoDocumento, true);
        $criteria->compare('DescripcionError', $this->DescripcionError, true);
        $criteria->compare('CodigoError', $this->CodigoError, true);
        $criteria->compare('DirectorioDocumento', $this->DirectorioDocumento, true);
        $criteria->compare('NombreDocumento', $this->NombreDocumento, true);
        $criteria->compare('GeneradoXls', $this->GeneradoXls);
        $criteria->compare('SecuencialERP', $this->SecuencialERP, true);
        $criteria->compare('CodigoTransaccionERP', $this->CodigoTransaccionERP, true);
        $criteria->compare('Estado', $this->Estado);
        $criteria->compare('FechaCarga', $this->FechaCarga, true);
        $criteria->compare('IdLote', $this->IdLote, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return NubeRetencion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    
    public function mostrarDocumentos($control) {
        $page= new VSValidador;
        $rawData = array();
        $limitrowsql=$page->paginado($control);
        $tipoUser=Yii::app()->getSession()->get('RolId', FALSE);
        $usuarioErp=$page->concatenarUserERP(Yii::app()->getSession()->get('UsuarioErp', FALSE));
        //echo $usuarioErp;
        //$fecInifact=Yii::app()->params['dateStartFact'];//Fecha Inicial de Facturacion Electronica
        $fecInifact= date(Yii::app()->params['datebydefault']);
        $con = Yii::app()->dbvsseaint;
        
        $sql = "SELECT A.IdRetencion IdDoc,A.Estado,A.CodigoTransaccionERP,A.SecuencialERP,A.UsuarioCreador,
                    A.FechaAutorizacion,A.AutorizacionSRI,
                    CONCAT(A.CodigoTransaccionERP,'-',A.Establecimiento,'-',A.PuntoEmision,'-',A.Secuencial) NumDocumento,
                    A.FechaEmision,A.IdentificacionSujetoRetenido,A.RazonSocialSujetoRetenido,
                    A.TotalRetencion,'COMPROBANTE DE RETENCION' NombreDocumento,A.AutorizacionSri,
                       A.ClaveAcceso,A.FechaAutorizacion,A.DocSustentoERP
                    FROM " . $con->dbname . ".NubeRetencion A
                WHERE A.CodigoDocumento='$this->tipoDoc' AND A.Estado NOT IN (5) ";
        
        //Usuarios Vendedor con * es privilegiado y puede ver lo que factura el resta
        $sql .= ($usuarioErp!='*') ? "AND A.UsuarioCreador IN ('$usuarioErp')" : "";//Para Usuario Vendedores.

        
        if (!empty($control)) {//Verifica la Opcion op para los filtros
            $sql .= ($control[0]['TIPO_APR'] != "0") ? " AND A.Estado = '" . $control[0]['TIPO_APR'] . "' " : " AND A.Estado NOT IN (5) ";
            $sql .= ($control[0]['CEDULA'] > 0) ? "AND A.IdentificacionSujetoRetenido = '" . $control[0]['CEDULA'] . "' " : "";
            //$sql .= ($control[0]['COD_PACIENTE'] != "0") ? "AND CDOR_ID_PACIENTE='".$control[0]['COD_PACIENTE']."' " : "";
            //$sql .= ($control[0]['PACIENTE'] != "") ? "AND CONCAT(B.PER_APELLIDO,' ',B.PER_NOMBRE) LIKE '%" . $control[0]['PACIENTE'] . "%' " : "";
            if($control[0]['F_INI']!='' AND $control[0]['F_FIN']!=''){//Si vienen valores en blanco en las fechas muestra todos
                $sql .= "AND DATE(A.FechaEmision) BETWEEN '" . date("Y-m-d", strtotime($control[0]['F_INI'])) . "' AND '" . date("Y-m-d", strtotime($control[0]['F_FIN'])) . "'  ";
            }
        }
        $sql .= "ORDER BY A.IdRetencion DESC $limitrowsql";
        //echo $sql;
        //VSValidador::putMessageLogFile($sql);
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'IdDoc',
            'sort' => array(
                'attributes' => array(
                    'IdDoc', 'Estado', 'CodigoTransaccionERP', 'SecuencialERP', 'UsuarioCreador',
                    'FechaAutorizacion', 'AutorizacionSRI', 'NumDocumento', 'FechaEmision', 'IdentificacionSujetoRetenido',
                    'RazonSocialSujetoRetenido', 'TotalRetencion', 'NombreDocumento',
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            //'itemCount'=>count($rawData),
            ),
        ));
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
                $condicion .=" AND RazonSocialSujetoRetenido LIKE '%$aux[$i]%' ";
            }
        }
        $sql = "SELECT A.IdentificacionSujetoRetenido,A.RazonSocialSujetoRetenido
                    FROM " . $con->dbname . ".NubeRetencion A
                  WHERE A.Estado<>0	GROUP BY IdentificacionSujetoRetenido ";

        switch ($op) {
            case 'CED':
                $sql .=" AND IdentificacionSujetoRetenido LIKE '%$valor%' ";
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
    
    public function mostrarCabRetencion($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT A.IdRetencion IdDoc,A.Estado,A.CodigoTransaccionERP,A.SecuencialERP,A.UsuarioCreador,
                    A.FechaAutorizacion,A.AutorizacionSRI,A.DireccionMatriz,A.DireccionEstablecimiento,
                    CONCAT(A.Establecimiento,'-',A.PuntoEmision,'-',A.Secuencial) NumDocumento,
                    A.ContribuyenteEspecial,A.ObligadoContabilidad,A.TipoIdentificacionSujetoRetenido,
                    A.CodigoDocumento,A.Establecimiento,A.PuntoEmision,A.Secuencial,A.PeriodoFiscal,
                    A.FechaEmision,A.IdentificacionSujetoRetenido,A.RazonSocialSujetoRetenido,
                    A.TotalRetencion,'COMPROBANTE DE RETENCION' NombreDocumento,A.ClaveAcceso,A.FechaAutorizacion,
                    A.Ambiente,A.TipoEmision,A.Ruc,A.CodigoError
                    FROM " . $con->dbname . ".NubeRetencion A
                WHERE A.CodigoDocumento='$this->tipoDoc' AND A.IdRetencion =$id ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryRow(); //Recupera Solo 1
        $con->active = false;
        return $rawData;
    }

    public function mostrarDetRetencion($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT * FROM " . $con->dbname . ".NubeDetalleRetencion WHERE IdRetencion=$id";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll(); //Recupera Solo 1
        $con->active = false;
        /*for ($i = 0; $i < sizeof($rawData); $i++) {
            $rawData[$i]['impuestos'] = $this->mostrarDetalleImp($rawData[$i]['IdDetalleFactura']); //Retorna el Detalle del Impuesto
        }*/
        return $rawData;
    }


    public function mostrarRetencionDataAdicional($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT * FROM " . $con->dbname . ".NubeDatoAdicionalRetencion WHERE IdRetencion=$id";
        $rawData = $con->createCommand($sql)->queryAll(); //Recupera Solo 1
        $con->active = false;
        return $rawData;
    }
    
    public function mostrarRutaXMLAutorizado($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT EstadoDocumento,DirectorioDocumento,NombreDocumento FROM " . $con->dbname . ".NubeRetencion WHERE "
                . "IdRetencion=$id AND EstadoDocumento='AUTORIZADO'";
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
                    //Rutas de Documentos
                    $DirDocAutorizado=Yii::app()->params['seaDocAutRete']; 
                    $DirDocFirmado=Yii::app()->params['seaDocRete'];
                    if ($result['status'] == 'OK') {//Retorna True o False 
                        //echo $result['nomDoc'];
                        //Para Validaciones Masivas Hay que verificar lo que retorna la funcion
                        return $autDoc->AutorizaDocumento($result,$ids,$i,$DirDocAutorizado,$DirDocFirmado,'NubeRetencion','RETENCION','IdRetencion');
                    }elseif ($result['status'] == 'OK_REG') {
                        //LA CLAVE DE ACCESO REGISTRADA ingresa directamente a Obtener su autorizacion
                        //Autorizacion de Comprobantes 
                        return $autDoc->autorizaComprobante($result, $ids, $i, $DirDocAutorizado, $DirDocFirmado, 'NubeRetencion','RETENCION','IdRetencion');
                   
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
        $cabFact = $this->mostrarCabRetencion($ids);
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
                            $fec_doc = date("Y-m-d", strtotime($cabFact['FechaEmision']));
                            $ClaveAcceso = $objCla->claveAcceso($codDoc, $fec_doc, $cabFact['Ruc'], $cabFact['Ambiente'], $serie, $cabFact['Secuencial'], $cabFact['TipoEmision']);
                            $autDoc->actualizaClaveAccesoDocumento($ids, $ClaveAcceso, 'NubeRetencion', 'IdRetencion');
                            $cabFact = $this->mostrarCabRetencion($ids);//Vuelve a Consultar con la Clave de Acceso Nueva.*/
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
        
        $detDoc = $this->mostrarDetRetencion($ids);
        //$impFact = $this->mostrarFacturaImp($ids);
        $adiFact = $this->mostrarRetencionDataAdicional($ids);

        $xmldata = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
            $xmldata .='<comprobanteRetencion id="comprobante" version="1.0.0">';//Version Normal Para 2 Decimales
            //$xmldata .='<comprobanteRetencion id="comprobante" version="1.1.0">';//Version para 4 Decimales en Precio Unitario
                $xmldata .= $xmlGen->infoTributaria($cabFact);  
                $xmldata .='<infoCompRetencion>';
                        $xmldata .='<fechaEmision>' . date(Yii::app()->params["dateXML"], strtotime($cabFact["FechaEmision"])) . '</fechaEmision>';
                        $xmldata .='<dirEstablecimiento>' . utf8_encode(trim($cabFact["DireccionEstablecimiento"])) . '</dirEstablecimiento>';
                        if(strlen(trim($cabFact['ContribuyenteEspecial']))>0){
                            $xmldata .='<contribuyenteEspecial>' . utf8_encode(trim($cabFact["ContribuyenteEspecial"])) . '</contribuyenteEspecial>';
                        }
                        if(strlen(trim($cabFact['ObligadoContabilidad']))>0){
                            $xmldata .='<obligadoContabilidad>' . utf8_encode(trim($cabFact["ObligadoContabilidad"])) . '</obligadoContabilidad>';
                        } 
                        $xmldata .='<tipoIdentificacionSujetoRetenido>' . utf8_encode(trim($cabFact["TipoIdentificacionSujetoRetenido"])) . '</tipoIdentificacionSujetoRetenido>';
                        $xmldata .='<razonSocialSujetoRetenido>' . $valida->limpioCaracteresXML(trim($cabFact["RazonSocialSujetoRetenido"])) . '</razonSocialSujetoRetenido>';
                        $xmldata .='<identificacionSujetoRetenido>' . utf8_encode(trim($cabFact["IdentificacionSujetoRetenido"])) . '</identificacionSujetoRetenido>';
                        $xmldata .='<periodoFiscal>' . utf8_encode(trim($cabFact["PeriodoFiscal"])) . '</periodoFiscal>';
                $xmldata .='</infoCompRetencion>';
                $xmldata .='<impuestos>';
                    for ($i = 0; $i < sizeof($detDoc); $i++) {
                        $xmldata .='<impuesto>';
                            $xmldata .='<codigo>' . $detDoc[$i]['Codigo'] . '</codigo>';
                            $xmldata .='<codigoRetencion>' . $detDoc[$i]['CodigoRetencion'] . '</codigoRetencion>';
                            $xmldata .='<baseImponible>' . Yii::app()->format->formatNumber($detDoc[$i]["BaseImponible"]) . '</baseImponible>';
                            $xmldata .='<porcentajeRetener>' . (int)$detDoc[$i]['PorcentajeRetener'] . '</porcentajeRetener>';
                            $xmldata .='<valorRetenido>' . Yii::app()->format->formatNumber($detDoc[$i]["ValorRetenido"]) . '</valorRetenido>';
                            $xmldata .='<codDocSustento>' . $detDoc[$i]['CodDocRetener'] . '</codDocSustento>';
                            if(strlen(trim($detDoc[$i]['NumDocRetener']))>0){
                                //OPCIONAL CUANDO EXISTA
                                $xmldata .='<numDocSustento>' . $detDoc[$i]['NumDocRetener'] . '</numDocSustento>';
                            }
                            if(strlen(trim($detDoc[$i]['FechaEmisionDocRetener']))>0){
                                //Obligatorio cuando corresponda 
                                $xmldata .='<fechaEmisionDocSustento>' . date(Yii::app()->params["dateXML"], strtotime($detDoc[$i]["FechaEmisionDocRetener"])) . '</fechaEmisionDocSustento>';
                            }
                        $xmldata .='</impuesto>';
                    }    
                $xmldata .='</impuestos>';                  
                $xmldata .= $xmlGen->infoAdicional($adiFact); 
        //$xmldata .=$firma;
        $xmldata .='</comprobanteRetencion>';
        //echo htmlentities($xmldata);
        $nomDocfile = $cabFact['NombreDocumento'] . '-' . $cabFact['NumDocumento'] . '.xml';
        file_put_contents(Yii::app()->params['seaDocXml'] . $nomDocfile, $xmldata); //Escribo el Archivo Xml
        return $msgAuto->messageFileXML('OK', $nomDocfile, $cabFact["ClaveAcceso"], 2, null, null);
    }

}
