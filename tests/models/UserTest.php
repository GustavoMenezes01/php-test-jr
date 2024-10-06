<?php

use PHPUnit\Framework\TestCase;
use App\Models\User;

/**
 * This class contains unit tests for the User model.
 */
class UserTest extends TestCase {

    /**
     * Test if a User object is created with the correct name.
     */
    public function testUserCreation() {
        $user = new User('Gustavo Menezes');

        $this->assertEquals('Gustavo Menezes', $user->getName());
    }

    /**
     * Test if the name of the user can be updated and retrieved correctly.
     */
    public function testSetAndGetName() {
        $user = new User('Initial Name');
        $user->setName('New Name');

        $this->assertEquals('New Name', $user->getName());
    }
}
