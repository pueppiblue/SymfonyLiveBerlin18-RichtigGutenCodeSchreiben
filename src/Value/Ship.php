<?php
declare(strict_types=1);


namespace example\Value;


use example\Exception\InvalidCapacityException;
use example\Exception\InvalidNameException;

final class Ship
{
    /** @var string */
    private $name;

    /** @var int */
    private $containerCapacity;

    private function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function fromString(string $name): self
    {
        self::ensureNameIsNotEmpty($name);

        return new self($name);
    }

    public static function fromStringAndContainerCapacity(string $name, int $capacity): self
    {
        self::ensureCapacityIsGreaterThanZero($capacity);

        $instance = self::fromString($name);
        $instance->containerCapacity = $capacity;

        return $instance;

    }

    public function name(): string
    {
        return $this->name;
    }

    public function containerCapacity(): int
    {
        return $this->containerCapacity;
    }

    private static function ensureNameIsNotEmpty(string $name): void
    {
        if (empty(\trim($name))) {
            throw new InvalidNameException('Name of port must not be empty');
        }
    }

    private static function ensureCapacityIsGreaterThanZero(int $capacity): void
    {
         if ( $capacity < 0) {
             throw new InvalidCapacityException('Container Capacity of ship must not be negative.');
         }
    }
}
