<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $modulo = array();
    public $botones = array();
    public $rutaControlador = 0;
    public $menu = array();
    public $titleWindows = "";

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function isSession() {
        if (!Yii::app()->getSession()->get('isuser', FALSE)) {
            Yii::app()->getSession()->destroy();
            $this->redirect(Yii::app()->homeUrl . "site/login");
        }
    }
    
    public function menuModulos() {
        $model = new VSacceso();
        // se debe cargar la plantilla haciendo un Partial. 
        //$res = $model->recuperaModulos($this->id_modulo, Yii::app()->controller->route);
        //return $this->renderPartial("//layouts/menu", array('res' => $res, 'id_modulo' => $this->id_modulo, 'rutaControl' => Yii::app()->controller->route), true, false);
        return $model->menuModulosFrm();
        
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else {
                $this->layout = "//layouts/error";
                $error = new ERROR(404, "", "");
                $this->renderText($error->getMessageByError());
            }
        }
    }

    public function errorControl($e) {
        switch ($e->getCode()) {
            case 42000:
                throw new CHttpException($e->getCode(), Yii::t('EXCEPTION', 'Invalid request. Please do not repeatt this request again.'));
                break;
            case 400:
                throw new CHttpException($e->getCode(), Yii::t('EXCEPTION', 'Invalid request. Please do not repeatt this request again.'));
                break;
            case 401:
                throw new CHttpException($e->getCode(), Yii::t('EXCEPTION', 'You must be authorized to view this page.'));
                break;
            case 404:
                throw new CHttpException($e->getCode(), Yii::t('EXCEPTION', 'The requested URL //http:ruta was not found.'));
                break;
            case 500:
                throw new CHttpException($e->getCode(), Yii::t('EXCEPTION', 'The server encountered an error processing your request.'));
                break;
            case 501:
                throw new CHttpException($e->getCode(), Yii::t('EXCEPTION', 'The requested method is not implemented.'));
                break;
            case 0:
                throw new CHttpException($e->getCode(), Yii::t('EXCEPTION', 'Invalid request. Please do not repeatt this request again.'));
                break;
            default:
                throw new CHttpException($e->getCode(), $e->getMessage());
                //throw new CHttpException($e->getCode(), Yii::t('CREDENCIAL_ADMIN', 'No data, Please try again.'));
                break;
        }
    }

}
