<?php

/**
 * This is the model class for table "EMPRESA".
 *
 * The followings are the available columns in table 'EMPRESA':
 * @property string $EMP_ID
 * @property string $EMP_RUC
 * @property string $EMP_RAZONSOCIAL
 * @property string $EMP_NOM_COMERCIAL
 * @property string $EMP_TIPO
 * @property string $EMP_TELEFONO
 * @property string $EMP_FAX
 * @property string $EMP_DIRECCION
 * @property string $EMP_CORREO
 * @property string $EMP_LOGO
 * @property string $EMP_EST_LOG
 * @property string $EMP_FEC_MOD
 * @property string $EMP_FEC_CRE
 *
 * The followings are the available model relations:
 * @property USUARIOEMPRESA[] $uSUARIOEMPRESAs
 */
class EMPRESA extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        //return 'EMPRESA';
        $dbname = parent::$dbname;
        if ($dbname != "")
            $dbname.=".";
        return $dbname . 'EMPRESA'; //Empresas es la Utilizada.
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('EMP_RUC', 'length', 'max' => 15),
            array('EMP_RAZONSOCIAL, EMP_DIRECCION', 'length', 'max' => 300),
            array('EMP_NOM_COMERCIAL', 'length', 'max' => 150),
            array('EMP_TIPO, EMP_CORREO', 'length', 'max' => 45),
            array('EMP_TELEFONO, EMP_FAX', 'length', 'max' => 20),
            array('EMP_LOGO', 'length', 'max' => 100),
            array('EMP_EST_LOG', 'length', 'max' => 1),
            array('EMP_FEC_MOD, EMP_FEC_CRE', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('EMP_ID, EMP_RUC, EMP_RAZONSOCIAL, EMP_NOM_COMERCIAL, EMP_TIPO, EMP_TELEFONO, EMP_FAX, EMP_DIRECCION, EMP_CORREO, EMP_LOGO, EMP_EST_LOG, EMP_FEC_MOD, EMP_FEC_CRE', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'uSUARIOEMPRESAs' => array(self::HAS_MANY, 'USUARIOEMPRESA', 'EMP_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'EMP_ID' => 'Emp',
            'EMP_RUC' => 'Emp Ruc',
            'EMP_RAZONSOCIAL' => 'Emp Razonsocial',
            'EMP_NOM_COMERCIAL' => 'Emp Nom Comercial',
            'EMP_TIPO' => 'Emp Tipo',
            'EMP_TELEFONO' => 'Emp Telefono',
            'EMP_FAX' => 'Emp Fax',
            'EMP_DIRECCION' => 'Emp Direccion',
            'EMP_CORREO' => 'Emp Correo',
            'EMP_LOGO' => 'Emp Logo',
            'EMP_EST_LOG' => 'Emp Est Log',
            'EMP_FEC_MOD' => 'Emp Fec Mod',
            'EMP_FEC_CRE' => 'Emp Fec Cre',
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

        $criteria->compare('EMP_ID', $this->EMP_ID, true);
        $criteria->compare('EMP_RUC', $this->EMP_RUC, true);
        $criteria->compare('EMP_RAZONSOCIAL', $this->EMP_RAZONSOCIAL, true);
        $criteria->compare('EMP_NOM_COMERCIAL', $this->EMP_NOM_COMERCIAL, true);
        $criteria->compare('EMP_TIPO', $this->EMP_TIPO, true);
        $criteria->compare('EMP_TELEFONO', $this->EMP_TELEFONO, true);
        $criteria->compare('EMP_FAX', $this->EMP_FAX, true);
        $criteria->compare('EMP_DIRECCION', $this->EMP_DIRECCION, true);
        $criteria->compare('EMP_CORREO', $this->EMP_CORREO, true);
        $criteria->compare('EMP_LOGO', $this->EMP_LOGO, true);
        $criteria->compare('EMP_EST_LOG', $this->EMP_EST_LOG, true);
        $criteria->compare('EMP_FEC_MOD', $this->EMP_FEC_MOD, true);
        $criteria->compare('EMP_FEC_CRE', $this->EMP_FEC_CRE, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return EMPRESA the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function mostrarEmpresas($usu_id) {
        $conApp = yii::app()->db;
        $rawData = array();
        $sql = "SELECT C.EMP_ID,C.EMP_RAZONSOCIAL,C.EMP_DIRECCION_MATRIZ
                        FROM " . $conApp->dbname . ".USUARIO A 
                                INNER JOIN (" . $conApp->dbname . ".USUARIO_EMPRESA B
                                        INNER JOIN " . $conApp->dbname . ".EMPRESA C
                                                ON B.EMP_ID=C.EMP_ID)
                                        ON A.USU_ID=B.USU_ID AND B.EST_LOG='1'
                WHERE A.USU_ID='$usu_id' AND USU_EST_LOG='1'";

        //echo $sql;
        $rawData = $conApp->createCommand($sql)->queryRow();
        $conApp->active = false;
        return $rawData;
    }
    
    public function buscarDataEmpresa($emp_id,$est_id,$pemi_id) {
        $conApp = yii::app()->db;
        $rawData = array();
        $sql = "SELECT A.EMP_ID,A.EMP_RUC Ruc,A.EMP_RAZONSOCIAL RazonSocial,A.EMP_NOM_COMERCIAL NombreComercial,
                    A.EMP_AMBIENTE Ambiente,A.EMP_TIPO_EMISION TipoEmision,EMP_DIRECCION_MATRIZ DireccionMatriz,EST_DIRECCION DireccionSucursal,
                    A.EMP_OBLIGA_CONTABILIDAD ObligadoContabilidad,EMP_CONTRI_ESPECIAL ContribuyenteEspecial,EMP_EMAIL_DIGITAL,
                    B.EST_NUMERO Establecimiento,C.PEMI_NUMERO PuntoEmision,A.EMP_MONEDA Moneda,A.EMP_EMAIL_CONTA CorreoConta
                    FROM " . $conApp->dbname . ".EMPRESA A
                            INNER JOIN (" . $conApp->dbname . ".ESTABLECIMIENTO B
                                            INNER JOIN " . $conApp->dbname . ".PUNTO_EMISION C
                                                    ON B.EST_ID=C.EST_ID AND C.EST_LOG='1')
                                    ON A.EMP_ID=B.EMP_ID AND B.EST_LOG='1'
            WHERE A.EMP_ID='$emp_id' AND A.EMP_EST_LOG='1' 
                     AND B.EST_ID='$est_id' AND C.PEMI_ID='$pemi_id'";
        //echo $sql;
        //$rawData = $conApp->createCommand($sql)->queryAll(); //Varios registros =>  $rawData[0]['RazonSocial']
        $rawData = $conApp->createCommand($sql)->queryRow();  //Un solo Registro => $rawData['RazonSocial']
        $conApp->active = false;
        return $rawData;
    }
    
    public function buscarAmbienteEmp($IdCompania,$Ambiente) {
        //$conApp = yii::app()->dbvssea;
        $conApp = yii::app()->db;
        $rawData = array();
        $sql = "SELECT Recepcion,Autorizacion,RecepcionLote,TiempoRespuesta,TiempoSincronizacion "
                . "FROM " . $conApp->dbname . ".VSServiciosSRI WHERE EMP_ID=$IdCompania AND Ambiente=$Ambiente AND Estado=1";
        //echo $sql;
        //$rawData = $conApp->createCommand($sql)->queryAll(); //Varios registros =>  $rawData[0]['RazonSocial']
        $rawData = $conApp->createCommand($sql)->queryRow();  //Un solo Registro => $rawData['RazonSocial']
        $conApp->active = false;
        return $rawData;
    }
    
    public function buscarTipoUser($IdUser) {
        $conApp = yii::app()->db;
        $rawData = array();
        $sql = "SELECT A.UEMP_ID,A.USU_EMP_ERP UsuarioErp,A.USU_ID,B.USU_NOMBRE,C.ROL_ID,C.ROL_NOMBRE "
                        . "FROM " . $conApp->dbname . ".USUARIO_EMPRESA A "
                                . "INNER JOIN " . $conApp->dbname . ".USUARIO B "
                                        . "ON A.USU_ID=B.USU_ID "
                                . "INNER JOIN  " . $conApp->dbname . ".ROL C "
                                        . "ON A.ROL_ID=C.ROL_ID "
                . "WHERE A.USU_ID=$IdUser AND B.USU_EST_LOG=1 ";
        //echo $sql;
        //$rawData = $conApp->createCommand($sql)->queryAll(); //Varios registros =>  $rawData[0]['RazonSocial']
        $rawData = $conApp->createCommand($sql)->queryRow();  //Un solo Registro => $rawData['RazonSocial']
        $conApp->active = false;
        return $rawData;
    }

}
