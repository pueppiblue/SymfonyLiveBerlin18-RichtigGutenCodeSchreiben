<?php
declare(strict_types=1);


namespace example\Test;


use example\Exception\InvalidCapacityException;
use example\Exception\InvalidNameException;
use example\Value\Port;
use example\Value\Ship;
use PHPUnit\Framework\TestCase;

final class ShipTest extends TestCase
{

    public function test_has_a_name(): void
    {
        $name = 'U.S.S. Sinus';

        $ship = Ship::fromStringAndContainerCapacityAndPositionAndPort($name, 10, 'unterwegs', Port::fromString('Westhafen'));

        $this->assertEquals($name, $ship->name());
    }

    /**
     * @dataProvider empty_name_provider
     */
    public function test_name_cannot_be_empty(string $name): void
    {
        $this->expectException(InvalidNameException::class);

        Ship::fromStringAndContainerCapacityAndPositionAndPort($name, 10, 'unterwegs', Port::fromString('Westhafen'));
    }

    public function test_has_a_target_port(): void
    {
        $name = 'U.S.S. Sinus';
        $capacity = 10;
        $position = 'unterwegs';
        $targetPort =  Port::fromString('Westhafen');

        $ship = Ship::fromStringAndContainerCapacityAndPositionAndPort($name, $capacity, $position, $targetPort);

        $this->assertEquals($targetPort , $ship->targetPort());
    }


    public function test_has_a_position(): void
    {
        $name = 'U.S.S. Sinus';
        $capacity = 10;
        $position = 'unterwegs';

        $ship = Ship::fromStringAndContainerCapacityAndPositionAndPort($name, $capacity, $position, Port::fromString('Westhafen'));

        $this->assertEquals($position, $ship->position());
    }

    public function test_has_a_container_capacity(): void
    {
        $capacity = 10;

        $ship = Ship::fromStringAndContainerCapacityAndPositionAndPort('USS Sinus', $capacity, 'unterwegs', Port::fromString('Westhafen'));

        $this->assertEquals($capacity, $ship->containerCapacity());
    }

    public function test_container_capacity_cannot_be_negative(): void
    {
        $this->expectException(InvalidCapacityException::class);

        Ship::fromStringAndContainerCapacityAndPositionAndPort('USS SINUS', -10, 'unterwegs', Port::fromString('Westhafen'));
    }

    public function empty_name_provider(): array
    {
        return [
            [''],
            [' '],
        ];
    }


}
