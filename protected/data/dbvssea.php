<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
// Se crean los archivos de conexiones a base de datos estos archivos se deben adjuntar al main.conf
// @author Byron Villacreses
//
return array(
    'dbvssea' => array(
        'class' => 'CDbConnection',
        'connectionString' => 'mysql:host=localhost;dbname=VSSEA',
        'emulatePrepare' => true,
        'username' => 'root',
        'password' => 'root00',
        'charset' => 'utf8',
        //'dbname' => "VSSEA",
        //'dbserver' => "localhost",
        ));
