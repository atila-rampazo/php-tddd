<?php

declare(strict_types=1);

namespace Unit\Core\Orders;

use Core\Orders\Product;
use Mockery;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testAttributes()
    {
        $product = new Product(id: '1', name: "produto", price: 10, quantity: 12);
        $this->assertEquals('produto', $product->getName());
        $this->assertEquals(10, $product->getPrice());
        $this->assertEquals('1', $product->getId());
    }

    public function testSholdCalculateValueProduct()
    {
        $product = new Product(id: '1', name: "produto", price: 10, quantity: 12);
        $this->assertEquals(120, $product->total());
    }

    public function testSholdCalculateTax()
    {
        $product = new Product(id: '1', name: "produto", price: 100, quantity: 2);
        $this->assertEquals(220, $product->totalWithPorcentage10());
    }

    public function testExampleMock()
    {
        $mockProduct = Mockery::mock(Product::class, ['1', "produto", 10, 12]);
        $mockProduct->shouldReceive('getName')
            ->andReturn('produto');
        $mockProduct->shouldReceive('getPrice')
            ->andReturn(10);
        $mockProduct->shouldReceive('getId')
            ->andReturn('1');

        $this->assertEquals('produto', $mockProduct->getName());
        $this->assertEquals(10, $mockProduct->getPrice());
        $this->assertEquals('1', $mockProduct->getId());
    }
}