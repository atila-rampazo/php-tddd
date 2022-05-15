<?php

declare(strict_types=1);

namespace Unit\Core\Orders;

use Core\Orders\Product;
use Mockery;
use PHPUnit\Framework\TestCase;
use Core\Orders\Cart;

class CartTest extends TestCase
{
    public function testAddProductCart()
    {
        $cart = new Cart();
        $product1 = Mockery::mock(Product::class, ['1', "produto", 12, 1]);
        $product1->shouldReceive('getName')
            ->andReturn('produto');
        $product1->shouldReceive('getPrice')
            ->andReturn(12);
        $product1->shouldReceive('getId')
            ->andReturn('1');

        $product2 = Mockery::mock(Product::class, ['2', "produto", 20, 1]);
        $product2->shouldReceive('getName')
            ->andReturn('produto');
        $product2->shouldReceive('getPrice')
            ->andReturn(20);
        $product2->shouldReceive('getId')
            ->andReturn('2');
        $cart->addProduct(product: $product1);
        $cart->addProduct(product: $product2);
        $this->assertCount(2, $cart->getItems());
        $this->assertEquals(32, $cart->total());
    }

    public function testAddProductCartTotal()
    {
        $product1 = new Product(id: '1', name: 'product', price: 12, quantity: 1);
        $cart = new Cart();
        $cart->addProduct(product: $product1);
        $cart->addProduct(product: $product1);
        $cart->addProduct(product: new Product(id: '2', name: 'product', price: 20, quantity: 1));
        $this->assertCount(2, $cart->getItems());
        $this->assertEquals(44, $cart->total());
    }

    public function testCartEmpty(){
        $cart = new Cart();
        $this->assertCount(0, $cart->getItems());
        $this->assertEquals(0, $cart->total());
    }
}