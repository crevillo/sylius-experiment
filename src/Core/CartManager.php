<?php

namespace Acme\Core;

use Acme\Model\OrderItem;
use Acme\Model\Product;
use Sylius\Component\Order\Model\Order;
use Sylius\Component\Order\Model\OrderItemUnit;

class CartManager
{
    public function getCurrentOrder(): Order
    {
        if (!isset($_SESSION['currentOrder'])) {
            $order = new Order();
            $_SESSION['currentOrder'] = $order;
        }

        return $_SESSION['currentOrder'];
    }

    public function setCurrentOrder(Order $order)
    {
        $_SESSION['currentOrder'] = $order;
    }

    public function addItem(Product $product)
    {
        $order = $this->getCurrentOrder();
        if ($orderItem = $this->getItemByCode($product->getCode())) {
            $this->updateItemQuantityByCode(
                $product->getCode(),
                $orderItem->getQuantity() + 1
            );
        } else {
            $orderItem = new OrderItem($product, $product->getPrice(), 1);
            $order->addItem($orderItem);
            $this->setCurrentOrder($order);
        }
    }

    /**
     * @param $code
     * @return OrderItem|null
     */
    public function getItemByCode($code):? OrderItem
    {
        $order = $this->getCurrentOrder();

        $items = $order->getItems();

        foreach ($items as $key => $item) {
            if ($item->getProduct()->getCode() === $code) {
                return $item;
            }
        }

        return null;
    }

    /**
     * Eliminar un item del carrito por el códiigo de producto
     *
     * @param $code
     */
    public function removeItemByCode($code)
    {
        $order = $this->getCurrentOrder();

        $item = $this->getItemByCode($code);
        if (!is_null($item)) {
            $order->removeItem($item);
        }

        $this->setCurrentOrder($order);
    }

    public function updateItemQuantityByCode($code, $units)
    {
        $order = $this->getCurrentOrder();
        $item = $this->getItemByCode($code);
        $newItem = new OrderItem(
            $item->getProduct(),
            $item->getUnitPrice()
        );

        if ($order->hasItem($item)) {
            $order->removeItem($item);
            for ($quantity = 0; $quantity < $units; $quantity++) {
                new OrderItemUnit($newItem);
            }
            $order->addItem($newItem);
        }

        $this->setCurrentOrder($order);
    }

}
