<?php

/**
 * This is the model class for table "USUARIO".
 *
 * The followings are the available columns in table 'USUARIO':
 * @property string $USU_ID
 * @property string $PER_ID
 * @property string $USU_NOMBRE
 * @property string $USU_PASSWORD
 * @property string $USU_EST_LOG
 * @property string $USU_FEC_CRE
 * @property string $USU_FEC_MOD
 *
 * The followings are the available model relations:
 * @property PERSONA $pER
 */
class USUARIO extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'USUARIO';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('PER_ID', 'required'),
            array('PER_ID', 'length', 'max' => 20),
            array('USU_NOMBRE', 'length', 'max' => 100),
            array('USU_PASSWORD', 'length', 'max' => 50),
            array('USU_EST_LOG', 'length', 'max' => 1),
            array('USU_FEC_CRE, USU_FEC_MOD', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('USU_ID, PER_ID, USU_NOMBRE, USU_PASSWORD, USU_EST_LOG, USU_FEC_CRE, USU_FEC_MOD', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pER' => array(self::BELONGS_TO, 'PERSONA', 'PER_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'USU_ID' => 'Usu',
            'PER_ID' => 'Per',
            'USU_NOMBRE' => 'Usu Nombre',
            'USU_PASSWORD' => 'Usu Password',
            'USU_EST_LOG' => 'Usu Est Log',
            'USU_FEC_CRE' => 'Usu Fec Cre',
            'USU_FEC_MOD' => 'Usu Fec Mod',
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

        $criteria->compare('USU_ID', $this->USU_ID, true);
        $criteria->compare('PER_ID', $this->PER_ID, true);
        $criteria->compare('USU_NOMBRE', $this->USU_NOMBRE, true);
        $criteria->compare('USU_PASSWORD', $this->USU_PASSWORD, true);
        $criteria->compare('USU_EST_LOG', $this->USU_EST_LOG, true);
        $criteria->compare('USU_FEC_CRE', $this->USU_FEC_CRE, true);
        $criteria->compare('USU_FEC_MOD', $this->USU_FEC_MOD, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return USUARIO the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function cambiarPassword($pass) {
        $ids = Yii::app()->getSession()->get('user_id', FALSE);
        $msg = new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $sql = "UPDATE " . $con->dbname . ".USUARIO SET USU_PASSWORD=MD5('$pass') WHERE USU_ID=$ids ";
            $comando = $con->createCommand($sql);
            $comando->execute();
            //echo $sql;
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK', null, 20, null, null);
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            $trans->rollBack();
            //throw $e;
            $con->active = false;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    public function cambiarMailDoc($ids,$correo) {
        $msg = new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        if($ids==0){return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);}
        try {
            $sql = "UPDATE " . $con->dbname . ".USUARIO SET USU_CORREO='$correo' WHERE USU_ID=$ids ";
            $comando = $con->createCommand($sql);
            $comando->execute();
            //echo $sql;
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK', null, 20, null, null);
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            $trans->rollBack();
            //throw $e;
            $con->active = false;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    public function getMailUserDoc($id,$tipDoc) {
        $con = yii::app()->db;
                switch ($tipDoc) {
                    Case "FA"://FACTURAS
                        $sql = "SELECT A.IdentificacionComprador CedRuc,C.USU_ID UsuId,B.PER_NOMBRE Nombres,C.USU_CORREO Correo
                                FROM VSSEAINTERMEDIA.NubeFactura A
                                        INNER JOIN (" . $con->dbname . ".PERSONA B
                                                        INNER JOIN " . $con->dbname . ".USUARIO C
                                                                ON C.PER_ID=B.PER_ID)
                                                ON B.PER_CED_RUC=A.IdentificacionComprador
                            WHERE A.IdFactura='$id';";                       
                        break;
                    Case "GR"://GUIAS DE REMISION
                        $sql = "SELECT D.IdentificacionDestinatario CedRuc,C.USU_ID UsuId,B.PER_NOMBRE Nombres,C.USU_CORREO Correo
                                FROM VSSEAINTERMEDIA.NubeGuiaRemision A
                                        INNER JOIN VSSEAINTERMEDIA.NubeGuiaRemisionDestinatario D
                                                ON D.IdGuiaRemision=A.IdGuiaRemision
                                        INNER JOIN (" . $con->dbname . ".PERSONA B
                                                INNER JOIN " . $con->dbname . ".USUARIO C
                                                        ON C.PER_ID=B.PER_ID)
                                                ON B.PER_CED_RUC=D.IdentificacionDestinatario
                            WHERE A.IdGuiaRemision='$id'";
                           
                        break;
                    Case "RT"://RETENCIONES
                            $sql = "SELECT A.IdentificacionSujetoRetenido CedRuc,C.USU_ID UsuId,B.PER_NOMBRE Nombres,C.USU_CORREO Correo
                                    FROM VSSEAINTERMEDIA.NubeRetencion A
                                            INNER JOIN (" . $con->dbname . ".PERSONA B
                                                    INNER JOIN " . $con->dbname . ".USUARIO C
                                                            ON C.PER_ID=B.PER_ID)
                                                    ON B.PER_CED_RUC=A.IdentificacionSujetoRetenido
                            WHERE A.IdRetencion='$id' ";
                        
                        break;
                    Case "NC"://NOTAS DE CREDITO
                        $sql = "SELECT A.IdentificacionComprador CedRuc,C.USU_ID UsuId,B.PER_NOMBRE Nombres,C.USU_CORREO Correo
                                FROM VSSEAINTERMEDIA.NubeNotaCredito A
                                        INNER JOIN (" . $con->dbname . ".PERSONA B
                                                INNER JOIN " . $con->dbname . ".USUARIO C
                                                        ON C.PER_ID=B.PER_ID)
                                                ON B.PER_CED_RUC=A.IdentificacionComprador
                            WHERE A.IdNotaCredito='$id'";
                        
                        break;
                    Case "ND"://NOTAS DE DEBITO
                        //$sql = "UPDATE " . $con->dbname . ".NubeFactura SET EstadoEnv='$Estado' WHERE IdFactura='$Ids';";
                        break;
                }

        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }

}
