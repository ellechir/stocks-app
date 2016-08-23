<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Symfony\Component\DomCrawler\Crawler;
use Goutte\Client;

class StocksScraperController extends Controller
{
    private $client;
    
    public function __construct($client = NULL) {
        $this->middleware('auth');
        $this->client = ($client === NULL) ? new Client() : $client;
    }

    public function get($code) {
        $mainUrl = 'http://quotes.wsj.com/PH/XPHS/';
        $url = $mainUrl . $code;
        $crawler = $this->client->request('GET', $url);

        return $this->prepareData($crawler, $code);
    }

    private function prepareData(Crawler $crawler, $code) {
        $quote = $crawler->filter('#quote_val')->text();
        $symbol = $crawler->filter('.cr_sym')->text();
        $name = $crawler->filter('.companyName')->text();

        return compact(
            'quote',
            'symbol',
            'name',
            'code'
        );
    }


}
