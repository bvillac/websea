<?php

/**
 * This is the model class for table "VSServiciosSRI".
 *
 * The followings are the available columns in table 'VSServiciosSRI':
 * @property integer $Id
 * @property string $Recepcion
 * @property string $Autorizacion
 * @property string $RecepcionLote
 * @property integer $TiempoRespuesta
 * @property integer $TiempoSincronizacion
 * @property string $IdCompania
 * @property integer $UsuarioCreacion
 * @property string $FechaCreacion
 * @property integer $UsuarioModificacion
 * @property string $FechaModificacion
 * @property integer $UsuarioEliminacion
 * @property string $FechaEliminacion
 * @property integer $Ambiente
 * @property integer $Estado
 *
 * The followings are the available model relations:
 * @property VSCompania $idCompania
 */
class VSServiciosSRI extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        $dbname = parent::$dbname;
        if ($dbname != "")
            $dbname.=".";
        return $dbname . 'VSServiciosSRI'; //Empresas es la Utilizada.
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('TiempoRespuesta, TiempoSincronizacion, UsuarioCreacion, UsuarioModificacion, UsuarioEliminacion, Ambiente, Estado', 'numerical', 'integerOnly' => true),
            array('Recepcion, Autorizacion, RecepcionLote', 'length', 'max' => 100),
            array('IdCompania', 'length', 'max' => 19),
            array('FechaCreacion, FechaModificacion, FechaEliminacion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Id, Recepcion, Autorizacion, RecepcionLote, TiempoRespuesta, TiempoSincronizacion, IdCompania, UsuarioCreacion, FechaCreacion, UsuarioModificacion, FechaModificacion, UsuarioEliminacion, FechaEliminacion, Ambiente, Estado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idCompania' => array(self::BELONGS_TO, 'VSCompania', 'IdCompania'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Id' => 'ID',
            'Recepcion' => 'Recepcion',
            'Autorizacion' => 'Autorizacion',
            'RecepcionLote' => 'Recepcion Lote',
            'TiempoRespuesta' => 'Tiempo Respuesta',
            'TiempoSincronizacion' => 'Tiempo Sincronizacion',
            'IdCompania' => 'Id Compania',
            'UsuarioCreacion' => 'Usuario Creacion',
            'FechaCreacion' => 'Fecha Creacion',
            'UsuarioModificacion' => 'Usuario Modificacion',
            'FechaModificacion' => 'Fecha Modificacion',
            'UsuarioEliminacion' => 'Usuario Eliminacion',
            'FechaEliminacion' => 'Fecha Eliminacion',
            'Ambiente' => 'Ambiente',
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
        $criteria->compare('Recepcion', $this->Recepcion, true);
        $criteria->compare('Autorizacion', $this->Autorizacion, true);
        $criteria->compare('RecepcionLote', $this->RecepcionLote, true);
        $criteria->compare('TiempoRespuesta', $this->TiempoRespuesta);
        $criteria->compare('TiempoSincronizacion', $this->TiempoSincronizacion);
        $criteria->compare('IdCompania', $this->IdCompania, true);
        $criteria->compare('UsuarioCreacion', $this->UsuarioCreacion);
        $criteria->compare('FechaCreacion', $this->FechaCreacion, true);
        $criteria->compare('UsuarioModificacion', $this->UsuarioModificacion);
        $criteria->compare('FechaModificacion', $this->FechaModificacion, true);
        $criteria->compare('UsuarioEliminacion', $this->UsuarioEliminacion);
        $criteria->compare('FechaEliminacion', $this->FechaEliminacion, true);
        $criteria->compare('Ambiente', $this->Ambiente);
        $criteria->compare('Estado', $this->Estado);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VSServiciosSRI the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    //INSERT INTO VSSEA.VSServiciosSRI
    //(Id,Recepcion,Autorizacion,RecepcionLote,TiempoRespuesta,TiempoSincronizacion,IdCompania,
    // UsuarioCreacion,FechaCreacion,UsuarioModificacion,FechaModificacion,UsuarioEliminacion,FechaEliminacion,
    // Ambiente,Estado)
    
    public function actualizarServiciosSRI($objEnt) {
        $con = yii::app()->dbvssea;
        $trans = $con->beginTransaction();
        try {
            $this->actualizarDatoServiciosSRI($con, $objEnt); //Actiañoza datos de la Empresa
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
    
    private function actualizarDatoServiciosSRI($con, $objEnt) {
        $sql = "UPDATE " . $con->dbname . ".VSServiciosSRI SET
                    Recepcion = '" . $objEnt[0]['Recepcion'] . "',
                    Autorizacion = '" . $objEnt[0]['Autorizacion'] . "',
                    RecepcionLote = '" . $objEnt[0]['RecepcionLote'] . "',
                    TiempoRespuesta = '" . $objEnt[0]['TiempoRespuesta'] . "',
                    TiempoSincronizacion = '" . $objEnt[0]['TiempoSincronizacion'] . "',
                    IdCompania = '" . $objEnt[0]['IdCompania'] . "',
                    Ambiente = '" . $objEnt[0]['Ambiente'] . "',
                    UsuarioModificacion = '" . Yii::app()->getSession()->get('user_id', FALSE) . "',
                    FechaModificacion = CURRENT_TIMESTAMP()
                WHERE Id=" . $objEnt[0]['Id'] . " ";
        //echo $sql;
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    public function recuperarServiciosSRI($id) {
        $con = yii::app()->dbvssea;
        $sql = "SELECT * FROM " . $con->dbname . ".VSServiciosSRI where Id='$id' AND Estado='1' ";
        //echo $sql;
        return $con->createCommand($sql)->query();
    }

   
}
