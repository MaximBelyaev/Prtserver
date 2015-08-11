<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Система учета продаж систем учета партнеров',

	// preloading 'log' component
	'preload'=>array('debug', 'log'),
    //language for project
    'sourceLanguage'=>'en',
    'language'=>'ru',
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
    'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
        ),
    ),


	// application components
	'components'=>array(
        'debug' => array(
            'class' => 'ext.yii2-debug.Yii2Debug',
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=prtserver',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => ($_SERVER['HTTP_HOST']=='prtserver.loc')?'':'bo0aszw7fa',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			// 'errorAction'=>'site/error',
		),
		'urlManager'=>array(
			'showScriptName' => false,
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'api/check/<checkString:\w+>'=>'api/check',
				'api/activate/<licenseString:\w+>'=>'api/activate',
				'api/<action:\w+>/<license:\w+>'=>'api/<action>',
			),
		),
		'log'=>array(
			'class'	 => 'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => require(dirname(__FILE__).'/params.php'),
);