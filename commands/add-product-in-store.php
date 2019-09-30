<?php

use KassioSchaider\PriceStalker\Entity\Product;
use KassioSchaider\PriceStalker\Entity\Store;
use KassioSchaider\PriceStalker\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$idProduct = $argv[1];
$idStore = $argv[2];

/** @var Store $store */
$store = $entityManager->find(Store::class, $idStore);
/** @var Product $product */
$product = $entityManager->find(Product::class, $idProduct);

$store->addProduct($product);

$entityManager->flush();