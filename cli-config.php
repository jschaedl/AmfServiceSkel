<?php
require_once 'vendor/autoload.php';

use \Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

$databaseConfig = array(
	'driver' => 'pdo_mysql', 
	'user' => 'foo',
	'password' => 'foo', 
	'dbname' => 'foo'
);

$entityManagerConfig = Setup::createAnnotationMetadataConfiguration(
	array('src/Model'), 
	true
);

$entityManager = EntityManager::create(
	$databaseConfig, 
	$entityManagerConfig
);

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);