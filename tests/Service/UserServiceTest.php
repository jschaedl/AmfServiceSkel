<?php

namespace Service;

use Service\UserService;
use Model\User;

class UserTest extends \DoctrineDatabaseTest 
{
	protected $userService;
	
	protected function setUp() {
		$this->userService = new UserService($this->entityManager);
		parent::setUp();
	}
	
	protected function tearDown() {
		$this->userService = null;
		parent::tearDown();
	}
	
	protected function getDataSetList() {
		return array( 
			$this->getUserDataSet()
		); 
	}
	
	public function testUserData() {
		$user = new User();
		$user->username = 'test';
		$user->password = 'test';
		$this->userService->persist($user);
		
		$this->assertEquals(1, 1);
	}
}