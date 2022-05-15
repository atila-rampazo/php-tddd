<?php

namespace Core\Orders;

class Cart
{
    const QTD_DEFAULT = 1;
    /**
     * @var Product[]
     */
    private array $items = [];

    public function addProduct(Product $product): void
    {

        $qtd = isset($this->items[$product->getId()]) ? $this->items[$product->getId()]['qtd'] + 1 : self::QTD_DEFAULT;

        $this->items[$product->getId()] = [
            'qtd' => $qtd,
            'product' => $product
        ];
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function total(): float
    {
       $total = 0;
       foreach ($this->items as $item){
           $product = $item['product'];

           $total += $product->getPrice() * $item['qtd'];
       }
       return $total;
    }
}
