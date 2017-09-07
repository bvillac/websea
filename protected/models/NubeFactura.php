<?php

/**
 * This is the model class for table "NubeFactura".
 *
 * The followings are the available columns in table 'NubeFactura':
 * @property string $IdFactura
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
 * @property string $FechaEmision
 * @property string $DireccionEstablecimiento
 * @property string $ContribuyenteEspecial
 * @property string $ObligadoContabilidad
 * @property string $TipoIdentificacionComprador
 * @property string $GuiaRemision
 * @property string $RazonSocialComprador
 * @property string $IdentificacionComprador
 * @property string $TotalSinImpuesto
 * @property string $TotalDescuento
 * @property string $Propina
 * @property string $ImporteTotal
 * @property string $Moneda
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
 * @property NubeDatoAdicionalFactura[] $nubeDatoAdicionalFacturas
 * @property NubeDetalleFactura[] $nubeDetalleFacturas
 * @property NubeFacturaImpuesto[] $nubeFacturaImpuestos
 */

/*
    Nota Importante: Se procedio a quitar el utf8_encode(data) EN Razon Social y Descricion o detalle Adicional
 *  ya que son propenso a caracteres especiales de los cuales la base ya los envia con la codificacion Real UTF-8 y ya 
 *  no es necesario convertiros. por lo tanto se somete a pruebas para ver resultados
 * */
class NubeFactura extends VsSeaIntermedia {
    
