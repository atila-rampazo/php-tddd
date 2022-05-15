<?php

namespace Unit\domains\Product\Entity;

use PHPUnit\Framework\TestCase;
use Zensolutions\Domains\Product\Entity\Product;
use Zensolutions\Domains\Product\Entity\ProductInputDTO;

class ProductTest extends TestCase
{
    public function testDeveCriarUmProduto()
    {
        $productDto = new ProductInputDTO(name: 'Monitor LG', price: 1500);
        $product = new Product();
        $productCreated = $product->create($productDto);
        $this->assertNotEmpty($productCreated->sku);
        $this->assertEquals('Monitor LG', $productCreated->name);
        $this->assertEquals('R$ 1.500,00',$productCreated->priceFormatted);
    }


}
