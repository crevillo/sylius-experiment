<?php

namespace Acme\Model;

use Sylius\Component\Product\Model\Product as SyliusProduct;
use Sylius\Component\Product\Model\ProductTranslation;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;

class Product extends SyliusProduct implements TranslatableInterface
{
    use TranslatableTrait;

    const LOCALE = 'es_ES';

    private $price;

    public function __construct($sku, $name, $description, $price, $slug ='')
    {
        parent::__construct();

        $this->setCurrentLocale(self::LOCALE);
        $this->setFallbackLocale(self::LOCALE);
        $this->setCode($sku);
        $this->setPrice($price);

        $translation = new ProductTranslation();
        $translation->setLocale(self::LOCALE);
        $translation->setSlug($slug);
        $translation->setName($name);
        $translation->setDescription($description);

        $this->addTranslation($translation);
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }
}
