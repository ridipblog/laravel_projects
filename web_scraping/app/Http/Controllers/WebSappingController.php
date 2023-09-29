<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class WebSappingController extends Controller
{
    public function show_images()
    {
        $url = 'https://pradummna.github.io/nft/';
        $client = new Client();
        $response = $client->get($url);
        $html = $response->getBody();

        $crawler = new Crawler($html, $url);
        $imageUrl = array();
        foreach ($crawler->filter('img')->images() as $node) {
            array_push($imageUrl, $node->getUri());
        }
        return view('fetch_image', ['imageUrls' => $imageUrl]);
    }
    public function scrapeNews()
    {
        $url = 'https://pradummna.github.io/nft';
        $client = new Client();
        $response = $client->get($url);
        $html = $response->getBody();

        $crawler = new Crawler($html, $url);

        // get text
        // $titles = $crawler->filter('p')->each(function ($node) {
        //     return $node->text();
        // });

        // get Image src

        // $imageUrls = $crawler->filter('img')->images()->each(function ($imageNode) {
        //     return $imageNode->getUri();
        // });
        $imageUrl = array();
        foreach ($crawler->filter('img')->images() as $node) {
            array_push($imageUrl, $node->getUri());
        }
        // dd($titles);
        dd($imageUrl);
        // return response()->json(['titles' => $titles]);
    }
}
