<?php

class SeaActiveRecord extends CActiveRecord {

    public static $dbsea;
    public static $dbname;
    public static $dbserver;

    public function getDbConnection() {
        if (self::$dbsea !== null)
            return self::$dbsea;
        else {
            self::$dbsea = Yii::app()->dbsea; //Yii::app()->getDb("dbsea");
            if (self::$dbsea instanceof CDbConnection) {
                self::$dbname = self::$dbsea->dbname;
                self::$dbserver = self::$dbsea->dbserver;
                self::$dbsea->setActive(true);
                return self::$dbsea;
            }
            else
                throw new CDbException(Yii::t('yii', 'Active Record requires a "dbsea" CDbConnection application component.'));
        }
    }
    public function tableName() {
        return Yii::app()->dbsea->dbname . "." .get_class($this);
    }
}