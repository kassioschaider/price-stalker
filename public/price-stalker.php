<?php

require 'vendor/autoload.php';

use KassioSchaider\PriceStalker\PriceSeeker;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://www.cliquefarma.com.br/preco/']);
$crawler = new Crawler();

$priceSeeker = new PriceSeeker($client, $crawler);
$prices = $priceSeeker->seek('7899026437210dsdsd');

var_dump($prices);

//foreach ($prices as $price)
//{
//   echo $price . PHP_EOL;
//}