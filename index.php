<?php

require_once (dirname(__FILE__)) . '/vendor/autoload.php';


$servicePath = dirname(__FILE__) . '/src/Service/UserService.php';
$serviceClassFindInfo = new Amfphp_Core_Common_ClassFindInfo($servicePath, "UserService");

$config = new Amfphp_Core_Config();
$config->pluginsConfig['AmfphpCustomClassConverter'] = array('customClassFolderPaths' => array(dirname(__FILE__) . '/src/Model'));
$config->serviceNames2ClassFindInfo["UserService"] = $serviceClassFindInfo;

$gateway = Amfphp_Core_HttpRequestGatewayFactory::createGateway($config);
$gateway->service();
$gateway->output();
