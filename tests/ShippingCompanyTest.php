<?php
declare(strict_types=1);


namespace example\Test;


use example\Exception\InvalidNameException;
use example\Value\ShippingCompany;
use PHPUnit\Framework\TestCase;

final class ShippingCompanyTest extends TestCase
{

    public function test_has_a_name(): void
    {
        $name = 'U.S.S. Sinus';

        $shippingCompany = ShippingCompany::fromString($name);

        $this->assertEquals($name, $shippingCompany->name());
    }

    /**
     * @dataProvider empty_name_provider
     */
    public function test_name_cannot_be_empty(string $name): void
    {
        $this->expectException(InvalidNameException::class);

        ShippingCompany::fromString($name);
    }


    public function empty_name_provider(): array
    {
        return [
            [''],
            [' '],
        ];
    }

}
