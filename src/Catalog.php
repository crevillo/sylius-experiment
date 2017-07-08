<?php

namespace Acme;

use Acme\Model\Product;

class Catalog
{
    private $products = [];

    public function __construct(array $products = [])
    {
        foreach($products as $product) {
            $this->products[$product->getCode()] = $product;
        }
    }

    public function getProducts()
    {
        return $this->products;
    }

    static function init()
    {
        $p1 = new Product(
            '0001',
            'Nuestro producto 1',
            'Un producto bien chulo',
            100,
            'product.php'

        );

        $p2 = new Product(
            '0002',
            'Nuestro producto 2',
            'Otro producto bien chulo',
            200,
            'product.php'

        );

        $p3 = new Product(
            '0003',
            'Nuestro producto 3',
            'El tercer producto bien chulo',
            300,
            'product.php'

        );

        return new self([$p1, $p2, $p3]);
    }

    /**
     * @param $code
     * @return Product
     */
    public function getProductByCode(string $code): Product
    {
        return $this->products[$code];
    }
}
