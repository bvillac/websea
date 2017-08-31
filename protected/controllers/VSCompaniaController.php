<?php

class VSCompaniaController extends Controller {

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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'index', 'view', 'create', 'update','upload','Save'),
                'users' => array('bvillacreses'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
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
        $model = new VSCompania;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['VSCompania'])) {
            $model->attributes = $_POST['VSCompania'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->IdCompania));
        }
        $this->titleWindows = Yii::t('COMPANIA', 'Company');
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    /*public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['VSCompania'])) {
            $model->attributes = $_POST['VSCompania'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->IdCompania));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }*/
    
    public function actionUpdate($id) {
        $model = new VSCompania;
        $empresa = $model->recuperarEmpresa($id);
        $model->IdCompania = $id; //mantiene el ID del Descargo Actualizar

        $this->titleWindows = Yii::t('COMPANIA', 'Company');
        $this->render('update', array(
            'model' => $model,
            //'data' => CJavaScript::jsonEncode($empresa),
            'data' => base64_encode(CJavaScript::jsonEncode($empresa)),
        ));
    }


    /**
     * Lists all models.
     */
    public function actionIndex() {
        
        $modelo = new VSCompania;
        
        $this->menu = array(
            array('label' => 'Create VSCompania', 'url' => array('create')),
            array('label' => 'Manage VSCompania', 'url' => array('admin')),
        );
        
        $this->titleWindows = Yii::t('COMPANIA', 'Company');
        //$dataProvider = new CActiveDataProvider('VSCompania');
        $this->render('index', array(
           //'dataProvider' => $dataProvider,
           'model' => $modelo->mostrarCompanias(),
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new VSCompania('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VSCompania']))
            $model->attributes = $_GET['VSCompania'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return VSCompania the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = VSCompania::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param VSCompania $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'vscompania-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    //Nota: Si tiene problema no olvidar los privilegios de la carpeta
    public function actionUpload() {
        Yii::import("ext.EAjaxUpload.qqFileUploader");
        $extfd =Yii::app()->params['seaFirext'];//Extension de firma electronica
        $folder =Yii::app()->params['seaFirma'];// folder for uploaded files
        //$folder = getcwd()."/file/uploads/"; //mUESTRA TODA LA RUTA DEL PROYECTO
        $allowedExtensions = array($extfd, "pdf"); //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 10 * 1024 * 1024; // maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        $fileSize = filesize($folder . $result['filename']); //GETTING FILE SIZE
        $fileName = $result['filename']; //GETTING FILE NAME //Retorna el Nombre del Archivo a subir

        echo $return; // it's array 
    }
    
     public function actionSave() {
        if (Yii::app()->request->isPostRequest) {
            $model = new VSCompania;
            $objEmp = isset($_POST['EMPRESA']) ? CJavaScript::jsonDecode($_POST['EMPRESA']) : array();
            //print_r($objEmp);
            $accion = isset($_POST['ACCION']) ? $_POST['ACCION'] : "";
            if ($accion == "Create") {
                $resul = $model->insertarEmpresa($objEmp);
            } else {
                $resul = $model->actualizarEmpresa($objEmp);
            }
            if ($resul) {
                $arroout["status"] = "OK";
                $arroout["type"] = "tbalert";
                $arroout["label"] = "success";
                $arroout["error"] = "false";
                $arroout["message"] = Yii::t('EXCEPTION', '<strong>Well done!</strong> your information was successfully saved.');
                $arroout["data"] = null;
            } else {
                $arroout["status"] = "NO_OK";
                $arroout["type"] = "tbalert";
                $arroout["label"] = "error";
                $arroout["error"] = "true";
                $arroout["message"] = Yii::t('EXCEPTION', 'Invalid request. Please do not repeatt this request again.');
                $arroout["data"] = null;
            }
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
            return;
        }
    }
    
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete() {
        try {
            if (Yii::app()->request->isPostRequest) {
                //$ids = base64_decode($_POST['ids']);
                $ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
                $res = new VSCompania;
                if ($res->removerEmpresa($ids)) {
                    $arroout["status"] = "OK";
                    $arroout["type"] = "tbalert";
                    $arroout["label"] = "success";
                    $arroout["error"] = "false";
                    $arroout["message"] = Yii::t('EXCEPTION', '<strong>Well done!</strong> your information was successfully delete.');
                    $arroout["data"] = null;
                } else {
                    $arroout["status"] = "NO_OK";
                    $arroout["type"] = "tbalert";
                    $arroout["label"] = "error";
                    $arroout["error"] = "true";
                    $arroout["message"] = Yii::t('EXCEPTION', 'Invalid request. Deletion error; Please do not repeatt this request again.');
                }
                header('Content-type: application/json');
                echo CJavaScript::jsonEncode($arroout);
                return;
            }
        } catch (Exception $e) {
            $this->errorControl($e);
        }
    }


}