    private $tipoDoc='01';
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        $dbname = parent::$dbname;
        if ($dbname != "")
            $dbname.=".";
        return $dbname . 'NubeFactura'; //Empresas es la Utilizada.
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Ambiente, TipoEmision, GeneradoXls, Estado', 'numerical', 'integerOnly' => true),
            array('AutorizacionSRI, EmailResponsable, CodigoError, DirectorioDocumento', 'length', 'max' => 100),
            array('RazonSocial, NombreComercial, DireccionMatriz, DireccionEstablecimiento, RazonSocialComprador, UsuarioCreador, DescripcionError, NombreDocumento', 'length', 'max' => 300),
            array('Ruc, GuiaRemision', 'length', 'max' => 20),
            array('ClaveAcceso, ContribuyenteEspecial, CodigoTransaccionERP, IdLote', 'length', 'max' => 50),
            array('CodigoDocumento, ObligadoContabilidad, TipoIdentificacionComprador', 'length', 'max' => 2),
            array('Establecimiento, PuntoEmision', 'length', 'max' => 3),
            array('Secuencial, Moneda', 'length', 'max' => 15),
            array('IdentificacionComprador', 'length', 'max' => 13),
            array('TotalSinImpuesto, TotalDescuento, Propina, ImporteTotal', 'length', 'max' => 19),
            array('EstadoDocumento', 'length', 'max' => 25),
            array('SecuencialERP', 'length', 'max' => 30),
            array('FechaAutorizacion, FechaEmision, FechaCarga', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdFactura, AutorizacionSRI, FechaAutorizacion, Ambiente, TipoEmision, RazonSocial, NombreComercial, Ruc, ClaveAcceso, CodigoDocumento, Establecimiento, PuntoEmision, Secuencial, DireccionMatriz, FechaEmision, DireccionEstablecimiento, ContribuyenteEspecial, ObligadoContabilidad, TipoIdentificacionComprador, GuiaRemision, RazonSocialComprador, IdentificacionComprador, TotalSinImpuesto, TotalDescuento, Propina, ImporteTotal, Moneda, UsuarioCreador, EmailResponsable, EstadoDocumento, DescripcionError, CodigoError, DirectorioDocumento, NombreDocumento, GeneradoXls, SecuencialERP, CodigoTransaccionERP, Estado, FechaCarga, IdLote', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'nubeDatoAdicionalFacturas' => array(self::HAS_MANY, 'NubeDatoAdicionalFactura', 'IdFactura'),
            'nubeDetalleFacturas' => array(self::HAS_MANY, 'NubeDetalleFactura', 'IdFactura'),
            'nubeFacturaImpuestos' => array(self::HAS_MANY, 'NubeFacturaImpuesto', 'IdFactura'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'IdFactura' => 'Id Factura',
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
            'FechaEmision' => 'Fecha Emision',
            'DireccionEstablecimiento' => 'Direccion Establecimiento',
            'ContribuyenteEspecial' => 'Contribuyente Especial',
            'ObligadoContabilidad' => 'Obligado Contabilidad',
            'TipoIdentificacionComprador' => 'Tipo Identificacion Comprador',
            'GuiaRemision' => 'Guia Remision',
            'RazonSocialComprador' => 'Razon Social Comprador',
            'IdentificacionComprador' => 'Identificacion Comprador',
            'TotalSinImpuesto' => 'Total Sin Impuesto',
            'TotalDescuento' => 'Total Descuento',
            'Propina' => 'Propina',
            'ImporteTotal' => 'Importe Total',
            'Moneda' => 'Moneda',
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

        $criteria->compare('IdFactura', $this->IdFactura, true);
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
        $criteria->compare('FechaEmision', $this->FechaEmision, true);
        $criteria->compare('DireccionEstablecimiento', $this->DireccionEstablecimiento, true);
        $criteria->compare('ContribuyenteEspecial', $this->ContribuyenteEspecial, true);
        $criteria->compare('ObligadoContabilidad', $this->ObligadoContabilidad, true);
        $criteria->compare('TipoIdentificacionComprador', $this->TipoIdentificacionComprador, true);
        $criteria->compare('GuiaRemision', $this->GuiaRemision, true);
        $criteria->compare('RazonSocialComprador', $this->RazonSocialComprador, true);
        $criteria->compare('IdentificacionComprador', $this->IdentificacionComprador, true);
        $criteria->compare('TotalSinImpuesto', $this->TotalSinImpuesto, true);
        $criteria->compare('TotalDescuento', $this->TotalDescuento, true);
        $criteria->compare('Propina', $this->Propina, true);
        $criteria->compare('ImporteTotal', $this->ImporteTotal, true);
        $criteria->compare('Moneda', $this->Moneda, true);
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
     * @return NubeFactura the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function insertarFacturas($opcion) {
        $con = Yii::app()->dbvsseaint;
        $trans = $con->beginTransaction();
        $objEmpData = new EMPRESA;
        /*         * **VARIBLES DE SESION****** */
        $emp_id = Yii::app()->getSession()->get('emp_id', FALSE);
        $est_id = Yii::app()->getSession()->get('est_id', FALSE);
        $pemi_id = Yii::app()->getSession()->get('pemi_id', FALSE);
        try {
            $cabFact = $this->buscarFacturas($opcion);
            $empresaEnt = $objEmpData->buscarDataEmpresa($emp_id, $est_id, $pemi_id); //recuperar info deL Contribuyente
            $codDoc = '01'; //Documento Factura
            for ($i = 0; $i < sizeof($cabFact); $i++) {
                $this->InsertarCabFactura($con, $cabFact, $empresaEnt, $codDoc, $i);
                $idCab = $con->getLastInsertID($con->dbname . '.NubeFactura');
                $detFact = $this->buscarDetFacturas($cabFact[$i]['TIP_NOF'], $cabFact[$i]['NUM_NOF']);
                $this->InsertarDetFactura($con,$cabFact[$i]['POR_IVA'] ,$detFact, $idCab);
                $this->InsertarFacturaDatoAdicional($con, $i, $cabFact, $idCab);
            }
            $trans->commit();
            $con->active = false;
            $this->actualizaErpCabFactura($cabFact);
            echo "ERP Actualizado";
            return true;
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            throw $e;
            return false;
        }
    }

    private function buscarFacturas($opcion) {
        $conCont = yii::app()->dbcont;
        $rawData = array();
        $fechaIni = Yii::app()->params['dateStartFact'];
        $limitEnv = Yii::app()->params['limitEnv'];
        //$sql = "SELECT TIP_NOF,CONCAT(REPEAT('0',9-LENGTH(RIGHT(NUM_NOF,9))),RIGHT(NUM_NOF,9)) NUM_NOF,
        switch ($opcion['OP']) {
            case '1':
                $Documento=$opcion['NUM_DOC'];
                $TipoDoc=$opcion['NUM_DOC'];
                $sql = "SELECT TIP_NOF, NUM_NOF,
                        CED_RUC,NOM_CLI,FEC_VTA,DIR_CLI,VAL_BRU,POR_DES,VAL_DES,VAL_FLE,BAS_IVA,
                        BAS_IV0,POR_IVA,VAL_IVA,VAL_NET,POR_R_F,VAL_R_F,POR_R_I,VAL_R_I,GUI_REM,0 PROPINA,
                        USUARIO,LUG_DES,NOM_CTO
                    FROM " . $conCont->dbname . ".VC010101 
                WHERE NUM_NOF LIKE '%$Documento' AND TIP_NOF='$TipoDoc' ";
                break;
            case 'RETENCION':
                $sql = "SELECT TIP_NOF, NUM_NOF,
                        CED_RUC,NOM_CLI,FEC_VTA,DIR_CLI,VAL_BRU,POR_DES,VAL_DES,VAL_FLE,BAS_IVA,
                        BAS_IV0,POR_IVA,VAL_IVA,VAL_NET,POR_R_F,VAL_R_F,POR_R_I,VAL_R_I,GUI_REM,0 PROPINA,
                        USUARIO,LUG_DES,NOM_CTO
                    FROM " . $conCont->dbname . ".VC010101 
                WHERE IND_UPD='L' AND FEC_VTA>'$fechaIni' AND ENV_DOC='0' LIMIT $limitEnv";
                break;
            default:
            //$IdGuiaRemision=$ids;
        }
        //echo $sql;
        $rawData = $conCont->createCommand($sql)->queryAll();
        $conCont->active = false;
        return $rawData;
    }

    private function buscarDetFacturas($tipDoc, $numDoc) {
        $conCont = yii::app()->dbcont;
        $rawData = array();
        $sql = "SELECT TIP_NOF,NUM_NOF,FEC_VTA,COD_ART,NOM_ART,CAN_DES,P_VENTA,
                        T_VENTA,VAL_DES,I_M_IVA,VAL_IVA
                    FROM " . $conCont->dbname . ".VD010101
                WHERE TIP_NOF='$tipDoc' AND NUM_NOF='$numDoc' AND IND_EST='L'";
        //echo $sql;
        $rawData = $conCont->createCommand($sql)->queryAll();
        $conCont->active = false;
        return $rawData;
    }

    private function InsertarCabFactura($con, $objEnt, $objEmp, $codDoc, $i) {
        $valida = new VSValidador();
        $UsuId=Yii::app()->getSession()->get('user_id', FALSE);
        $tip_iden = $valida->tipoIdent($objEnt[$i]['CED_RUC']);
        $Secuencial = $valida->ajusteNumDoc($objEnt[$i]['NUM_NOF'], 9);
        //$GuiaRemi=$valida->ajusteNumDoc($objEnt[$i]['GUI_REM'],9);
        $GuiaRemi = (strlen($objEnt[$i]['GUI_REM']) > 0) ? $objEmp['Establecimiento'] . '-' . $objEmp['PuntoEmision'] . '-' . $valida->ajusteNumDoc($objEnt[$i]['GUI_REM'], 9) : '';
        $ced_ruc = ($tip_iden == '07') ? '9999999999999' : $objEnt[$i]['CED_RUC'];
        /* Datos para Genera Clave */
        //$tip_doc,$fec_doc,$ruc,$ambiente,$serie,$numDoc,$tipoemision
        $objCla = new VSClaveAcceso();
        $serie = $objEmp['Establecimiento'] . $objEmp['PuntoEmision'];
        $fec_doc = date("Y-m-d", strtotime($objEnt[0]['FEC_VTA']));
        $ClaveAcceso = $objCla->claveAcceso($codDoc, $fec_doc, $objEmp['Ruc'], $objEmp['Ambiente'], $serie, $Secuencial, $objEmp['TipoEmision']);
        /** ********************** */
        $nomCliente=str_replace("'","",$objEnt[$i]['NOM_CLI']);// Error del ' en el Text
        $TotalSinImpuesto=floatval($objEnt[$i]['BAS_IVA'])+floatval($objEnt[$i]['BAS_IV0']);//Cambio por Ajuste de Valores Byron
        $sql = "INSERT INTO " . $con->dbname . ".NubeFactura
                            (Ambiente,TipoEmision, RazonSocial, NombreComercial, Ruc,ClaveAcceso,CodigoDocumento, Establecimiento,
                            PuntoEmision, Secuencial, DireccionMatriz, FechaEmision, DireccionEstablecimiento, ContribuyenteEspecial,
                            ObligadoContabilidad, TipoIdentificacionComprador, GuiaRemision, RazonSocialComprador, IdentificacionComprador,
                            TotalSinImpuesto, TotalDescuento, Propina, ImporteTotal, Moneda, SecuencialERP, CodigoTransaccionERP,UsuarioCreador,USU_ID,Estado,FechaCarga) VALUES (
                            '" . $objEmp['Ambiente'] . "',
                            '" . $objEmp['TipoEmision'] . "',
                            '" . $objEmp['RazonSocial'] . "',
                            '" . $objEmp['NombreComercial'] . "',
                            '" . $objEmp['Ruc'] . "',
                            '$ClaveAcceso',
                            '$codDoc',
                            '" . $objEmp['Establecimiento'] . "',
                            '" . $objEmp['PuntoEmision'] . "',
                            '$Secuencial',
                            '" . $objEmp['DireccionMatriz'] . "', 
                            '$fec_doc', 
                            '" . $objEmp['DireccionMatriz'] . "', 
                            '" . $objEmp['ContribuyenteEspecial'] . "', 
                            '" . $objEmp['ObligadoContabilidad'] . "', 
                            '$tip_iden', 
                            '$GuiaRemi',               
                            '$nomCliente', 
                            '$ced_ruc', 
                            '" . $TotalSinImpuesto . "', 
                            '" . $objEnt[$i]['VAL_DES'] . "', 
                            '" . $objEnt[$i]['PROPINA'] . "', 
                            '" . $objEnt[$i]['VAL_NET'] . "', 
                            '" . $objEmp['Moneda'] . "', 
                            '$Secuencial', 
                            '" . $objEnt[0]['TIP_NOF'] . "',
                            '" . $objEnt[0]['USUARIO'] . "',
                            '$UsuId',
                            '1',CURRENT_TIMESTAMP() )";

        $command = $con->createCommand($sql);
        $command->execute();
    }

    private function InsertarDetFactura($con,$por_iva, $detFact, $idCab) {
        $valSinImp = 0;
        $val_iva12 = 0;
        $vet_iva12 = 0;
        $val_iva0 = 0;
        $vet_iva0 = 0;
        //TIP_NOF,NUM_NOF,FEC_VTA,COD_ART,NOM_ART,CAN_DES,P_VENTA,T_VENTA,VAL_DES,I_M_IVA,VAL_IVA
        for ($i = 0; $i < sizeof($detFact); $i++) {
            $valSinImp = floatval($detFact[$i]['T_VENTA']) - floatval($detFact[$i]['VAL_DES']);
            if ($detFact[$i]['I_M_IVA'] == '1') {
                //$val_iva12 = $val_iva12 + floatval($detFact[$i]['VAL_IVA']);
                //MOdificacion por que iva no cuadra con los totales
                $val_iva12 = $val_iva12 + (floatval($detFact[$i]['CAN_DES'])*floatval($detFact[$i]['P_VENTA'])* (floatval($por_iva)/100));
                $vet_iva12 = $vet_iva12 + $valSinImp;
            } else {
                $val_iva0 = 0;
                $vet_iva0 = $vet_iva0 + $valSinImp;
            }

            $sql = "INSERT INTO " . $con->dbname . ".NubeDetalleFactura 
                    (CodigoPrincipal,CodigoAuxiliar,Descripcion,Cantidad,PrecioUnitario,Descuento,PrecioTotalSinImpuesto,IdFactura) VALUES (
                    '" . $detFact[$i]['COD_ART'] . "', 
                    '1',
                    '" . $detFact[$i]['NOM_ART'] . "', 
                    '" . $detFact[$i]['CAN_DES'] . "',
                    '" . $detFact[$i]['P_VENTA'] . "',
                    '" . $detFact[$i]['VAL_DES'] . "',
                    '$valSinImp',
                    '$idCab')";
            $command = $con->createCommand($sql);
            $command->execute();
            $idDet = $con->getLastInsertID($con->dbname . '.NubeDetalleFactura');
            if ($detFact[$i]['I_M_IVA'] == '1') {//Verifico si el ITEM tiene Impuesto
                //Segun Datos Sri
                $this->InsertarDetImpFactura($con, $idDet, '2', '2', $por_iva, $valSinImp, $detFact[$i]['VAL_IVA']); //12%
            } else {//Caso Contrario no Genera Impuesto
                $this->InsertarDetImpFactura($con, $idDet, '2', '0', '0', $valSinImp, $detFact[$i]['VAL_IVA']); //0%
            }
        }
        //Insertar Datos de Iva 0%
        If ($vet_iva0 > 0) {
            $this->InsertarFacturaImpuesto($con, $idCab, '2', '0', '0', $vet_iva0, $val_iva0);
        }
        //Inserta Datos de Iva 12
        If ($vet_iva12 > 0) {
            $this->InsertarFacturaImpuesto($con, $idCab, '2', '2', $por_iva, $vet_iva12, $val_iva12);
        }
    }

    private function InsertarDetImpFactura($con, $idDet, $codigo, $CodigoPor, $Tarifa, $t_venta, $val_iva) {
        $sql = "INSERT INTO " . $con->dbname . ".NubeDetalleFacturaImpuesto 
                 (Codigo,CodigoPorcentaje,BaseImponible,Tarifa,Valor,IdDetalleFactura)VALUES(
                 '$codigo','$CodigoPor','$t_venta','$Tarifa','$val_iva','$idDet')";
        $command = $con->createCommand($sql);
        $command->execute();
    }

    private function InsertarFacturaImpuesto($con, $idCab, $codigo, $CodigoPor, $Tarifa, $t_venta, $val_iva) {
        $sql = "INSERT INTO " . $con->dbname . ".NubeFacturaImpuesto 
                 (Codigo,CodigoPorcentaje,BaseImponible,Tarifa,Valor,IdFactura)VALUES(
                 '$codigo','$CodigoPor','$t_venta','$Tarifa','$val_iva','$idCab')";

        $command = $con->createCommand($sql);
        $command->execute();
    }

    private function InsertarFacturaDatoAdicional($con, $i, $cabFact, $idCab) {
        $direccion = $cabFact[$i]['DIR_CLI'];
        $destino = $cabFact[$i]['LUG_DES'];
        $contacto = $cabFact[$i]['NOM_CTO'];
        $sql = "INSERT INTO " . $con->dbname . ".NubeDatoAdicionalFactura 
                 (Nombre,Descripcion,IdFactura)
                 VALUES
                 ('Direccion','$direccion','$idCab'),('Destino','$destino','$idCab'),('Contacto','$contacto','$idCab')";

        $command = $con->createCommand($sql);
        $command->execute();
    }

    private function actualizaErpCabFactura($cabFact) {
        $conContUp = yii::app()->dbcont;
        $transCont = $conContUp->beginTransaction();
        try {
            for ($i = 0; $i < sizeof($cabFact); $i++) {
                $numero = $cabFact[$i]['NUM_NOF'];
                $tipo = $cabFact[$i]['TIP_NOF'];
                $sql = "UPDATE " . $conContUp->dbname . ".VC010101 SET ENV_DOC=1
                        WHERE TIP_NOF='$tipo' AND NUM_NOF='$numero' AND IND_UPD='L'";
                //echo $sql;
                $command = $conContUp->createCommand($sql);
                $command->execute();
            }
            $transCont->commit();
            $conContUp->active = false;
            return true;
        } catch (Exception $e) {
            $transCont->rollback();
            $conContUp->active = false;
            throw $e;
            return false;
        }
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
        $sql = "SELECT A.IdFactura IdDoc,A.Estado,A.CodigoTransaccionERP,A.SecuencialERP,A.UsuarioCreador,
                        A.FechaAutorizacion,A.AutorizacionSRI,
                        CONCAT(A.Establecimiento,'-',A.PuntoEmision,'-',A.Secuencial) NumDocumento,
                        A.FechaEmision,A.IdentificacionComprador,A.RazonSocialComprador,
                        A.TotalSinImpuesto,A.TotalDescuento,A.Propina,A.ImporteTotal,
                        'FACTURA' NombreDocumento,A.AutorizacionSri,A.ClaveAcceso,A.FechaAutorizacion
                        FROM " . $con->dbname . ".NubeFactura A
                WHERE A.CodigoDocumento='$this->tipoDoc'  AND A.Estado NOT IN (5) ";
        
        //Usuarios Vendedor con * es privilegiado y puede ver lo que factura el resta
        $sql .= ($usuarioErp!='*') ? "AND A.UsuarioCreador IN ('$usuarioErp')" : "";//Para Usuario Vendedores.

        
        if (!empty($control)) {//Verifica la Opcion op para los filtros
            $sql .= ($control[0]['TIPO_APR'] != "0") ? " AND A.Estado = '" . $control[0]['TIPO_APR'] . "' " : " AND A.Estado NOT IN (5) ";
            $sql .= ($control[0]['CEDULA'] > 0) ? "AND A.IdentificacionComprador = '" . $control[0]['CEDULA'] . "' " : "";
            //$sql .= ($control[0]['COD_PACIENTE'] != "0") ? "AND CDOR_ID_PACIENTE='".$control[0]['COD_PACIENTE']."' " : "";
            //$sql .= ($control[0]['PACIENTE'] != "") ? "AND CONCAT(B.PER_APELLIDO,' ',B.PER_NOMBRE) LIKE '%" . $control[0]['PACIENTE'] . "%' " : "";
            if($control[0]['F_INI']!='' AND $control[0]['F_FIN']!=''){//Si vienen valores en blanco en las fechas muestra todos
                $sql .= "AND DATE(A.FechaEmision) BETWEEN '" . date("Y-m-d", strtotime($control[0]['F_INI'])) . "' AND '" . date("Y-m-d", strtotime($control[0]['F_FIN'])) . "'  ";
            }
        }
        $sql .= "ORDER BY A.IdFactura DESC  $limitrowsql";
        //echo $sql;
        

        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'IdDoc',
            'sort' => array(
                'attributes' => array(
                    'IdDoc', 'Estado', 'CodigoTransaccionERP', 'SecuencialERP', 'UsuarioCreador',
                    'FechaAutorizacion', 'AutorizacionSRI', 'NumDocumento', 'FechaEmision', 'IdentificacionComprador',
                    'RazonSocialComprador', 'ImporteTotal', 'NombreDocumento',
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
                //'itemCount'=>count($rawData),
            ),
        ));
    }

    public function recuperarTipoDocumentos() {
        $con = yii::app()->dbvssea;
        $sql = "SELECT idDirectorio,TipoDocumento,Descripcion,Ruta 
                FROM " . $con->dbname . ".VSDirectorio WHERE Estado=1;";
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }

    public function mostrarCabFactura($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT A.IdFactura IdDoc,A.Estado,A.CodigoTransaccionERP,A.SecuencialERP,A.UsuarioCreador,
                        A.FechaAutorizacion,A.AutorizacionSRI,A.DireccionMatriz,A.DireccionEstablecimiento,
                        CONCAT(A.Establecimiento,'-',A.PuntoEmision,'-',A.Secuencial) NumDocumento,
                        A.ContribuyenteEspecial,A.ObligadoContabilidad,A.TipoIdentificacionComprador,
                        A.CodigoDocumento,A.Establecimiento,A.PuntoEmision,A.Secuencial,
                        A.FechaEmision,A.IdentificacionComprador,A.RazonSocialComprador,
                        A.TotalSinImpuesto,A.TotalDescuento,A.Propina,A.ImporteTotal,
                        'FACTURA' NombreDocumento,A.AutorizacionSri,A.ClaveAcceso,A.FechaAutorizacion,
                        A.Ambiente,A.TipoEmision,A.GuiaRemision,A.Moneda,A.Ruc,A.CodigoError,A.USU_ID
                        FROM " . $con->dbname . ".NubeFactura A
                WHERE A.CodigoDocumento='$this->tipoDoc' AND A.IdFactura =$id ";
        //echo $sql;        
        $rawData = $con->createCommand($sql)->queryRow(); //Recupera Solo 1
        //VSValidador::putMessageLogFile($rawData);
        $con->active = false;
        return $rawData;
    }

    public function mostrarDetFacturaImp($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT * FROM " . $con->dbname . ".NubeDetalleFactura WHERE IdFactura=$id";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll(); //Recupera Solo 1
        $con->active = false;
        for ($i = 0; $i < sizeof($rawData); $i++) {
            $rawData[$i]['impuestos'] = $this->mostrarDetalleImp($rawData[$i]['IdDetalleFactura']); //Retorna el Detalle del Impuesto
        }
        return $rawData;
    }

    private function mostrarDetalleImp($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT * FROM " . $con->dbname . ".NubeDetalleFacturaImpuesto WHERE IdDetalleFactura=$id";
        $rawData = $con->createCommand($sql)->queryAll(); //Recupera Solo 1
        $con->active = false;
        return $rawData;
    }

    public function mostrarFacturaImp($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT * FROM " . $con->dbname . ".NubeFacturaImpuesto WHERE IdFactura=$id";
        $rawData = $con->createCommand($sql)->queryAll(); //Recupera Solo 1
        $con->active = false;
        return $rawData;
    }
    
    public function mostrarFormaPago($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        //$sql = "SELECT * FROM " . $con->dbname . ".NubeFacturaFormaPago WHERE IdFactura=$id";
        $sql = "SELECT B.FormaPago,A.Total,A.Plazo,A.UnidadTiempo,A.FormaPago Codigo  
                FROM " . $con->dbname . ".NubeFacturaFormaPago A
                        INNER JOIN " . $con->dbname . ".VSFormaPago B
                                ON A.IdForma=B.IdForma
                    WHERE A.IdFactura=$id ";
        $rawData = $con->createCommand($sql)->queryAll(); //Recupera Solo 1
        $con->active = false;
        return $rawData;
    }

    public function mostrarFacturaDataAdicional($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT * FROM " . $con->dbname . ".NubeDatoAdicionalFactura WHERE IdFactura=$id";
        $rawData = $con->createCommand($sql)->queryAll(); //Recupera Solo 1
        $con->active = false;
        return $rawData;
    }

    /**
     * Función 
     *
     * @author Byron Villacreses
     * @access public
     * @return Retorna Los Datos de las Facturas GENERADAS
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
                $condicion .=" AND RazonSocialComprador LIKE '%$aux[$i]%' ";
            }
        }
        $sql = "SELECT A.IdentificacionComprador,A.RazonSocialComprador
                    FROM " . $con->dbname . ".NubeFactura A
                  WHERE A.Estado<>0	GROUP BY IdentificacionComprador ";

        switch ($op) {
            case 'CED':
                $sql .=" AND IdentificacionComprador LIKE '%$valor%' ";
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

    public function enviarDocumentos($id) {
        try {
            $autDoc=new VSAutoDocumento();
            $errAuto= new VSexception();
            $ids = explode(",", $id);
            for ($i = 0; $i < count($ids); $i++) {
                if ($ids[$i] !== "") {
                    $result = $this->generarFileXML($ids[$i]);
                    //VSValidador::putMessageLogFile($result);
                    $DirDocAutorizado=Yii::app()->params['seaDocAutFact']; 
                    $DirDocFirmado=Yii::app()->params['seaDocFact'];
                    if ($result['status'] == 'OK') {//Retorna True o False 
                        //echo $result['nomDoc'];
                        return $autDoc->AutorizaDocumento($result,$ids,$i,$DirDocAutorizado,$DirDocFirmado,'NubeFactura','FACTURA','IdFactura');
                    }elseif ($result['status'] == 'OK_REG') {
                        //LA CLAVE DE ACCESO REGISTRADA ingresa directamente a Obtener su autorizacion
                        //Autorizacion de Comprobantes 
                        return $autDoc->autorizaComprobante($result, $ids, $i, $DirDocAutorizado, $DirDocFirmado, 'NubeFactura','FACTURA','IdFactura');
                   
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
        $cabFact = $this->mostrarCabFactura($ids);
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
                            //$this->actualizaClaveAccesoFactura($ids,$ClaveAcceso);
                            $autDoc->actualizaClaveAccesoDocumento($ids, $ClaveAcceso, 'NubeFactura', 'IdFactura');
                            $cabFact = $this->mostrarCabFactura($ids); //Vuelve a Consultar con la Clave de Acceso Nueva.*/
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
        
        $detFact = $this->mostrarDetFacturaImp($ids);
        $impFact = $this->mostrarFacturaImp($ids);
        $adiFact = $this->mostrarFacturaDataAdicional($ids);
        $pagFact = $this->mostrarFormaPago($ids);//Agregar forma de pago

        
        $xmldata = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
            //$xmldata .='<factura id="comprobante" version="1.0.0">';//Version Normal Para 2 Decimales
            $xmldata .='<factura id="comprobante" version="1.1.0">';//Version para 4 Decimales en Precio Unitario
            
                $xmldata .= $xmlGen->infoTributaria($cabFact);
                $xmldata .='<infoFactura>';
                    $xmldata .='<fechaEmision>' . date(Yii::app()->params["dateXML"], strtotime($cabFact["FechaEmision"])) . '</fechaEmision>';
                    $xmldata .='<dirEstablecimiento>' . utf8_encode(trim($cabFact["DireccionEstablecimiento"])) . '</dirEstablecimiento>';
                    if(strlen(trim($cabFact['ContribuyenteEspecial']))>0){
                        $xmldata .='<contribuyenteEspecial>' . utf8_encode(trim($cabFact["ContribuyenteEspecial"])) . '</contribuyenteEspecial>';
                    }
                    $xmldata .='<obligadoContabilidad>' . utf8_encode(trim($cabFact["ObligadoContabilidad"])) . '</obligadoContabilidad>';
                    $xmldata .='<tipoIdentificacionComprador>' . utf8_encode(trim($cabFact["TipoIdentificacionComprador"])) . '</tipoIdentificacionComprador>';
                    //$xmldata .='<razonSocialComprador>' . utf8_encode($valida->limpioCaracteresXML(trim($cabFact["RazonSocialComprador"]))) . '</razonSocialComprador>';
                    $xmldata .='<razonSocialComprador>' . $valida->limpioCaracteresXML(trim($cabFact["RazonSocialComprador"])) . '</razonSocialComprador>'; 
                    //SValidador::putMessageLogFile($valida->limpioCaracteresXML(trim($cabFact["RazonSocialComprador"])));
                    //VSValidador::putMessageLogFile(trim($cabFact["RazonSocialComprador"]));
                    $xmldata .='<identificacionComprador>' . utf8_encode(trim($cabFact["IdentificacionComprador"])) . '</identificacionComprador>';
                    $xmldata .='<totalSinImpuestos>' . Yii::app()->format->formatNumber($cabFact["TotalSinImpuesto"]) . '</totalSinImpuestos>';
                    $xmldata .='<totalDescuento>' . Yii::app()->format->formatNumber($cabFact["TotalDescuento"]) . '</totalDescuento>';
                        $xmldata .='<totalConImpuestos>';
                        $IRBPNR = 0; //NOta validar si existe casos para estos
                        $ICE = 0;
                        for ($i = 0; $i < sizeof($impFact); $i++) {
                            if ($impFact[$i]['Codigo'] == '2') {//Valores de IVA
                                switch ($impFact[$i]['CodigoPorcentaje']) {
                                    case 0:
                                        $BASEIVA0=$impFact[$i]['BaseImponible'];
                                        $xmldata .='<totalImpuesto>';
                                                $xmldata .='<codigo>' . $impFact[$i]["Codigo"] . '</codigo>';
                                                $xmldata .='<codigoPorcentaje>' . $impFact[$i]["CodigoPorcentaje"] . '</codigoPorcentaje>';
                                                $xmldata .='<baseImponible>' . Yii::app()->format->formatNumber($impFact[$i]["BaseImponible"]) . '</baseImponible>';
                                                //$xmldata .='<tarifa>' . Yii::app()->format->formatNumber($impFact[$i]["Tarifa"]) . '</tarifa>';
                                                $xmldata .='<valor>' . Yii::app()->format->formatNumber($impFact[$i]["Valor"]) . '</valor>';
                                        $xmldata .='</totalImpuesto>';
                                        break;
                                    case 2://IVA 12%
                                        $BASEIVA12 = $impFact[$i]['BaseImponible'];
                                        $VALORIVA12 = $impFact[$i]['Valor'];
                                        $xmldata .='<totalImpuesto>';
                                                $xmldata .='<codigo>' . $impFact[$i]["Codigo"] . '</codigo>';
                                                $xmldata .='<codigoPorcentaje>' . $impFact[$i]["CodigoPorcentaje"] . '</codigoPorcentaje>';
                                                $xmldata .='<baseImponible>' . Yii::app()->format->formatNumber($impFact[$i]["BaseImponible"]) . '</baseImponible>';
                                                //$xmldata .='<tarifa>' . Yii::app()->format->formatNumber($impFact[$i]["Tarifa"]) . '</tarifa>';
                                                $xmldata .='<valor>' . Yii::app()->format->formatNumber($impFact[$i]["Valor"]) . '</valor>';
                                        $xmldata .='</totalImpuesto>';
                                        break;
                                    case 3://IVA 14%
                                        $BASEIVA12 = $impFact[$i]['BaseImponible'];
                                        $VALORIVA12 = $impFact[$i]['Valor'];
                                        $xmldata .='<totalImpuesto>';
                                                $xmldata .='<codigo>' . $impFact[$i]["Codigo"] . '</codigo>';
                                                $xmldata .='<codigoPorcentaje>' . $impFact[$i]["CodigoPorcentaje"] . '</codigoPorcentaje>';
                                                $xmldata .='<baseImponible>' . Yii::app()->format->formatNumber($impFact[$i]["BaseImponible"]) . '</baseImponible>';
                                                //$xmldata .='<tarifa>' . Yii::app()->format->formatNumber($impFact[$i]["Tarifa"]) . '</tarifa>';
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
                $xmldata .='<propina>' . Yii::app()->format->formatNumber($cabFact["Propina"]) . '</propina>';
                $xmldata .='<importeTotal>' . Yii::app()->format->formatNumber($cabFact["ImporteTotal"]) . '</importeTotal>';
                $xmldata .='<moneda>' . utf8_encode(trim($cabFact["Moneda"])) . '</moneda>';
                
                //DATOS DE FORMA DE PAGO APLICADO 8 SEP 2016                
                $xmldata .='<pagos>';
                for ($xi = 0; $xi < sizeof($pagFact); $xi++) {
                    $xmldata .='<pago>';
                        $xmldata .='<formaPago>' . $valida->ajusteNumDoc(trim($pagFact[$xi]['Codigo']),2) . '</formaPago>';//Completa los 01 de al formato XSD <xsd:pattern value="[0][1-9]"/>
                        $xmldata .='<total>' . Yii::app()->format->formatNumber($pagFact[$xi]['Total']) . '</total>';
                        $xmldata .='<plazo>' . Yii::app()->format->formatNumber($pagFact[$xi]['Plazo']) . '</plazo>';
                        $xmldata .='<unidadTiempo>' . utf8_encode(trim($pagFact[$xi]['UnidadTiempo'])) . '</unidadTiempo>';
                    $xmldata .='</pago>';                    
                }
                $xmldata .='</pagos>';
                //Fin Forma de Pago
                
            $xmldata .='</infoFactura>';
        $xmldata .='<detalles>';
        for ($i = 0; $i < sizeof($detFact); $i++) {//DETALLE DE FACTURAS
            $xmldata .='<detalle>';
            $xmldata .='<codigoPrincipal>' . utf8_encode(trim($detFact[$i]['CodigoPrincipal'])) . '</codigoPrincipal>';
            $xmldata .='<codigoAuxiliar>' . utf8_encode(trim($detFact[$i]['CodigoAuxiliar'])) . '</codigoAuxiliar>';
            $xmldata .='<descripcion>' . $valida->limpioCaracteresXML(trim($detFact[$i]['Descripcion'])) . '</descripcion>';
            //VSValidador::putMessageLogFile($valida->limpioCaracteresXML(trim($detFact[$i]['Descripcion'])));
            $xmldata .='<cantidad>' . Yii::app()->format->formatNumber($detFact[$i]['Cantidad']) . '</cantidad>';
            //$xmldata .='<precioUnitario>' . Yii::app()->format->formatNumber($detFact[$i]['PrecioUnitario']) . '</precioUnitario>'; //Problemas de Redondeo Usar Roud(valor,deci)
            $xmldata .='<precioUnitario>' . (string)$detFact[$i]['PrecioUnitario'] . '</precioUnitario>';
            $xmldata .='<descuento>' . Yii::app()->format->formatNumber($detFact[$i]['Descuento']) . '</descuento>';
            $xmldata .='<precioTotalSinImpuesto>' . Yii::app()->format->formatNumber($detFact[$i]['PrecioTotalSinImpuesto']) . '</precioTotalSinImpuesto>';
            $xmldata .='<impuestos>';
            $impuesto = $detFact[$i]['impuestos'];
            for ($j = 0; $j < sizeof($impuesto); $j++) {//DETALLE IMPUESTO DE FACTURA
                $xmldata .='<impuesto>';
                        $xmldata .='<codigo>' . $impuesto[$j]['Codigo'] . '</codigo>';
                        $xmldata .='<codigoPorcentaje>' . $impuesto[$j]['CodigoPorcentaje'] . '</codigoPorcentaje>';
                        $xmldata .='<tarifa>' . Yii::app()->format->formatNumber($impuesto[$j]['Tarifa']) . '</tarifa>';
                        $xmldata .='<baseImponible>' . Yii::app()->format->formatNumber($impuesto[$j]['BaseImponible']) . '</baseImponible>';
                        $xmldata .='<valor>' . Yii::app()->format->formatNumber($impuesto[$j]['Valor']) . '</valor>';
                    $xmldata .='</impuesto>';
            }
            $xmldata .='</impuestos>';
        $xmldata .='</detalle>';
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
            if(strlen(trim($adiFact[$i]['Descripcion']))>0){
                //$xmldata .='<campoAdicional nombre="' . utf8_encode(trim($adiFact[$i]['Nombre'])) . '">' . utf8_encode($valida->limpioCaracteresXML(trim($adiFact[$i]['Descripcion']))) . '</campoAdicional>';
                $xmldata .='<campoAdicional nombre="' . $valida->limpioCaracteresXML(trim($adiFact[$i]['Nombre'])) . '">' . $valida->limpioCaracteresXML(trim($adiFact[$i]['Descripcion'])) . '</campoAdicional>';
            }
        }
        $xmldata .='</infoAdicional>';
        //$xmldata .=$firma;
        $xmldata .='</factura>';
        //echo htmlentities($xmldata);
        $nomDocfile = $cabFact['NombreDocumento'] . '-' . $cabFact['NumDocumento'] . '.xml';
        file_put_contents(Yii::app()->params['seaDocXml'] . $nomDocfile, $xmldata); //Escribo el Archivo Xml
        return $msgAuto->messageFileXML('OK', $nomDocfile, $cabFact["ClaveAcceso"], 2, null, null);
    }
    
    public function mostrarRutaXMLAutorizado($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT EstadoDocumento,DirectorioDocumento,NombreDocumento FROM " . $con->dbname . ".NubeFactura WHERE "
                . "IdFactura=$id AND EstadoDocumento='AUTORIZADO'";
        $rawData = $con->createCommand($sql)->queryRow(); //Recupera Solo 1
        $con->active = false;
        return $rawData;
    }
    
    
    public function actualizaClaveAccesoFactura($ids,$clave) {
        $con = Yii::app()->dbvsseaint;
        $trans = $con->beginTransaction();
        try {
            $sql = "UPDATE " . $con->dbname . ".NubeFactura SET ClaveAcceso='$clave' WHERE IdFactura='$ids'";
            //echo $sql;
            $command = $con->createCommand($sql);
            $command->execute();
            $trans->commit();
            $con->active = false;
            return true;
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            throw $e;
            return false;
        }
    }
    
    
    public function reporteDocumentos($f_ini,$f_fin,$t_apr) {
        $page= new VSValidador;
        $rawData = array();       

        //$tipoUser=Yii::app()->getSession()->get('RolId', FALSE);
        //$usuarioErp=$page->concatenarUserERP(Yii::app()->getSession()->get('UsuarioErp', FALSE));
     
        //$fecInifact= date(Yii::app()->params['datebydefault']);
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT A.IdFactura IdDoc,A.Estado,A.CodigoTransaccionERP,A.SecuencialERP,A.UsuarioCreador,
                        A.FechaAutorizacion,A.AutorizacionSRI,
                        CONCAT(A.Establecimiento,'-',A.PuntoEmision,'-',A.Secuencial) NumDocumento,
                        A.FechaEmision,A.IdentificacionComprador,A.RazonSocialComprador,
                        A.TotalSinImpuesto,A.TotalDescuento,A.Propina,A.ImporteTotal,
                        'FACTURA' NombreDocumento,A.AutorizacionSri,A.ClaveAcceso,A.FechaAutorizacion
                        FROM " . $con->dbname . ".NubeFactura A
                WHERE  A.Estado NOT IN (5) ";
        
        //Usuarios Vendedor con * es privilegiado y puede ver lo que factura el resta
        //$sql .= ($usuarioErp!='*') ? "AND A.UsuarioCreador IN ('$usuarioErp')" : "";//Para Usuario Vendedores.

        
        if (!empty($control)) {//Verifica la Opcion op para los filtros
            $sql .= ($t_apr != "0") ? " AND A.Estado = '" . $t_apr . "' " : " ";
            if($f_ini!='' AND $f_fin!=''){//Si vienen valores en blanco en las fechas muestra todos
                $sql .= "AND DATE(A.FechaEmision) BETWEEN '" . date("Y-m-d", strtotime($f_ini)) . "' AND '" . date("Y-m-d", strtotime($f_fin)) . "'  ";
            }
        }
        $sql .= "ORDER BY A.IdFactura DESC";
        //echo $sql;
        
        //VSValidador::putMessageLogFile($sql);

        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;       

        
    }

    
    
    
    
    

}
