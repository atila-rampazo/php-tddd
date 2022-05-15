<?php

namespace Zensolutions;

class OrderItems
{
    public function __construct(public int $idItem, public int $price, public int $quantity)
    {
    }
}