<?php

/**
 * This is the model class for table "VSUsuario".
 *
 * The followings are the available columns in table 'VSUsuario':
 * @property integer $Id
 * @property string $Usuario
 * @property string $Clave
 * @property string $IdCompania
 * @property string $Email
 * @property string $UsuarioCreacion
 * @property string $FechaCreacion
 * @property string $UsuarioModificacion
 * @property string $FechaModificacion
 * @property string $UsuarioEliminacion
 * @property string $FechaEliminacion
 * @property string $Nombre
 * @property integer $Estado
 *
 * The followings are the available model relations:
 * @property VSCompania $idCompania
 */
class VSUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'VSUsuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Estado', 'numerical', 'integerOnly'=>true),
			array('Usuario', 'length', 'max'=>100),
			array('Clave', 'length', 'max'=>25),
			array('IdCompania', 'length', 'max'=>19),
			array('Email', 'length', 'max'=>250),
			array('UsuarioCreacion, UsuarioModificacion, UsuarioEliminacion', 'length', 'max'=>10),
			array('Nombre', 'length', 'max'=>500),
			array('FechaCreacion, FechaModificacion, FechaEliminacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Usuario, Clave, IdCompania, Email, UsuarioCreacion, FechaCreacion, UsuarioModificacion, FechaModificacion, UsuarioEliminacion, FechaEliminacion, Nombre, Estado', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Usuario' => 'Usuario',
			'Clave' => 'Clave',
			'IdCompania' => 'Id Compania',
			'Email' => 'Email',
			'UsuarioCreacion' => 'Usuario Creacion',
			'FechaCreacion' => 'Fecha Creacion',
			'UsuarioModificacion' => 'Usuario Modificacion',
			'FechaModificacion' => 'Fecha Modificacion',
			'UsuarioEliminacion' => 'Usuario Eliminacion',
			'FechaEliminacion' => 'Fecha Eliminacion',
			'Nombre' => 'Nombre',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('Usuario',$this->Usuario,true);
		$criteria->compare('Clave',$this->Clave,true);
		$criteria->compare('IdCompania',$this->IdCompania,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('UsuarioCreacion',$this->UsuarioCreacion,true);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);
		$criteria->compare('UsuarioModificacion',$this->UsuarioModificacion,true);
		$criteria->compare('FechaModificacion',$this->FechaModificacion,true);
		$criteria->compare('UsuarioEliminacion',$this->UsuarioEliminacion,true);
		$criteria->compare('FechaEliminacion',$this->FechaEliminacion,true);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Estado',$this->Estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VSUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
