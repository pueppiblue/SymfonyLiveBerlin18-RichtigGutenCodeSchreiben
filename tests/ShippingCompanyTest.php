<?php
declare(strict_types=1);


namespace example\Test;


use example\Value\Port;
use example\Value\Ship;
use example\Value\ShippingCompany;
use example\Exception\InvalidNameException;
use PHPUnit\Framework\TestCase;

final class ShippingCompanyTest extends TestCase
{

    public function test_has_a_name(): void
    {
        $name = 'U.S.S. Sinus';

        $shippingCompany = ShippingCompany::fromString(
            $name
        );

        $this->assertEquals($name, $shippingCompany->name());
    }

    /**
     * @dataProvider empty_name_provider
     */
    public function test_name_cannot_be_empty(string $name): void
    {
        $this->expectException(InvalidNameException::class);

        ShippingCompany::fromString(
            $name
        );
    }

    public function test_can_have_several_ships()
    {
        $company = ShippingCompany::fromString('Hanse Trade');

        $this->assertCount(0, $company->ships());

        $ship1 = Ship::fromStringAndContainerCapacityAndPositionAndPort(
            'USS SINUS',
            10,
            'home',
            Port::fromString('Westhafen')
        );
        $company->addShip($ship1);

        $this->assertCount(1, $company->ships());

        $ship2 = Ship::fromStringAndContainerCapacityAndPositionAndPort(
            'USS COSINUS',
            5,
            'home',
            Port::fromString('Westhafen')
        );
        $company->addShip($ship2);

        $this->assertCount(2, $company->ships());
    }

    public function empty_name_provider(): array
    {
        return [
            [''],
            [' '],
        ];
    }
}
