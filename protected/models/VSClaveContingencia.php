<?php

/**
 * This is the model class for table "VSClaveContingencia".
 *
 * The followings are the available columns in table 'VSClaveContingencia':
 * @property string $Id
 * @property string $IdCompania
 * @property integer $Estado
 * @property string $FechaIngreso
 * @property string $FechaUso
 *
 * The followings are the available model relations:
 * @property VSCompania $idCompania
 */
class VSClaveContingencia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'VSClaveContingencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Id', 'required'),
			array('Estado', 'numerical', 'integerOnly'=>true),
			array('Id', 'length', 'max'=>500),
			array('IdCompania', 'length', 'max'=>19),
			array('FechaIngreso, FechaUso', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, IdCompania, Estado, FechaIngreso, FechaUso', 'safe', 'on'=>'search'),
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
			'IdCompania' => 'Id Compania',
			'Estado' => 'Estado',
			'FechaIngreso' => 'Fecha Ingreso',
			'FechaUso' => 'Fecha Uso',
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

		$criteria->compare('Id',$this->Id,true);
		$criteria->compare('IdCompania',$this->IdCompania,true);
		$criteria->compare('Estado',$this->Estado);
		$criteria->compare('FechaIngreso',$this->FechaIngreso,true);
		$criteria->compare('FechaUso',$this->FechaUso,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VSClaveContingencia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
