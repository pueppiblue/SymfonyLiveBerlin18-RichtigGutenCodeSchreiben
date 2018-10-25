<?php
declare(strict_types=1);


namespace example\Test;


use example\Exception\InvalidCapacityException;
use example\Exception\InvalidNameException;
use example\Value\Ship;
use PHPUnit\Framework\TestCase;

final class ShipTest extends TestCase
{

    public function test_has_a_name(): void
    {
        $name = 'U.S.S. Sinus';

        $ship = Ship::fromString($name);

        $this->assertEquals($name, $ship->name());
    }

    /**
     * @dataProvider empty_name_provider
     */
    public function test_name_cannot_be_empty(string $name): void
    {
        $this->expectException(InvalidNameException::class);

        Ship::fromString($name);
    }

    public function test_has_a_container_capacity():void
    {
        $capacity = 10;

        $ship = Ship::fromStringAndContainerCapacity('U.S.S. Sinus', $capacity);

        $this->assertEquals($capacity, $ship->containerCapacity());
    }

    public function test_container_capacity_cannot_be_negative():void
    {
        $this->expectException(InvalidCapacityException::class);

        Ship::fromStringAndContainerCapacity('USS', -10);
    }

    public function empty_name_provider(): array
    {
        return [
            [''],
            [' ']
        ];
    }

}
