<?php

namespace KassioSchaider\PriceStalker;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;

class PriceSeeker
{
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var Crawler
     */
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function seek(string $url) : array
    {
        try {
            $response = $this->httpClient->request('GET', $url);
        } catch (GuzzleException $e) {
            echo "Site inacessível.";
        }
        $html = $response->getBody();
        $this->crawler->addHtmlContent($html);

        //$unitPrices = $this->crawler->filter('p.title-1.color-10.preco-oferta2.inline');
        $unitPrices = $this->crawler->filter('figcaption.no-margin-bt.xs-size');
        $prices = [];

        foreach ($unitPrices as $unitPrice) {
            $prices[] = $unitPrice->textContent;
        }

        return $prices;
    }
}
