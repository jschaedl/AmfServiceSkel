<?php

abstract class AbstractDatabaseTest extends PHPUnit_Extensions_Database_TestCase
{
	static private $pdo = null;
 	private $dbConnection = null;
 	
 	final public function getConnection()
 	{
 		if ($this->dbConnection === null) {
 			if (self::$pdo == null) {
 				self::$pdo = new PDO( 
 					$GLOBALS['DB_DSN'], 
 					$GLOBALS['DB_USER'], 
 					$GLOBALS['DB_PASSWD'] 
				);
 			}
 			$this->dbConnection = $this->createDefaultDBConnection(
 				self::$pdo, 
 				$GLOBALS['DB_DBNAME']
			);
 		}
 		return $this->dbConnection;
 	}
 	
 	protected function getSetUpOperation() {
 		return new PHPUnit_Extensions_Database_Operation_Replace(); 
 	}
 		
 	protected function getDataSet() {
		return new PHPUnit_Extensions_Database_DataSet_CompositeDataSet(
        	$this->getDataSetList()
        );
	}

	abstract protected function getDataSetList();
 	
 	protected function getUserDataSet() {
 		$csv = new PHPUnit_Extensions_Database_DataSet_CsvDataSet(';', '"', '"');	
 		$csv->addTable('user', dirname(__FILE__) . '/_fixtures/user.csv');
 		return $csv;
 	}
 }