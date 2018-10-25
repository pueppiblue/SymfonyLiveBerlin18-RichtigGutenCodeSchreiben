<?php declare(strict_types=1);
/*
 * This is example code that is not production-ready. It is intended for studying and learning purposes.
 *
 * (c) 2018 thePHP.cc. All rights reserved.
 */
namespace example\Test;

use example\Exception\InvalidNameException;
use example\Value\Port;
use PHPUnit\Framework\TestCase;

/**
 * @covers \example\Value\Port
 */
final class PortTest extends TestCase
{
    public function test_has_a_name(): void
    {
        $name = 'Westhafen';

        $port = Port::fromString($name);

        $this->assertEquals($name, $port->name());
    }

    /**
     * @dataProvider empty_name_provider
     */
    public function test_name_cannot_be_empty(string $name): void
    {
        $this->expectException(InvalidNameException::class);

        Port::fromString($name);
    }

    public function empty_name_provider(): array
    {
        return [
            [''],
            [' ']
        ];
    }
}
