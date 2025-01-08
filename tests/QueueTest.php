<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected static $queue;

    // 各テストメソッドの実行後に毎回呼び出される。
    // 1つのテストメソッドごとにリソースのクリーンアップを行う。
    protected function setUp(): void
    {
        static::$queue->clear();
    }

    // 各テストメソッドの実行後に毎回呼び出される。
    // 1つのテストメソッドごとにリソースのクリーンアップを行う。
    protected function tearDown(): void
    {
        // unset($this->queue);
    }

    // テストクラス全体が実行される前に1度だけ呼び出される。
    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue;
    }

    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, static::$queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {
        static::$queue->push('red');
        $this->assertEquals(1, static::$queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        static::$queue->push('red');
        $item = static::$queue->pop();
        $this->assertEquals(0, static::$queue->getCount());
        $this->assertEquals('red', $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        static::$queue->push('first');
        static::$queue->push('second');

        $this->assertEquals('first', static::$queue->pop());
    }
}