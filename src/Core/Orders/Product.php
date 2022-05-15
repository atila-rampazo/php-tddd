<?php

namespace Core\Orders;

class Product
{
    public function __construct(
        protected string $id,
        protected string $name,
        protected float $price,
        protected int $quantity
    ) {
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function total(): float
    {
        return $this->price * $this->quantity;
    }

    public function totalWithPorcentage10(): float
    {
        $total = $this->price * $this->quantity;
        return (($total) * 0.1) + $total;
    }
}