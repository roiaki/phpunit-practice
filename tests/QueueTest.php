<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{

    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue;
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {
        $this->queue->push('green');

        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        $this->queue->push('green');
        $item = $this->queue->pop();

        $this->assertEquals(0, $this->queue->getCount());
        $this->assertEquals('green', $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        $this->queue->push('first');
        $this->queue->push('second');

        $this->assertEquals('first', $this->queue->pop());
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {

            $this->queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }

    public function testExceptionThrownWhenAddingAnItemToAFullQueue()
    {
        // 1. キューに最大数のアイテムを追加する
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }
        // 2. 例外がスローされることを期待する
        $this->expectException(QueueException::class);

        // 3. 例外メッセージが「Queue is full」であることを期待する
        $this->expectExceptionMessage("Queue is full");
        // 4. 満杯のキューにアイテムを追加しようとする
        $this->queue->push("wafer thin mint");
    }
}