<?php

/**
 * This is the model class for table "VSServidorCorreo".
 *
 * The followings are the available columns in table 'VSServidorCorreo':
 * @property integer $Id
 * @property string $IDCompania
 * @property string $Mail
 * @property string $NombreMostrar
 * @property string $Asunto
 * @property string $Cuerpo
 * @property integer $EsHtml
 * @property string $Clave
 * @property string $Usuario
 * @property string $SMTPServidor
 * @property integer $SMTPPuerto
 * @property integer $TiempoRespuesta
 * @property integer $TiempoEspera
 * @property string $ServidorAcuse
 * @property integer $ActivarAcuse
 * @property string $CCO
 * @property integer $UsuarioCreacion
 * @property string $FechaCreacion
 * @property integer $UsuarioModificacion
 * @property string $FechaModificacion
 * @property string $UsuarioEliminacion
 * @property string $FechaEliminacion
 * @property integer $Estado
 *
 * The followings are the available model relations:
 * @property VSCompania $iDCompania
 */
class VSServidorCorreo extends VsSeaActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VSServidorCorreo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        $dbname = parent::$dbname;
        if ($dbname != "")
            $dbname.=".";
        return $dbname . 'VSServidorCorreo'; //Empresas es la Utilizada.
        //return 'VSCompania';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('EsHtml, SMTPPuerto, TiempoRespuesta, TiempoEspera, ActivarAcuse, UsuarioCreacion, UsuarioModificacion, Estado', 'numerical', 'integerOnly' => true),
            array('IDCompania', 'length', 'max' => 19),
            array('Mail, Cuerpo, Usuario, SMTPServidor', 'length', 'max' => 100),
            array('NombreMostrar', 'length', 'max' => 200),
            array('Asunto, ServidorAcuse, CCO', 'length', 'max' => 500),
            array('Clave', 'length', 'max' => 25),
            array('UsuarioEliminacion', 'length', 'max' => 150),
            array('FechaCreacion, FechaModificacion, FechaEliminacion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Id, IDCompania, Mail, NombreMostrar, Asunto, Cuerpo, EsHtml, Clave, Usuario, SMTPServidor, SMTPPuerto, TiempoRespuesta, TiempoEspera, ServidorAcuse, ActivarAcuse, CCO, UsuarioCreacion, FechaCreacion, UsuarioModificacion, FechaModificacion, UsuarioEliminacion, FechaEliminacion, Estado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'iDCompania' => array(self::BELONGS_TO, 'VSCompania', 'IDCompania'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Id' => 'ID',
            'IDCompania' => 'Idcompania',
            'Mail' => 'Mail',
            'NombreMostrar' => 'Nombre Mostrar',
            'Asunto' => 'Asunto',
            'Cuerpo' => 'Cuerpo',
            'EsHtml' => 'Es Html',
            'Clave' => 'Clave',
            'Usuario' => 'Usuario',
            'SMTPServidor' => 'Smtpservidor',
            'SMTPPuerto' => 'Smtppuerto',
            'TiempoRespuesta' => 'Tiempo Respuesta',
            'TiempoEspera' => 'Tiempo Espera',
            'ServidorAcuse' => 'Servidor Acuse',
            'ActivarAcuse' => 'Activar Acuse',
            'CCO' => 'Cco',
            'UsuarioCreacion' => 'Usuario Creacion',
            'FechaCreacion' => 'Fecha Creacion',
            'UsuarioModificacion' => 'Usuario Modificacion',
            'FechaModificacion' => 'Fecha Modificacion',
            'UsuarioEliminacion' => 'Usuario Eliminacion',
            'FechaEliminacion' => 'Fecha Eliminacion',
            'Estado' => 'Estado',
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

        $criteria->compare('Id', $this->Id);
        $criteria->compare('IDCompania', $this->IDCompania, true);
        $criteria->compare('Mail', $this->Mail, true);
        $criteria->compare('NombreMostrar', $this->NombreMostrar, true);
        $criteria->compare('Asunto', $this->Asunto, true);
        $criteria->compare('Cuerpo', $this->Cuerpo, true);
        $criteria->compare('EsHtml', $this->EsHtml);
        $criteria->compare('Clave', $this->Clave, true);
        $criteria->compare('Usuario', $this->Usuario, true);
        $criteria->compare('SMTPServidor', $this->SMTPServidor, true);
        $criteria->compare('SMTPPuerto', $this->SMTPPuerto);
        $criteria->compare('TiempoRespuesta', $this->TiempoRespuesta);
        $criteria->compare('TiempoEspera', $this->TiempoEspera);
        $criteria->compare('ServidorAcuse', $this->ServidorAcuse, true);
        $criteria->compare('ActivarAcuse', $this->ActivarAcuse);
        $criteria->compare('CCO', $this->CCO, true);
        $criteria->compare('UsuarioCreacion', $this->UsuarioCreacion);
        $criteria->compare('FechaCreacion', $this->FechaCreacion, true);
        $criteria->compare('UsuarioModificacion', $this->UsuarioModificacion);
        $criteria->compare('FechaModificacion', $this->FechaModificacion, true);
        $criteria->compare('UsuarioEliminacion', $this->UsuarioEliminacion, true);
        $criteria->compare('FechaEliminacion', $this->FechaEliminacion, true);
        $criteria->compare('Estado', $this->Estado);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    //INSERT INTO `VSSEA`.`VSServidorCorreo`(
    //Id,IDCompania,Mail,NombreMostrar,Asunto,Cuerpo,EsHtml,Clave,Usuario,SMTPServidor,SMTPPuerto,
    //TiempoRespuesta,TiempoEspera,ServidorAcuse,ActivarAcuse,CCO,UsuarioCreacion,FechaCreacion,
    //UsuarioModificacion,FechaModificacion,UsuarioEliminacion,FechaEliminacion,Estado

    public function insertarServidor($objEnt) {
        $con = Yii::app()->dbvssea;
        $trans = $con->beginTransaction();
        try {
            $this->insertarDatoServidor($con, $objEnt);
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

    private function insertarDatoServidor($con, $objEnt) {  
        $sql = "INSERT INTO " . $con->dbname . ".VSServidorCorreo 
            (IDCompania,Mail,NombreMostrar,Asunto,Cuerpo,EsHtml,Clave,Usuario,SMTPServidor,SMTPPuerto,
             TiempoRespuesta,TiempoEspera,ServidorAcuse,ActivarAcuse,CCO,UsuarioCreacion,FechaCreacion,Estado)VALUES(
             '" . $objEnt[0]['IDCompania'] . "',
             '" . $objEnt[0]['Mail'] . "',
             '" . $objEnt[0]['NombreMostrar'] . "',
             '" . $objEnt[0]['Asunto'] . "',
             '" . $objEnt[0]['Cuerpo'] . "',
             '" . $objEnt[0]['EsHtml'] . "',
             '" . $objEnt[0]['Clave'] . "',
             '" . $objEnt[0]['Usuario'] . "',
             '" . $objEnt[0]['SMTPServidor'] . "',
             '" . $objEnt[0]['SMTPPuerto'] . "',
             '" . $objEnt[0]['TiempoRespuesta'] . "',
             '" . $objEnt[0]['TiempoEspera'] . "',
             '" . $objEnt[0]['ServidorAcuse'] . "',
             '" . $objEnt[0]['ActivarAcuse'] . "',
             '" . $objEnt[0]['CCO'] . "',
             '" . Yii::app()->getSession()->get('user_id', FALSE) . "', 
             CURRENT_TIMESTAMP(),
                 '" . $objEnt[0]['Estado'] . "')";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    
    public function actualizarServidor($objEnt) {
        $con = yii::app()->dbvssea;
        $trans = $con->beginTransaction();
        try {
            $this->actualizarDatoServidor($con, $objEnt); //Actiañoza datos de la Empresa
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
    
    private function actualizarDatoServidor($con, $objEnt) {
        
        $sql = "UPDATE " . $con->dbname . ".VSServidorCorreo SET
                    IDCompania = '" . $objEnt[0]['IDCompania'] . "',
                    Mail = '" . $objEnt[0]['Mail'] . "',
                    NombreMostrar = '" . $objEnt[0]['NombreMostrar'] . "',
                    Asunto = '" . $objEnt[0]['Asunto'] . "',
                    Cuerpo = '" . $objEnt[0]['Cuerpo'] . "',
                    EsHtml = '" . $objEnt[0]['EsHtml'] . "',
                    Clave = '" . $objEnt[0]['Clave'] . "',
                    Usuario = '" . $objEnt[0]['Usuario'] . "',
                    SMTPServidor = '" . $objEnt[0]['SMTPServidor'] . "',
                    SMTPPuerto = '" . $objEnt[0]['SMTPPuerto'] . "',
                    TiempoRespuesta = '" . $objEnt[0]['TiempoRespuesta'] . "',
                    TiempoEspera = '" . $objEnt[0]['TiempoEspera'] . "',
                    ServidorAcuse = '" . $objEnt[0]['ServidorAcuse'] . "',
                    ActivarAcuse = '" . $objEnt[0]['ActivarAcuse'] . "',
                    CCO = '" . $objEnt[0]['CCO'] . "',
                    UsuarioModificacion = '" . Yii::app()->getSession()->get('user_id', FALSE) . "',
                    FechaModificacion = CURRENT_TIMESTAMP()
                WHERE IdCompania=" . $objEnt[0]['Id'] . " ";
        //echo $sql;
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    public function recuperarServidor($id) {
        $con = yii::app()->dbvssea;
        $sql = "SELECT * FROM " . $con->dbname . ".VSServidorCorreo where Id='$id' AND Estado='1' ";
        //echo $sql;
        return $con->createCommand($sql)->query();
    }

}
