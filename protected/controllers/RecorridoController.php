<?php

class RecorridoController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // permite a todos los usuarios ejecutar las acciones
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // permite a los usuarios logueados ejecutar las acciones 
                'actions' => array('create','save', 'update', 'Documento', 'BuscaDataIndex', 'BuscarPersonas', 'GenerarXml', 'EnviarDocumento',
                    'EnviarCorreccion','EnviarAnular','EnviarCorreo','Updatemail','Savemail','XmlAutorizado'),
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
    
    private function tipoEstadoREC() {
        return array(
            //'1' => Yii::t('COMPANIA', 'Todos'),
            '1' => Yii::t('COMPANIA', 'Recibidos'),
            '2' => Yii::t('COMPANIA', 'Entregados'),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new NubeFactura;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['NubeFactura'])) {
            $model->attributes = $_POST['NubeFactura'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->IdFactura));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['NubeFactura'])) {
            $model->attributes = $_POST['NubeFactura'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->IdFactura));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new NubeFactura('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['NubeFactura']))
            $model->attributes = $_GET['NubeFactura'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return NubeFactura the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = NubeFactura::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param NubeFactura $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'nube-factura-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionIndex() {
        $modelo = new Entrega();
//        $tipDoc= new VSDirectorio();
//        $aproba= new VSacceso();
        $contBuscar = array();
//        if (Yii::app()->request->isAjaxRequest) {
//            //$contBuscar = isset($_POST['CONT_BUSCAR']) ? CJavaScript::jsonDecode($_POST['CONT_BUSCAR']) : array();
//            //echo CJSON::encode($modelo->mostrarDocumentos($contBuscar));
//            $arrayData = array();
//            $contBuscar = isset($_POST['CONT_BUSCAR']) ? CJavaScript::jsonDecode($_POST['CONT_BUSCAR']) : array();
//            $contBuscar[0]['PAGE'] = isset($_GET['page']) ? $_GET['page'] : 0;
//            $arrayData = $modelo->mostrarDocumentos($contBuscar);
//            $this->renderPartial('_indexGrid', array(
//                'model' => $arrayData,
//                    ), false, true);
//            return;
//        }
        $this->titleWindows = Yii::t('DOCUMENTOS', 'Recorrido');
        $this->render('index', array(
            //'dataProvider' => $dataProvider,
            'model' => $modelo->ConsultarListRutas($contBuscar),
            'tipoDoc' => '',//$tipDoc->recuperarTipoDocumentos(),
            'tipoApr' => $this->tipoEstadoREC(),
        ));
    }

    public function actionDocumento($ids) {
        try {
            $ids = isset($_GET['ids']) ? base64_decode($_GET['ids']) : NULL;
            $modelo = new Entrega(); //Ejmpleo code 3
            $cabFact = $modelo->mostrarCabFactura($ids);
            $detFact = $modelo->mostrarDetFactura($ids,$cabFact['TIP_REC']);
      
            $this->render('documento', array(
                'model' => '',//$model,
                'cabFact' => $cabFact,
                'detFact' => $detFact,
            ));
            

        } catch (Exception $e) {
            $this->errorControl($e);
        }
    }

    public function actionBuscarPersonas() {
        if (Yii::app()->request->isAjaxRequest) {
            $valor = isset($_POST['valor']) ? $_POST['valor'] : "";
            $op = isset($_POST['op']) ? $_POST['op'] : "";
            $arrayData = array();
            $data = new NubeFactura();
            $arrayData = $data->retornarPersona($valor, $op);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arrayData);
        }
    }

    public function actionBuscaDataIndex() {
        if (Yii::app()->request->isAjaxRequest) {
            $arrayData = array();
            $obj = new NubeFactura();
            $contBuscar = isset($_POST['CONT_BUSCAR']) ? CJavaScript::jsonDecode($_POST['CONT_BUSCAR']) : array();
            $arrayData = $obj->mostrarDocumentos($contBuscar);
            $this->renderPartial('_indexGrid', array(
                'model' => $arrayData,
                    ), false, true);
            return;
        }
    }


    public function actionSave() {
        if (Yii::app()->request->isPostRequest) {
            $model = new Entrega();
            $dts_Lista = isset($_POST['DTS_LISTA']) ? CJavaScript::jsonDecode($_POST['DTS_LISTA']) : array();         
//            $tieId = isset($_POST['TIE_ID']) ? $_POST['TIE_ID'] : 0;
            $tipRec = isset($_POST['TIP_REC']) ? $_POST['TIP_REC'] : 0;
//            $accion = isset($_POST['ACCION']) ? $_POST['ACCION'] : "";
            $cabId=0;
            //VSValidador::putMessageLogFile($dts_Lista);
            $arroout = $model->actualizarLista($cabId,$tipRec,$dts_Lista);
          
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
        }
    }
    

}
