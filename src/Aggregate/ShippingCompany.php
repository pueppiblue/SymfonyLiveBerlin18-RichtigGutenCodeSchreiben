<?php
declare(strict_types=1);


namespace example\Value;


use example\Exception\InvalidNameException;

final class ShippingCompany
{
    /** @var string */
    private $name;

    /** @var Ship[] */
    private $ships;

    private function __construct(string $name)
    {
        $this->name = $name;
        $this->ships = [];
    }

    public static function fromString($name): self
    {
        self::ensureNameIsNotEmpty($name);

        return new self($name);
    }

    private static function ensureNameIsNotEmpty(string $name): void
    {
        if (empty(\trim($name))) {
            throw new InvalidNameException('Name of port must not be empty');
        }
    }

    public function addShip(Ship $ship): void
    {
        if (!\in_array($ship, $this->ships, false)) {
            $this->ships[] = $ship;
        }
    }

    public function name(): string
    {
        return $this->name;
    }

    public function ships(): array
    {
        return $this->ships;
    }
}
