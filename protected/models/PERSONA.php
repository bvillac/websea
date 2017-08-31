<?php

/**
 * This is the model class for table "PERSONA".
 *
 * The followings are the available columns in table 'PERSONA':
 * @property string $PER_ID
 * @property string $PER_NOMBRE
 * @property string $PER_APELLIDO
 * @property string $PER_EST_LOG
 * @property string $PER_FEC_CRE
 * @property string $PER_FEC_MOD
 *
 * The followings are the available model relations:
 * @property USUARIO[] $uSUARIOs
 */
class PERSONA extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        //return 'PERSONA';
        $dbname = parent::$dbname;
        if ($dbname != "")
            $dbname.=".";
        return $dbname . 'PERSONA'; //Empresas es la Utilizada.
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('PER_NOMBRE, PER_APELLIDO', 'length', 'max' => 100),
            array('PER_EST_LOG', 'length', 'max' => 1),
            array('PER_FEC_CRE, PER_FEC_MOD', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('PER_ID, PER_NOMBRE, PER_APELLIDO, PER_EST_LOG, PER_FEC_CRE, PER_FEC_MOD', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'uSUARIOs' => array(self::HAS_MANY, 'USUARIO', 'PER_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'PER_ID' => 'Per',
            'PER_NOMBRE' => 'Per Nombre',
            'PER_APELLIDO' => 'Per Apellido',
            'PER_EST_LOG' => 'Per Est Log',
            'PER_FEC_CRE' => 'Per Fec Cre',
            'PER_FEC_MOD' => 'Per Fec Mod',
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

        $criteria->compare('PER_ID', $this->PER_ID, true);
        $criteria->compare('PER_NOMBRE', $this->PER_NOMBRE, true);
        $criteria->compare('PER_APELLIDO', $this->PER_APELLIDO, true);
        $criteria->compare('PER_EST_LOG', $this->PER_EST_LOG, true);
        $criteria->compare('PER_FEC_CRE', $this->PER_FEC_CRE, true);
        $criteria->compare('PER_FEC_MOD', $this->PER_FEC_MOD, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PERSONA the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Función 
     *
     * @author Byron Villacreses
     * @access public
     * @return Retorna las personas que existen en la tabla PERSONA
     */
    public function retornarPersona($valor, $op) {
        $con = Yii::app()->db;
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
                $condicion .=" AND (PER_NOMBRE LIKE '%$aux[$i]%' OR PER_APELLIDO LIKE '%$aux[$i]%' ) ";
            }
        }

        $sql = "SELECT PER_ID,CONCAT(PER_APELLIDO,' ',PER_NOMBRE) AS PERSONA,PER_APELLIDO,PER_NOMBRE,PER_CEDULA,
                    PER_GENERO,PER_ESTADO_CIVIL,PER_DOMICILIO_DIRECCION,PER_DOMICILIO_TELEFONO,PER_FECHA_NACIMIENTO,TSAN_ID
                FROM DB_CROCODILE.PERSONA WHERE PER_ESTADO_LOGICO=1 ";
        switch ($op) {
            case 'CED':
                $sql .=" AND PER_CEDULA LIKE '%$valor%' ";
                break;
            case 'NOM':
                $sql .=$condicion;
                break;
            default:
        }
        //$sql .= " LIMIT " . Yii::app()->params['pageSize'];
        $sql .= " LIMIT 10";

        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }

}
