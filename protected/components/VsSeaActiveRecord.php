<?php
class VsSeaActiveRecord extends CActiveRecord {

    public static $dbvssea;
    public static $dbname;
    public static $dbserver;

    public function getDbConnection() {
        if (self::$dbvssea !== null)
            return self::$dbvssea;
        else {
            self::$dbvssea = Yii::app()->dbvssea; //Yii::app()->getDb("dbvssea");
            if (self::$dbvssea instanceof CDbConnection) {
                self::$dbname = self::$dbvssea->dbname;
                self::$dbserver = self::$dbvssea->dbserver;
                self::$dbvssea->setActive(true);
                return self::$dbvssea;
            }
            else
                throw new CDbException(Yii::t('yii', 'Active Record requires a "dbvssea" CDbConnection application component.'));
        }
    }
    public function tableName() {
        return Yii::app()->dbvssea->dbname . "." .get_class($this);
    }
}