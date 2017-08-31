<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ROL
 *
 * @author root
 */
class ROL extends CActiveRecord {
    //put your code here
     public function tableName() {
        //return 'EMPRESA';
        $dbname = parent::$dbname;
        if ($dbname != "")
            $dbname.=".";
        return $dbname . 'ROL'; //Empresas es la Utilizada.
    }

    public function buscarTipoUser($IdUser) {
        $conApp = yii::app()->db;
        $rawData = array();
        $sql = "SELECT A.UEMP_ID,A.USU_EMP_ERP UsuarioErp,A.USU_ID,B.USU_NOMBRE,C.ROL_ID,C.ROL_NOMBRE "
                        . "FROM " . $conApp->dbname . ".USUARIO_EMPRESA A "
                                . "INNER JOIN " . $conApp->dbname . ".USUARIO B "
                                        . "ON A.USU_ID=B.USU_ID "
                                . "INNER JOIN  " . $conApp->dbname . ".ROL C "
                                        . "ON A.ROL_ID=C.ROL_ID "
                . "WHERE A.USU_ID=$IdUser AND B.USU_EST_LOG=1 ";
        //echo $sql;
        //$rawData = $conApp->createCommand($sql)->queryAll(); //Varios registros =>  $rawData[0]['RazonSocial']
        $rawData = $conApp->createCommand($sql)->queryRow();  //Un solo Registro => $rawData['RazonSocial']
        $conApp->active = false;
        return $rawData;
    }
}
