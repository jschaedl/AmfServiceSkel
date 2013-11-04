<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

abstract class DoctrineDatabaseTest extends AbstractDatabaseTest
{
	protected $entityManager;
	
	public function __construct() {
		$this->entityManager = EntityManager::create(
			$this->getDatabaseConfig(),
			$this->getEntityManagerConfig()
		);
	}
	
	protected function getDatabaseConfig() {
		return array(
			'dbname' => 'foo',
    		'user' => 'foo',
    		'password' => 'foo',
    		'host' => '127.0.0.1',
    		'driver' => 'pdo_mysql',
		);
	}
	
	protected function getEntityManagerConfig() {
		return Setup::createAnnotationMetadataConfiguration(
			array('src/Model'),
			true
		);
	}
}