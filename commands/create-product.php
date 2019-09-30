<?php

use KassioSchaider\PriceStalker\Entity\Price;
use KassioSchaider\PriceStalker\Entity\Product;
use KassioSchaider\PriceStalker\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$product = new Product();
$product->setBarCode($argv[1]);
$product->setName($argv[2]);
$product->setMainPrice($argv[3]);

for ($i = 4; $i < $argc; $i++) {
    $channel = $argv[$i];
    $i++;
    $value = $argv[$i];

    /** @var Price $price */
    $price = new Price();
    $price->setChannel($channel);
    $price->setValue($value);
    $product->addPrice($price);
}

$entityManager->persist($product);

$entityManager->flush();