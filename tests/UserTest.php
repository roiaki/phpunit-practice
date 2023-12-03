<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        // require 'User.php';
        $user = new User;
        $user->first_name = "Teresa";
        $user->surname = "Green";
        $this->assertEquals('Teresa Green', $user->getFullName());
    }

    public function testFullNameIsEmptyByDfault()
    {
        $user = new User;
        $this->assertEquals('', $user->getFullName());    
    }

    public function testuserHasFirstName()
    {
        $user = new User;
        $user->first_name = "Teresa";
        $this->assertEquals('Teresa', $user->first_name);
    }

    /**
     * @test
     */
    public function userHasSurName()
    {
        $user = new User;
        $user->surname = "Green";
        $this->assertEquals('Green', $user->surname);
    }
}