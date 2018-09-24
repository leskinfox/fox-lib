<?php

use Phalcon\Loader;
use Phalcon\Crypt;
use Phalcon\Session\Adapter\Files as Session;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use \Phalcon\Mvc\Dispatcher as PhDispatcher;
error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');



$loader = new Loader();

$loader->registerDirs(
    [
        APP_PATH . '/include/PHPMailer/src/',
        APP_PATH . '/controllers/',
        APP_PATH . '/models/',
    ]
);

$loader->registerFiles(
    [
        APP_PATH . '/include/PHPMailer/src/Exception.php',
        APP_PATH . '/include/PHPMailer/src/PHPMailer.php',
        APP_PATH . '/include/PHPMailer/src/SMTP.php',
    ]
);
$loader->register();

//require_once  '/app/include/PHPMailer/src/Exception.php';
//require_once '/app/include/PHPMailer/src/PHPMailer.php';
//require_once '/app/include/PHPMailer/src/SMTP.php';
$di = new FactoryDefault();

$di->set(
    "crypt",
    function(){
        $crypt = new Crypt();
        $crypt->setKey('sdf24FEk$tdu#dfvmn<');
        return $crypt;
    }
);

$di->set(
    "voltService",
    function ($view, $id) {
        $volt = new Volt($view, $id);
        $volt->setOptions(
            [
                "compiledPath" => APP_PATH . "/compiled-templates/",
                "compiledExtension" => ".compiled",
                'compileAlways' => true
            ]
        );
        return $volt;
    }
);

$di->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . "/views/");
        $view->registerEngines(
            [
                ".volt" => "voltService",
            ]
        );
        return $view;
    }
);

$di->set(
    'url',
    function () {
        $url = new UrlProvider();
        $url->setBaseUri('/');
        return $url;
    }
);

$di->set(
    "db",
    function () {
        return new DbAdapter(
            [
                "host"     => "localhost",
                "username" => "root",
                "password" => "",
                "dbname"   => "books",
                'charset'   =>'utf8',
                'collation' => 'utf8_general_ci',
                'options' => array(
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
)

            ]
        );
    }
);

$di->setShared(
    "session",
    function (){
        $session = new Session();
        $session->start();
        return $session;
    }
);

$application = new Application($di);

try {
    $response = $application->handle();
    $response->send();
} catch (\Exception $e) {
    echo 'Exception: ', $e->getMessage();
}