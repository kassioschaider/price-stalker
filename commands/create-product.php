<?php

use KassioSchaider\PriceStalker\Entity\Product;
use KassioSchaider\PriceStalker\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$product = new Product();
$product->setBarCode($argv[1]);
$product->setName($argv[2]);
$product->setMyPrice($argv[3]);

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$entityManager->persist($product);

$entityManager->flush();