<?php

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class OrderTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }
        
    public function testOrderIsProcessed()
    {
        /** @var PaymentGateway $mockGateway */
        $mockGateway = Mockery::mock(PaymentGateway::class);
        $mockGateway->shouldReceive('charge')
                ->once()
                ->with(200)
                ->andReturn(true);

        $order = new Order($mockGateway);
        $order->amount = 200;

        $this->assertTrue($order->process());
    }
    
    public function testOrderIsProcessedUsingMockery()
    {
        /** @var PaymentGateway $gateway */
        $gateway = Mockery::mock('PaymentGateway');

        $gateway->shouldReceive('charge')
                ->once()       
                ->with(200)
                ->andReturn(true);                                 
        
        $order = new Order($gateway);

        $order->amount = 200;

        $this->assertTrue($order->process());        
    }    
}




