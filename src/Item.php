<?php

namespace Zensolutions;

class Item
{
    public function __construct(
        public string $idItem,
        public string $category,
        public string $description,
        public int $price
    ) {
    }
}