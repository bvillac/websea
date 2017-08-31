<?php

class VSConfiguracionController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionScorreo() {
        $model = new VSServidorCorreo;
        $id='1';
        $data = $model->recuperarServidor($id);
        $this->titleWindows = Yii::t('GENERAL', 'Mail server');
        $this->render('scorreo', array(
            'model' => $model,
            'data' => base64_encode(CJavaScript::jsonEncode($data)),
        ));
    }
    
    public function actionSave() {
        if (Yii::app()->request->isPostRequest) {
            $model = new VSServidorCorreo;
            $objEnt = isset($_POST['SERVER']) ? CJavaScript::jsonDecode($_POST['SERVER']) : array();
            $accion = isset($_POST['ACCION']) ? $_POST['ACCION'] : "";
            if ($accion == "Create") {
                $resul = $model->insertarServidor($objEnt);
            } else {
                $resul = $model->actualizarServidor($objEnt);
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
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionSersri() {
        $model = new VSServiciosSRI;
        $id='1';
        $data = $model->recuperarServiciosSRI($id);
        $this->titleWindows = Yii::t('GENERAL', 'Web Services');
        $this->render('sersri', array(
            'model' => $model,
            'data' => base64_encode(CJavaScript::jsonEncode($data)),
        ));
    }
    
    public function actionSaveSri() {
        if (Yii::app()->request->isPostRequest) {
            $model = new VSServiciosSRI;
            $objEnt = isset($_POST['SERVER']) ? CJavaScript::jsonDecode($_POST['SERVER']) : array();
            $accion = isset($_POST['ACCION']) ? $_POST['ACCION'] : "";
            if ($accion == "Create") {
                //$resul = $model->insertarServidor($objEnt);
            } else {
                $resul = $model->actualizarServiciosSRI($objEnt);
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
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCcontingencia() {
        $model = new VSServiciosSRI;
        //$id='1';
        //$data = $model->recuperarServiciosSRI($id);
        $this->titleWindows = Yii::t('GENERAL', 'Key contingency');
        $this->render('ccontingencia', array(
            'model' => $model,
            //'data' => base64_encode(CJavaScript::jsonEncode($data)),
        ));
    }


    
}
