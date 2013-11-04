<?php

namespace Service;

use Model\User;
 
class UserService extends AbstractService
 { 	
 	public function persist($entity) {
		$this->entityManager->persist($entity);
		$this->entityManager->flush($entity);
		return $this->find($entity->userId);
	}
 	
 	public function find($id) {
		return $this->entityManager->find('Model\User', $id);
	}
 	
 	public function remove($id) {
 		$entity = $this->entityManager->find('Model\User', $id);
 		$this->entityManager->remove($entity);
 		$this->entityManager->flush($entity);
 	}
 }