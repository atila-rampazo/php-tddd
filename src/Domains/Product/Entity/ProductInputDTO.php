<?php

namespace Zensolutions\Domains\Product\Entity;

class ProductInputDTO
{
    public string $priceFormatted;
    public function __construct(public string $name, public float $price)
    {
        $this->priceFormatted = "R$ " . number_format($price,2,",",".");
    }

    public function __set(string $name, $value): void
    {
        throw new Exception(
            sprintf(
                'O valor da  "%s" não pode ser alterado.',
                $name
            )
        );
    }
}