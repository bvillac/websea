<?php

Yii::import("ext.EAjaxUpload.qqFileUploader");

class EAjaxUploadAction extends CAction
{

        public function run()
        {
                // list of valid extensions, ex. array("jpeg", "xml", "bmp")
                $extfd =Yii::app()->params['seaFirext'];//extension de firma electronica
                $allowedExtensions = array($extfd, "pdf");
                // max file size in bytes
                $sizeLimit = 10 * 1024 * 1024;
                //$folder = getcwd()."/file/uploads/"; 
                $folder =Yii::app()->params['seaFirma'];
                $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
                //$result = $uploader/file/uploads/->handleUpload('upload/');
                //$result = $uploader->handleUpload('/opt/uploads/');
                $result = $uploader->handleUpload($folder);
                // to pass data through iframe you will need to encode all html tags
                $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
                echo $result;
        }
}
