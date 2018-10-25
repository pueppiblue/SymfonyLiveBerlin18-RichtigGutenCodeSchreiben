<?php
declare(strict_types=1);


namespace example\Test;


use example\Value\Fleet;
use example\Value\Port;
use example\Value\Ship;
use PHPUnit\Framework\TestCase;

class FleetTest extends TestCase
{
    public function test_add_ships_to_fleet(): void
    {
        $ship1 = Ship::fromStringAndContainerCapacityAndPositionAndPort(
            'USS SINUS',
            10,
            'home',
            Port::fromString('Westhafen')
        );

        $ship2 = Ship::fromStringAndContainerCapacityAndPositionAndPort(
            'USS COSINUS',
            5,
            'home',
            Port::fromString('Westhafen')
        );

        $fleet = new Fleet($ship1, $ship2);

        $this->assertCount(2, $fleet->getIterator());
        }
}
