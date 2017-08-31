<?php

class VSDocumentosController extends Controller {

    //http://yiiframeworkespanol.blogspot.com/2014_05_01_archive.html
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            array('allow', // permite a todos los usuarios ejecutar las acciones
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // permite a los usuarios logueados ejecutar las acciones 
                'actions' => array('create', 'update', 'Documentos','reportes','documento_Rep'),
                'users' => array('@'),
            ),
            array('allow', // permite que únicamente el usuario admin ejecute las , 
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // niega cualquier otra acción para cualquier usuario
                'users' => array('*'),
            ),
        );
    }
    
    public function actionReportes() {
        
        $tipDoc= new VSDirectorio();
        $aproba= new VSacceso();

        $this->titleWindows = Yii::t('DOCUMENTOS', 'Reporte Documentos');
        $this->render('reportes', array(
            //'dataProvider' => $dataProvider,
            //'model' => $modelo->mostrarDocumentos($contBuscar),
            'model' =>'',
            'tipoDoc' => $tipDoc->recuperarTipoDocumentos(),
            'tipoApr' => $aproba->tipoAprobacion(),
        ));
        
        
    }
    
    
    public function actionDocumentos($data) {
        try {
            $control = base64_decode($data);
            //VSValidador::putMessageLogFile($control);
            $data = explode(",", $control); //Recibe Datos y los separa
            $f_ini=$data[1];//Fecha Inicio
            $f_fin=$data[2];//Fecha Fin
            $t_apr=$data[3];//datos t_apr
            $t_doc=$data[4];//Datos t_doc
            //VSValidador::putMessageLogFile($t_doc);
            switch ($t_doc) {
                case '01'://Facturas
                    $modelo = new NubeFactura();
                    $arrayData = $modelo->reporteDocumentos($f_ini,$f_fin,$t_apr);
                    //VSValidador::putMessageLogFile($arrayData);
                    break;
                case 'NOM':
                    $sql .=$condicion;
                    break;
                default:
            }

            
            $rep=new REPORTES;
            //$modelo = new CABPEDIDO;
            $mPDF1=$rep->crearBaseReport();
            $Titulo = "Reporte Documentos";
            $nameFile=Yii::t('TIENDA', 'Documento') . "-" . date('YmdHis');            
            $Contenido=$this->renderPartial('documento_Rep', array(
                            'data' => $arrayData,
                            //'control' => $arrayData,
                            'titulo' => $Titulo,
                            'f_ini'=> $f_ini,//Fecha Inicio
                            'f_fin'=> $f_fin,//Fecha Fin
                                ), true);
            
            if ($data[0] == 1) {
                $mPDF1->SetTitle($Titulo);
                $mPDF1->WriteHTML($Contenido); //hacemos un render partial a una vista preparada, en este caso es la vista docPDF
                $mPDF1->Output($nameFile, 'I');
            } else {
                yii::app()->request->sendFile($nameFile.'.xls', $Contenido);
            }
            //exit;
        } catch (Exception $e) {
            $this->errorControl($e);
        }
    }
    
    
    
        
}
