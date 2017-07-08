<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/includes/init.php';

use Acme\Catalog;

$catalog = Catalog::init();
$cartManager = new \Acme\Core\CartManager();
/** @var \Sylius\Component\Order\Model\Order $currentOrder */
$currentOrder = $cartManager->getCurrentOrder();

if ($_POST) {
    foreach($_POST as $key => $value) {
        if (strpos($key, 'delete-') === 0) {
            $code = substr($key, 7);
            $cartManager->removeItemByCode($code);
            header("Location: cart.php");
        }
        if (strpos($key, 'refresh-') === 0) {
            $code = substr($key, 8);
            $cartManager->updateItemQuantityByCode($code, $_POST["quantity-$code"]);
            header("Location: cart.php");
        }
    }
}

echo $twig->render(
    'cart.html.twig',
    ['order' => $currentOrder]
);
