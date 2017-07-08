<?php

namespace Acme\Model;

use Sylius\Component\Order\Model\OrderItem as SyliusOrderItem;
use Sylius\Component\Order\Model\OrderItemUnit;

class OrderItem extends SyliusOrderItem
{
    /** @var Product */
    private $product;

    public function __construct(Product $product, $price, $units = 0)
    {
        parent::__construct();
        $this->product = $product;
        $this->setUnitPrice($price);

        for ($i=0; $i < $units; $i++) {
            $orderItemUnit = new OrderItemUnit($this);
        }

    }

    public function getProduct()
    {
        return $this->product;
    }
}
