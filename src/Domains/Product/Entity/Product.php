<?php

namespace Zensolutions\Domains\Product\Entity;

class Product
{
    protected array $products;
    private string $sku;


    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    public function create(ProductInputDTO $productDTO): ProductOutputDTO
    {
        $sku = uniqid('', true);
        $productDto = new ProductOutputDTO(
            sku: $sku,
            name: $productDTO->name,
            price: $productDTO->price,
            priceFormatted: $productDTO->priceFormatted
        );
        return $productDto;
    }

}