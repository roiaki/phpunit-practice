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

    public function testNotificationIsSent()
    {
        $user = new User;

        // $user->email = 'sample1@test.com';
        // $user->notify("Hello");

        $mock_mailer = $this->createMock(Mailer::class);
        $mock_mailer->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('sample3@test.com'), $this->equalTo('Hello'))
            ->willReturn(true);

        // $user->setMailer(new Mailer);
        // todo fix error
        $user->setMailer($mock_mailer);
        $user->email = 'sample3@test.com';
        $this->assertTrue($user->notify("Hello"));
    }
}