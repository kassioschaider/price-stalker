<?php

namespace KassioSchaider\PriceStalker\Controller;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;

class PriceSeekerCliqueFarma implements InterfaceSeeker

{
    const selectorprice = 'p.title-1.color-10.preco-oferta2.inline';
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var Crawler
     */
    private $crawler;

    public function __construct()
    {
        $this->httpClient = new Client(['base_uri' => 'https://www.cliquefarma.com.br/preco/']);
        $this->crawler = new Crawler();
    }

    public function seek(string $barCode) : array
    {
        try {
            $response = $this->httpClient->request('GET', $barCode);
        } catch (GuzzleException $e) {
            echo "Site inacessível.";
        }
        $html = $response->getBody();
        $this->crawler->addHtmlContent($html);

        $unitPrices = $this->crawler->filter(self::selectorprice);
        //$unitPrices = $this->crawler->filter('figcaption.no-margin-bt.xs-size');
        $prices = [];

        foreach ($unitPrices as $unitPrice) {
            $prices[] = $unitPrice->textContent;
        }

        return $prices;
    }
}
