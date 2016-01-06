<?php

namespace EquipTests;

use Auryn\Injector;
use PHPUnit_Framework_TestCase as TestCase;
use Equip\Configuration\SessionConfiguration;
use Equip\NativeSession;
use Equip\SessionInterface;

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
