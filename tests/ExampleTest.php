<?php

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class ExampleTest extends MockeryTestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }
}

