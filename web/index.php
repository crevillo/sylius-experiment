<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Acme\Catalog;

$catalog = Catalog::init();

$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../app/views');
$twig = new \Twig_Environment($loader);

echo $twig->render(
    'index.html.twig',
    ['products' => $catalog->getProducts()]
);


