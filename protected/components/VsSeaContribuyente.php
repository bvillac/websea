<?php
class VsSeaContribuyente extends CActiveRecord {

    public static $dbcont;
    public static $dbname;
    public static $dbserver;

    public function getDbConnection() {
        if (self::$dbcont !== null)
            return self::$dbcont;
        else {
            self::$dbcont = Yii::app()->dbcont; //Yii::app()->getDb("dbvssea");
            if (self::$dbcont instanceof CDbConnection) {
                self::$dbname = self::$dbcont->dbname;
                self::$dbserver = self::$dbcont->dbserver;
                self::$dbcont->setActive(true);
                return self::$dbcont;
            }
            else
                throw new CDbException(Yii::t('yii', 'Active Record requires a "dbcont" CDbConnection application component.'));
        }
    }
    public function tableName() {
        return Yii::app()->dbcont->dbname . "." .get_class($this);
    }
}