<?php

namespace Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

abstract class AbstractService 
{
	protected $entityManager;
	
	public function __construct(EntityManager $entityManager) {
		if ($entityManager == null) {
			$this->entityManager = EntityManager::create(
				$this->getDatabaseConfig(),
				$this->getEntityManagerConfig()
			);
		} else {
			$this->entityManager = $entityManager;
		}
	}
	
	protected function getDatabaseConfig() {
		return array(
			'driver' => 'pdo_mysql',
			'user' => 'foo',
			'password' => 'foo',
			'dbname' => 'foo'
		);
	}
	
	protected function getEntityManagerConfig() {
		return Setup::createAnnotationMetadataConfiguration(
			array('src/Model'),
			true
		);	
	}
}