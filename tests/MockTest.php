<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        // $mailer = new Mailer;
        // $result = $mailer->sendMessage('sample@test.com', 'Hello');
        // var_dump($result);

        // Use Mockery
        $mock = $this->createMock(Mailer::class);
        // モックオブジェクト $mock に対して、sendMessage メソッドが呼ばれた際に true を返すように設定しています。
        //つまり、sendMessage が呼ばれると、常に true を返す動作をするようにモック
        $mock->method('sendMessage')->willReturn(true);

        $result = $mock->sendMessage('dave@example.com', 'Hello');
        var_dump($result);

        $this->assertTrue($result);
    }
}