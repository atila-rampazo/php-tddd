<?php

namespace Unit;

use PHPUnit\Framework\TestCase;
use Zensolutions\Item;
use Zensolutions\Order;

class OrderTest extends TestCase
{
    public function testDeveCriarUmPedido()
    {
        $order = new Order("158.115.670-73");
        $this->assertEquals($order->cpf->getValue(), "158.115.670-73");
        $this->assertEquals($order->getTotal(), 0);
    }

    public function testDeveCriarUmPedidoCom3Itens()
    {
        $order = new Order("158.115.670-73");
        $order->addItem(
            new Item(idItem: 1, category: "Instrumentos Musicais", description: "Guitarra", price: 1000),
            quantity: 1
        );
        $order->addItem(
            new Item(idItem: 2, category: "Instrumentos Musicais", description: "Amplificador", price: 5000),
            quantity: 1
        );
        $order->addItem(new Item(idItem: 3, category: "Acessórios", description: "Cabo", price: 30), quantity: 3);


        $total = $order->getTotal();
        $this->assertEquals($total,6090);
    }
}