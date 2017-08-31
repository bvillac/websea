<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
         
        private $_id;
        private $_username;
        //private $_password;
        public  $_rememberMe;
        
	public function authenticate()
	{
		/*$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);*/
		/*if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;*/
                //echo $this->username;
                $empresa=new EMPRESA;
                $rol=new ROL;
                $session = Yii::app()->getSession();
                $user= USUARIO::model()->find('LOWER(USU_NOMBRE)=?', array(strtolower($this->username)));

                $session->add('isuser', FALSE);
                
                if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		//elseif($this->password!==$user->USU_PASSWORD)
                elseif(md5 ($this->password)!==$user->USU_PASSWORD)//Validacion Clave con MD5
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
                else{
                    //yii::app()->user->_id;
                    $this->_id=$user->USU_ID;
                    $this->_username=$user->USU_NOMBRE;
                    $session->add('isuser', TRUE);
                    $session->add('user_id', $user->USU_ID);
                    $session->add('user_name', $user->USU_NOMBRE);
                    //$this->setState('CORREO', $user->CORREO);
                    //PARA USAR LAS VARIABLES DE SESSION
                    //yii::app()->user->CORREO;
                    //yii::app()->user->getState('CORREO');
                    //Yii::app()->getSession()->get('user_name', FALSE);
                    //INFORMACION EMPRESAS
                    //$emp=$empresa->mostrarEmpresas($user->USU_ID);
                    $emp_id=Yii::app()->params['EmpID'];//'1';
                    $est_id=Yii::app()->params['EstID'];//'1';
                    $pemi_id=Yii::app()->params['PemiID'];//'1';
                    $data=$empresa->buscarDataEmpresa($emp_id, $est_id, $pemi_id);
                    $tipoUser=$rol->buscarTipoUser($user->USU_ID);
                    //VSValidador::putMessageLogFile(Yii::app()->params['EmpID']);
                    $session->add('emp_id', $emp_id);
                    $session->add('est_id', $est_id);
                    $session->add('pemi_id', $pemi_id);
                    $session->add('Ruc',$data['Ruc']);
                    $session->add('RazonSocial',$data['RazonSocial']);
                    $session->add('NombreComercial',$data['NombreComercial']);
                    $session->add('DireccionMatriz',$data['DireccionMatriz']);
                    $session->add('DireccionSucursal',$data['DireccionSucursal']);
                    $session->add('ContribuyenteEspecial',$data['ContribuyenteEspecial']);
                    $session->add('ObligadoContabilidad',$data['ObligadoContabilidad']);
                    $session->add('CorreoConta',$data['CorreoConta']);
                    //Asignacion de Ambiente Pruebas o Produccion
                    $ambiente=$empresa->buscarAmbienteEmp($data['EMP_ID'],$data['Ambiente']);
                    $session->add('Recepcion',trim($ambiente['Recepcion']));//Aceptacion Comprobantes
                    $session->add('Autorizacion',trim($ambiente['Autorizacion']));//Autorizacion Comprobantes
                    $session->add('RecepcionLote',trim($ambiente['RecepcionLote']));//RecepcionLote Comprobantes
                    $session->add('UsuarioErp',$tipoUser['UsuarioErp']);
                    $session->add('RolId',$tipoUser['ROL_ID']);
                    $session->add('RolNombre',$tipoUser['ROL_NOMBRE']);
                    
                    $this->errorCode=self::ERROR_NONE;
                }
                
                $session->close();
                return $this->errorCode == self::ERROR_NONE;
                
	}
}