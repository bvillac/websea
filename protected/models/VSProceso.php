<?php

/**
 * This is the model class for table "VSProceso".
 *
 * The followings are the available columns in table 'VSProceso':
 * @property string $Id
 * @property string $IdCompania
 * @property string $ClaveAcceso
 * @property integer $Ambiente
 * @property string $NumeroComprobantes
 * @property string $Estado
 * @property string $RUC
 * @property string $RazonSocial
 * @property string $Email
 * @property string $TipoIdentificacionReceptor
 * @property string $TotalFactura
 * @property string $AutorizacionSRI
 * @property string $FechaAutorizacion
 * @property string $Ruta
 * @property string $FechaEmision
 * @property integer $TipoDocumento
 * @property string $NumDocumento
 * @property string $FechaIngreso
 * @property integer $EstadoEDOC
 * @property integer $EstadoNotificacion
 * @property string $Error
 * @property string $ErrorCodigo
 * @property string $FechaSincCliente
 * @property integer $EstadoSincCliente
 * @property string $ErrorSincCliente
 * @property string $IVA
 * @property string $SubTotalSinImpuesto
 * @property string $UsuarioProceso
 * @property string $UsuarioTransaccionERP
 * @property string $CodigoTransaccionERP
 * @property string $SecuencialERP
 *
 * The followings are the available model relations:
 * @property VSAutorizacion[] $vSAutorizacions
 * @property VSComprobante[] $vSComprobantes
 * @property VSCompania $idCompania
 */
class VSProceso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'VSProceso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Ambiente, TipoDocumento, EstadoEDOC, EstadoNotificacion, EstadoSincCliente', 'numerical', 'integerOnly'=>true),
			array('IdCompania, TotalFactura', 'length', 'max'=>19),
			array('ClaveAcceso, Email, AutorizacionSRI, Error, ErrorSincCliente, UsuarioProceso, UsuarioTransaccionERP', 'length', 'max'=>100),
			array('NumeroComprobantes, ErrorCodigo', 'length', 'max'=>10),
			array('Estado', 'length', 'max'=>25),
			array('RUC, NumDocumento, CodigoTransaccionERP', 'length', 'max'=>50),
			array('RazonSocial', 'length', 'max'=>150),
			array('TipoIdentificacionReceptor', 'length', 'max'=>5),
			array('Ruta', 'length', 'max'=>500),
			array('IVA, SubTotalSinImpuesto', 'length', 'max'=>18),
			array('SecuencialERP', 'length', 'max'=>30),
			array('FechaAutorizacion, FechaEmision, FechaIngreso, FechaSincCliente', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, IdCompania, ClaveAcceso, Ambiente, NumeroComprobantes, Estado, RUC, RazonSocial, Email, TipoIdentificacionReceptor, TotalFactura, AutorizacionSRI, FechaAutorizacion, Ruta, FechaEmision, TipoDocumento, NumDocumento, FechaIngreso, EstadoEDOC, EstadoNotificacion, Error, ErrorCodigo, FechaSincCliente, EstadoSincCliente, ErrorSincCliente, IVA, SubTotalSinImpuesto, UsuarioProceso, UsuarioTransaccionERP, CodigoTransaccionERP, SecuencialERP', 'safe', 'on'=>'search'),
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
			'vSAutorizacions' => array(self::HAS_MANY, 'VSAutorizacion', 'IdProceso'),
			'vSComprobantes' => array(self::HAS_MANY, 'VSComprobante', 'IdProceso'),
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
			'ClaveAcceso' => 'Clave Acceso',
			'Ambiente' => 'Ambiente',
			'NumeroComprobantes' => 'Numero Comprobantes',
			'Estado' => 'Estado',
			'RUC' => 'Ruc',
			'RazonSocial' => 'Razon Social',
			'Email' => 'Email',
			'TipoIdentificacionReceptor' => 'Tipo Identificacion Receptor',
			'TotalFactura' => 'Total Factura',
			'AutorizacionSRI' => 'Autorizacion Sri',
			'FechaAutorizacion' => 'Fecha Autorizacion',
			'Ruta' => 'Ruta',
			'FechaEmision' => 'Fecha Emision',
			'TipoDocumento' => 'Tipo Documento',
			'NumDocumento' => 'Num Documento',
			'FechaIngreso' => 'Fecha Ingreso',
			'EstadoEDOC' => 'Estado Edoc',
			'EstadoNotificacion' => 'Estado Notificacion',
			'Error' => 'Error',
			'ErrorCodigo' => 'Error Codigo',
			'FechaSincCliente' => 'Fecha Sinc Cliente',
			'EstadoSincCliente' => 'Estado Sinc Cliente',
			'ErrorSincCliente' => 'Error Sinc Cliente',
			'IVA' => 'Iva',
			'SubTotalSinImpuesto' => 'Sub Total Sin Impuesto',
			'UsuarioProceso' => 'Usuario Proceso',
			'UsuarioTransaccionERP' => 'Usuario Transaccion Erp',
			'CodigoTransaccionERP' => 'Codigo Transaccion Erp',
			'SecuencialERP' => 'Secuencial Erp',
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
		$criteria->compare('ClaveAcceso',$this->ClaveAcceso,true);
		$criteria->compare('Ambiente',$this->Ambiente);
		$criteria->compare('NumeroComprobantes',$this->NumeroComprobantes,true);
		$criteria->compare('Estado',$this->Estado,true);
		$criteria->compare('RUC',$this->RUC,true);
		$criteria->compare('RazonSocial',$this->RazonSocial,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('TipoIdentificacionReceptor',$this->TipoIdentificacionReceptor,true);
		$criteria->compare('TotalFactura',$this->TotalFactura,true);
		$criteria->compare('AutorizacionSRI',$this->AutorizacionSRI,true);
		$criteria->compare('FechaAutorizacion',$this->FechaAutorizacion,true);
		$criteria->compare('Ruta',$this->Ruta,true);
		$criteria->compare('FechaEmision',$this->FechaEmision,true);
		$criteria->compare('TipoDocumento',$this->TipoDocumento);
		$criteria->compare('NumDocumento',$this->NumDocumento,true);
		$criteria->compare('FechaIngreso',$this->FechaIngreso,true);
		$criteria->compare('EstadoEDOC',$this->EstadoEDOC);
		$criteria->compare('EstadoNotificacion',$this->EstadoNotificacion);
		$criteria->compare('Error',$this->Error,true);
		$criteria->compare('ErrorCodigo',$this->ErrorCodigo,true);
		$criteria->compare('FechaSincCliente',$this->FechaSincCliente,true);
		$criteria->compare('EstadoSincCliente',$this->EstadoSincCliente);
		$criteria->compare('ErrorSincCliente',$this->ErrorSincCliente,true);
		$criteria->compare('IVA',$this->IVA,true);
		$criteria->compare('SubTotalSinImpuesto',$this->SubTotalSinImpuesto,true);
		$criteria->compare('UsuarioProceso',$this->UsuarioProceso,true);
		$criteria->compare('UsuarioTransaccionERP',$this->UsuarioTransaccionERP,true);
		$criteria->compare('CodigoTransaccionERP',$this->CodigoTransaccionERP,true);
		$criteria->compare('SecuencialERP',$this->SecuencialERP,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VSProceso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
