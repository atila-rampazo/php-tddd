<?php

namespace Zensolutions;

class Order
{
    public Cpf $cpf;
    /**
     * @var array OrderItems
     */
    private array $orderItems;

    public function __construct(string $cpf)
    {
        $this->cpf = new Cpf($cpf);
        $this->orderItems = [];
    }

    public function addItem(Item $item, int $quantity)
    {
        $this->orderItems[] = new OrderItems($item->idItem, $item->price, $quantity);
    }

    public function getTotal()
    {
        return array_reduce($this->orderItems, function ($total, OrderItems $item) {
            $total += $item->price * $item->quantity;
            return $total;
        });
    }
}