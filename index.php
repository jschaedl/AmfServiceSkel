<?php

require_once (dirname(__FILE__)) . '/vendor/autoload.php';


$servicePath = dirname(__FILE__) . '/src/Service/AmfphpDoctrineExampleService.php';
$serviceClassFindInfo = new Amfphp_Core_Common_ClassFindInfo($servicePath, "AmfphpDoctrineExampleService");

$config = new Amfphp_Core_Config();
$config->pluginsConfig['AmfphpCustomClassConverter'] = array('customClassFolderPaths' => array(dirname(__FILE__) . '/src/Service/Vo/'));
$config->serviceNames2ClassFindInfo["AmfphpDoctrineExampleService"] = $serviceClassFindInfo;

$gateway = Amfphp_Core_HttpRequestGatewayFactory::createGateway($config);
$gateway->service();
$gateway->output();
