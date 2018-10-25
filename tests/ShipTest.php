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

        $ship = Ship::fromStringAndContainerCapacityAndPosition($name, 10, 'unterwegs');

        $this->assertEquals($name, $ship->name());
    }

    /**
     * @dataProvider empty_name_provider
     */
    public function test_name_cannot_be_empty(string $name): void
    {
        $this->expectException(InvalidNameException::class);

        Ship::fromStringAndContainerCapacityAndPosition($name, 10, 'unterwegs');
    }

    public function test_has_a_position(): void
    {
        $name = 'U.S.S. Sinus';
        $capacity = 10;
        $position = 'unterwegs';

        $ship = Ship::fromStringAndContainerCapacityAndPosition($name, $capacity, $position);

        $this->assertEquals($position, $ship->position());
    }

    public function test_has_a_container_capacity(): void
    {
        $capacity = 10;

        $ship = Ship::fromStringAndContainerCapacityAndPosition('USS Sinus', $capacity, 'unterwegs');

        $this->assertEquals($capacity, $ship->containerCapacity());
    }

    public function test_container_capacity_cannot_be_negative(): void
    {
        $this->expectException(InvalidCapacityException::class);

        Ship::fromStringAndContainerCapacityAndPosition('USS SINUS', -10, 'unterwegs');
    }

    public function empty_name_provider(): array
    {
        return [
            [''],
            [' '],
        ];
    }

}
