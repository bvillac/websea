<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class VSXmlGenerador {
    
    /*
        Datos de Informacion Tributaria de Documentos Cabecera
     *  Si Existe problemas con la COdificacion UTFO-8 quitar utf8_encode ya que viene directo de la base
     *  Verificar en un Gedit si no hay simbolos y caracteres especiales
     */
    public function infoTributaria($cabDoc){
        $valida= new VSValidador();
        $xmldata ='<infoTributaria>';
            $xmldata .='<ambiente>' . $cabDoc["Ambiente"] . '</ambiente>';
            $xmldata .='<tipoEmision>' . $cabDoc["TipoEmision"] . '</tipoEmision>';
            $xmldata .='<razonSocial>' . utf8_encode($valida->limpioCaracteresXML(trim(Yii::app()->getSession()->get('RazonSocial', FALSE)))) . '</razonSocial>';
            $xmldata .='<nombreComercial>' . utf8_encode($valida->limpioCaracteresXML(trim(Yii::app()->getSession()->get('NombreComercial', FALSE)))) . '</nombreComercial>';
            $xmldata .='<ruc>' . utf8_encode(trim(Yii::app()->getSession()->get('Ruc', FALSE))) . '</ruc>';
            $xmldata .='<claveAcceso>' . utf8_encode(trim($cabDoc["ClaveAcceso"])) . '</claveAcceso>';
            $xmldata .='<codDoc>' . $cabDoc["CodigoDocumento"] . '</codDoc>';
            $xmldata .='<estab>' . utf8_encode(trim($cabDoc["Establecimiento"])) . '</estab>';
            $xmldata .='<ptoEmi>' . utf8_encode(trim($cabDoc["PuntoEmision"])) . '</ptoEmi>';
            $xmldata .='<secuencial>' . utf8_encode(trim($cabDoc["Secuencial"])) . '</secuencial>';
            $xmldata .='<dirMatriz>' . utf8_encode(trim($cabDoc["DireccionMatriz"])) . '</dirMatriz>';
        $xmldata .='</infoTributaria>';
        return $xmldata;
    }
    
    public function infoAdicional($adiDoc){
        $xmldata='';
        $valida= new VSValidador();
        if(sizeof($adiDoc)>0){//Verifica si Existen Datos Adicionales para enviar
            $xmldata ='<infoAdicional>';
            for ($i = 0; $i < sizeof($adiDoc); $i++) {
                if(strlen(trim($adiDoc[$i]['Descripcion']))>0){
                    $xmldata .='<campoAdicional nombre="' . utf8_encode(trim($adiDoc[$i]['Nombre'])) . '">' . $valida->limpioCaracteresXML(trim($adiDoc[$i]['Descripcion'])) . '</campoAdicional>';
                }
            }
            $xmldata .='</infoAdicional>';
        }
        return $xmldata;
    }
    
    public function guiadetallesAdicionales($adiDoc){
        $valida= new VSValidador();
        $xmldata ='<detallesAdicionales>';
        for ($i = 0; $i < sizeof($adiDoc); $i++) {
            if(strlen(trim($adiDoc[$i]['Descripcion']))>0){
                $xmldata .='<detAdicional nombre="' . trim($adiDoc[$i]['Nombre']) . '" valor="' . $valida->limpioCaracteresXML(trim($adiDoc[$i]['Descripcion'])) . '">';
            }
        }
        $xmldata .='</detallesAdicionales>';
        return $xmldata;
    }

}
