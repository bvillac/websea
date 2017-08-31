<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
// Se crean los archivos de conexiones a base de datos estos archivos se deben adjuntar al main.conf
// @author Eduardo Cueva
//
return array(
    'dbsea' => array(
        'class' => 'CDbConnection',
        'connectionString' => 'mysql:host=localhost;dbname=appweb_2014',
        'emulatePrepare' => true,
        'username' => 'root',
        'password' => 'root00',
        'charset' => 'utf8',
        'dbname' => "appweb_2014",
        'dbserver' => "localhost",
        ));
