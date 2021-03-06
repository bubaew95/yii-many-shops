<?php

//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../framework/vendor/autoload.php';
require __DIR__ . '/../framework/vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../framework/common/config/bootstrap.php';
require __DIR__ . '/../framework/backend/config/bootstrap.php';
require __DIR__ . '/../function.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../framework/common/config/main.php',
    require __DIR__ . '/../framework/common/config/main-local.php',
    require __DIR__ . '/../framework/backend/config/main.php',
    require __DIR__ . '/../framework/backend/config/main-local.php'
);

(new yii\web\Application($config))->run();
