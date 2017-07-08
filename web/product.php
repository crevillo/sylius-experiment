<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/includes/init.php';

use Acme\Catalog;

$catalog = Catalog::init();
$cartManager = new \Acme\Core\CartManager();
/** @var \Sylius\Component\Order\Model\Order $currentOrder */
$order = $cartManager->getCurrentOrder();

if ($_POST && $_POST['code']) {
    $product = $catalog->getProductByCode($_POST['code']);

    $cartManager->addItem($product);

    header('Location: cart.php');
}

echo $twig->render(
    'product.html.twig',
    ['product' => $catalog->getProductByCode($_GET['c'])]
);

