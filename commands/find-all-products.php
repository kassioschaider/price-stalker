<?php

use KassioSchaider\PriceStalker\Entity\Product;
use KassioSchaider\PriceStalker\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$productRepository = $entityManager->getRepository(Product::class);

/** @var Product[] $productList */
$productList = $productRepository->findAll();

foreach ($productList as $product) {
    echo $product . "\n";
}
