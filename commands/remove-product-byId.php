<?php

use KassioSchaider\PriceStalker\Entity\Product;
use KassioSchaider\PriceStalker\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];
$product = $entityManager->getReference(Product::class, $id);

$entityManager->remove($product);
$entityManager->flush();
