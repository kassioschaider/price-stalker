<?php

use KassioSchaider\PriceStalker\Entity\Price;
use KassioSchaider\PriceStalker\Entity\Product;
use KassioSchaider\PriceStalker\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$productRepository = $entityManager->getRepository(Product::class);

/** @var Product[] $productList */
$productList = $productRepository->findAll();

foreach ($productList as $product) {
    $prices = $product
        ->getPrices()
        ->map(function (Price $price) {
            return $price->getChannel();
        })
        ->toArray();
    echo $product . "\n";
    echo implode(', ', $prices) . "\n";
}