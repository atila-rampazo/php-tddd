<?php
declare(strict_types=1);

namespace Unit\Core\Orders;

use PHPUnit\Framework\TestCase;
use Core\Orders\Customer;

class CustomerTest extends TestCase
{
    public function testAttributes()
    {
        $customer = new Customer(name: 'Atila Rampazo');
        $this->assertEquals('Atila Rampazo',$customer->getName());
        $customer->changeName(name: 'new Name');
        $this->assertEquals('new Name',$customer->getName());

    }
}