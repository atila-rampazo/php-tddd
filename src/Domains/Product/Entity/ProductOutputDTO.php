<?php

namespace Zensolutions\Domains\Product\Entity;

class ProductOutputDTO
{
    public function __construct(public string $sku,public string $name, public float $price,public string $priceFormatted)
    {

    }
}