<?php
declare(strict_types=1);


namespace example\Value;


use example\Exception\InvalidNameException;

final class Ship
{
    /** @var string */
    private $name;

    private function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function fromString(string $name): self
    {
        self::ensureNameIsNotEmpty($name);

        return new self($name);
    }

    public function name(): string
    {
        return $this->name;
    }
    private static function ensureNameIsNotEmpty(string $name): void
    {
        if (empty(\trim($name))) {
            throw new InvalidNameException('Name of port must not be empty');
        }
    }
}
