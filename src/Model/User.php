<?php

namespace Model;

/**
 * @Entity @Table(name="user")
 */
class User
{
	/** @Id @Column(type="integer") @GeneratedValue(strategy="IDENTITY") */
    public $userId;
	
    /** @Column(type="string") */
    public $username;
    
    /** @Column(type="string") */
    public $password;
}
