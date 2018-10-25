<?php
declare(strict_types=1);

namespace example\Test;

use example\Value\Container;
use example\Value\ContainerId;
use example\Value\Port;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    public function test_has_container_id(): void
    {
        $targetPort = Port::fromString('Westhafen');
        $id = ContainerId::fromString('CSQU3054383');

        $container = Container::fromContainerIdAndPort($id, $targetPort);

        $this->assertEquals($container->id()->toString(), $id->toString());
    }

    public function test_container_port(): void
    {
        $targetPort = Port::fromString('Westhafen');
        $id = ContainerId::fromString('CSQU3054383');

        $container = Container::fromContainerIdAndPort($id, $targetPort);

        $this->assertEquals($container->targetPort()->name(), $targetPort->name());
    }

}
