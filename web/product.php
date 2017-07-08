<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/includes/init.php';

use Acme\Catalog;

$catalog = Catalog::init();

echo $twig->render(
    'product.html.twig',
    ['product' => $catalog->getProductByCode($_GET['c'])]
);
