<?php
class VsSeaIntermedia extends CActiveRecord {

    public static $dbvsseaint;
    public static $dbname;
    public static $dbserver;

    public function getDbConnection() {
        if (self::$dbvsseaint !== null)
            return self::$dbvsseaint;
        else {
            self::$dbvsseaint = Yii::app()->dbvsseaint; //Yii::app()->getDb("dbvssea");
            if (self::$dbvsseaint instanceof CDbConnection) {
                self::$dbname = self::$dbvsseaint->dbname;
                self::$dbserver = self::$dbvsseaint->dbserver;
                self::$dbvsseaint->setActive(true);
                return self::$dbvsseaint;
            }
            else
                throw new CDbException(Yii::t('yii', 'Active Record requires a "dbvsseaint" CDbConnection application component.'));
        }
    }
    public function tableName() {
        return Yii::app()->dbvsseaint->dbname . "." .get_class($this);
    }
}