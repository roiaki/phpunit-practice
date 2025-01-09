<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        // $mailer = new Mailer;
        // $result = $mailer->sendMessage('sample@test.com', 'Hello');
        // var_dump($result);

        $mock = $this->createMock(Mailer::class);
        $mock->method('sendMessage')->willReturn(true);

        $result = $mock->sendMessage('dave@example.com', 'Hello');
        var_dump($result);

        $this->assertTrue($result);
    }
}