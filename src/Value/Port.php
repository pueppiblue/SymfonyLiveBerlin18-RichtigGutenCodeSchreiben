<?php declare(strict_types=1);
/*
 * This is example code that is not production-ready. It is intended for studying and learning purposes.
 *
 * (c) 2018 thePHP.cc. All rights reserved.
 */

namespace example\Value;

use example\Exception\InvalidNameException;

final class Port implements Position
{
    /**
     * @var string
     */
    private $name;

    private function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function fromString(string $name)
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
