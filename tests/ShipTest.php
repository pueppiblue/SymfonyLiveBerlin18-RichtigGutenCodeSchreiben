<?php
declare(strict_types=1);


namespace example\Test;


use example\Value\Port;
use example\Value\Ship;
use example\Exception\InvalidCapacityException;
use example\Exception\InvalidNameException;
use PHPUnit\Framework\TestCase;

final class ShipTest extends TestCase
{
    private const NAME = 'U.S.S. Sinus';
    private const CAPACITY = 10;
    private const POSITION = 'unterwegs';
    private const PORT_NAME = 'Westhafen';

    public function test_has_a_name(): void
    {

        $name = 'U.S.S. Sinus';

        $ship = Ship::fromStringAndContainerCapacityAndPositionAndPort(
            self::NAME,
            self::CAPACITY,
            self::POSITION,
            Port::fromString(self::PORT_NAME)
        );

        $this->assertEquals(self::NAME, $ship->name());
    }

    /**
     * @dataProvider empty_name_provider
     */
    public function test_name_cannot_be_empty(string $name): void
    {
        $this->expectException(InvalidNameException::class);

        Ship::fromStringAndContainerCapacityAndPositionAndPort(
            $name,
            self::CAPACITY,
            self::POSITION,
            Port::fromString(self::PORT_NAME)
        );
    }

    public function test_has_a_target_port(): void
    {
        $targetPort = Port::fromString('Westhafen OST');

        $ship = Ship::fromStringAndContainerCapacityAndPositionAndPort(
            self::NAME,
            self::CAPACITY,
            self::POSITION,
            $targetPort
        );
        $this->assertEquals($targetPort, $ship->targetPort());
    }


    public function test_has_a_position(): void
    {
        $position = 'home';
        $ship = Ship::fromStringAndContainerCapacityAndPositionAndPort(
            self::NAME,
            self::CAPACITY,
            $position,
            Port::fromString(self::PORT_NAME)
        );

        $this->assertEquals($position, $ship->position());
    }

    public function test_has_a_container_capacity(): void
    {
        $capacity = 10;

        $ship = Ship::fromStringAndContainerCapacityAndPositionAndPort(
            self::NAME,
            $capacity,
            self::POSITION,
            Port::fromString(self::PORT_NAME)
        );

        $this->assertEquals($capacity, $ship->containerCapacity());
    }

    public function test_container_capacity_cannot_be_negative(): void
    {
        $this->expectException(InvalidCapacityException::class);

        Ship::fromStringAndContainerCapacityAndPositionAndPort(
            self::NAME,
            -10,
            self::POSITION,
            Port::fromString(self::PORT_NAME)
        );
    }

    public function empty_name_provider(): array
    {
        return [
            [''],
            [' '],
        ];
    }


}
