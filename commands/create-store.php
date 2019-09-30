<?php

use KassioSchaider\PriceStalker\Entity\Store;
use KassioSchaider\PriceStalker\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$store = new Store();
$store->setName($argv[1]);

$entityManager->persist($store);
$entityManager->flush();