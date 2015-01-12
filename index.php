<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();

/* quebra se o DB não estiver configurado */
Yii::app()->db;

function debug($param, $break = false){
	
	print('<pre>');
	print('<b>File => '.debug_backtrace()[0]['file'].'</b><br />');
	print('<b>Function => '.debug_backtrace()[1]['function'].'</b><br />');
	print('<b>Line => '.debug_backtrace()[0]['line'].'</b><br /><br />');
	print_r($param);
	print('</pre>');

	if ($break) die();
			
}