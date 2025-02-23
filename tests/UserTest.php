<?php

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryTestCase;
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

        /** @var Mailer $mock_mailer */
        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer->expects($this->once())
                    ->method('sendMessage')
                    ->with($this->equalTo('sample3@test.com'), $this->equalTo('Hello'))
                    ->willReturn(true);

        $user->setMailer($mock_mailer);
        $user->email = 'sample3@test.com';
        $this->assertTrue($user->notify("Hello"));
        var_dump("test");
    }
    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User;

        /** @var Mailer $mock_mailer */
        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer->method('sendMessage')
                    ->will($this->throwException(new Exception));

        // $mock_mailer->expects($this->never())
        //             ->method('sendMessage');

        $user->setMailer($mock_mailer);

        $this->expectException(Exception::class);

        $this->assertFalse($user->notify("Hello"));
    }
}