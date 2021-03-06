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
    /** @var string */
    private $position;
    /** @var Port */
    private $targetPort;

    private function __construct(string $name, int $containerCapacity, string $position, Port $targetPort)
    {
        $this->name = $name;
        $this->containerCapacity = $containerCapacity;
        $this->position = $position;
        $this->targetPort = $targetPort;
    }

    public static function fromStringAndContainerCapacityAndPositionAndPort(string $name, int $capacity, string $position, Port $targetPort): self
    {
        self::ensureNameIsNotEmpty($name);
        self::ensureCapacityIsGreaterThanZero($capacity);

        return new self($name, $capacity, $position, $targetPort);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function containerCapacity(): int
    {
        return $this->containerCapacity;
    }

    public function position(): string
    {
        return $this->position;
    }

    public function targetPort(): Port
    {
        return $this->targetPort;
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
