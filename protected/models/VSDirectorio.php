<?php

/**
 * This is the model class for table "VSDirectorio".
 *
 * The followings are the available columns in table 'VSDirectorio':
 * @property integer $IdDirectorio
 * @property string $IdCompania
 * @property string $TipoDocumento
 * @property string $Descripcion
 * @property string $Ruta
 * @property string $UsuarioCreacion
 * @property string $FechaCreacion
 * @property string $UsuarioEliminacion
 * @property string $FechaEliminacion
 * @property integer $Estado
 *
 * The followings are the available model relations:
 * @property VSCompania $idCompania
 */
class VSDirectorio extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        $dbname = parent::$dbname;
        if ($dbname != "")
            $dbname.=".";
        return $dbname . 'VSDirectorio'; //Empresas es la Utilizada.
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Estado', 'numerical', 'integerOnly' => true),
            array('IdCompania', 'length', 'max' => 19),
            array('TipoDocumento', 'length', 'max' => 50),
            array('Descripcion', 'length', 'max' => 250),
            array('Ruta', 'length', 'max' => 100),
            array('UsuarioCreacion, UsuarioEliminacion', 'length', 'max' => 150),
            array('FechaCreacion, FechaEliminacion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdDirectorio, IdCompania, TipoDocumento, Descripcion, Ruta, UsuarioCreacion, FechaCreacion, UsuarioEliminacion, FechaEliminacion, Estado', 'safe', 'on' => 'search'),
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
            'IdDirectorio' => 'Id Directorio',
            'IdCompania' => 'Id Compania',
            'TipoDocumento' => 'Tipo Documento',
            'Descripcion' => 'Descripcion',
            'Ruta' => 'Ruta',
            'UsuarioCreacion' => 'Usuario Creacion',
            'FechaCreacion' => 'Fecha Creacion',
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

        $criteria->compare('IdDirectorio', $this->IdDirectorio);
        $criteria->compare('IdCompania', $this->IdCompania, true);
        $criteria->compare('TipoDocumento', $this->TipoDocumento, true);
        $criteria->compare('Descripcion', $this->Descripcion, true);
        $criteria->compare('Ruta', $this->Ruta, true);
        $criteria->compare('UsuarioCreacion', $this->UsuarioCreacion, true);
        $criteria->compare('FechaCreacion', $this->FechaCreacion, true);
        $criteria->compare('UsuarioEliminacion', $this->UsuarioEliminacion, true);
        $criteria->compare('FechaEliminacion', $this->FechaEliminacion, true);
        $criteria->compare('Estado', $this->Estado);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VSDirectorio the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function recuperarTipoDocumentos() {
        //$con = yii::app()->dbvssea;
        $con = yii::app()->db;
        $sql = "SELECT idDirectorio,TipoDocumento,Descripcion,Ruta 
                FROM " . $con->dbname . ".VSDirectorio WHERE Estado=1;";
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    

}
