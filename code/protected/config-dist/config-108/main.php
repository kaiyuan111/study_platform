<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..',
    'name'=>'问卷调查',
    'defaultController'=>'site',

    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.modules.main.models.*',
        'application.modules.main.models.user.*',
    ),

    'modules'=>array(
        // uncomment the following to enable the Gii tool
        /*
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'Enter Your Password Here',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
        ),
         */
		'main',
        ),

        // application components
        'components'=>array(
            'user'=>array(
                // enable cookie-based authentication
                'allowAutoLogin'=>true,
            ),
            // uncomment the following to enable URLs in path-format
            'urlManager'=>array(
                'urlFormat'=>'path',
                'rules'=>array(
                    //'<controller:\w+>/<id:\d+>'=>'<controller>/view',
                    'questionnaire/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                ),
            ),
            // 'db'=>array(
                // 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
            // ),
            // uncomment the following to use a MySQL database
            'db'=>array(
                'connectionString' => 'mysql:dbname=study_platform;host=127.0.0.1',
                'emulatePrepare' => true,
                'username' => 'root',
                'password' => 'IRs8Tz0LI',
                'charset' => 'utf8',
            ),
            /*
            'cache' => array(
                'class' => 'application.extensions.CRedisCache',
                'servers'=>array(
                    array(
                        'host'=>'10.16.15.63',
                        'port'=>'6379',
                    ),
                ),
                'keyPrefix' => '',
            ),
             */
            'errorHandler'=>array(
                // use 'site/error' action to display errors
                'errorAction'=>'site/error',
            ),
            // 'log'=>array(
                // 'class'=>'CLogRouter',
                // 'routes'=>array(
                    // array(
                        // 'class'=>'CFileLogRoute',
                        // 'levels'=>'error, warning',
                    // ),
                    // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                 */
                // ),
            // ),
        ),

        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        'params'=>array(
            // this is used in contact page
            'img_upload_path'=>'/home/img1/',
            'group_member_maxnum'=>12,
            'rid' =>array(
                'teacher'=>2,
                'student'=>3,
                'admin'=>4,
            ),
        ),
    );
