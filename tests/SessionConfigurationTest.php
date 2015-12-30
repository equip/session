<?php

namespace SparkTests;

use Auryn\Injector;
use PHPUnit_Framework_TestCase as TestCase;
use Spark\Configuration\SessionConfiguration;
use Spark\NativeSession;
use Spark\SessionInterface;

class SessionConfigurationTest extends TestCase
{
    public function setUp()
    {
        $this->config = new SessionConfiguration;
    }

    public function testApply()
    {
        $injector = new Injector;
        $config = new SessionConfiguration;

        $config->apply($injector);

        $session = $injector->make(SessionInterface::class);

        $this->assertInstanceOf(NativeSession::class, $session);
    }
}
