<?php

/**
 * This is the model class for table "VSAlerta".
 *
 * The followings are the available columns in table 'VSAlerta':
 * @property integer $Id
 * @property string $IdCompania
 * @property integer $Valor
 * @property string $Mail
 * @property integer $EsCustomizado
 * @property integer $IdTipoAlerta
 * @property integer $UsuarioCreacion
 * @property string $FechaCreacion
 * @property integer $UsuarioModificacion
 * @property string $FechaModificacion
 * @property integer $UsuarioEliminacion
 * @property string $FechaEliminacion
 *
 * The followings are the available model relations:
 * @property VSCompania $idCompania
 * @property VSTipoAlerta $idTipoAlerta
 */
class VSAlerta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'VSAlerta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Valor, EsCustomizado, IdTipoAlerta, UsuarioCreacion, UsuarioModificacion, UsuarioEliminacion', 'numerical', 'integerOnly'=>true),
			array('IdCompania', 'length', 'max'=>19),
			array('Mail', 'length', 'max'=>100),
			array('FechaCreacion, FechaModificacion, FechaEliminacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, IdCompania, Valor, Mail, EsCustomizado, IdTipoAlerta, UsuarioCreacion, FechaCreacion, UsuarioModificacion, FechaModificacion, UsuarioEliminacion, FechaEliminacion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idCompania' => array(self::BELONGS_TO, 'VSCompania', 'IdCompania'),
			'idTipoAlerta' => array(self::BELONGS_TO, 'VSTipoAlerta', 'IdTipoAlerta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'IdCompania' => 'Id Compania',
			'Valor' => 'Valor',
			'Mail' => 'Mail',
			'EsCustomizado' => 'Es Customizado',
			'IdTipoAlerta' => 'Id Tipo Alerta',
			'UsuarioCreacion' => 'Usuario Creacion',
			'FechaCreacion' => 'Fecha Creacion',
			'UsuarioModificacion' => 'Usuario Modificacion',
			'FechaModificacion' => 'Fecha Modificacion',
			'UsuarioEliminacion' => 'Usuario Eliminacion',
			'FechaEliminacion' => 'Fecha Eliminacion',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('IdCompania',$this->IdCompania,true);
		$criteria->compare('Valor',$this->Valor);
		$criteria->compare('Mail',$this->Mail,true);
		$criteria->compare('EsCustomizado',$this->EsCustomizado);
		$criteria->compare('IdTipoAlerta',$this->IdTipoAlerta);
		$criteria->compare('UsuarioCreacion',$this->UsuarioCreacion);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);
		$criteria->compare('UsuarioModificacion',$this->UsuarioModificacion);
		$criteria->compare('FechaModificacion',$this->FechaModificacion,true);
		$criteria->compare('UsuarioEliminacion',$this->UsuarioEliminacion);
		$criteria->compare('FechaEliminacion',$this->FechaEliminacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VSAlerta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
