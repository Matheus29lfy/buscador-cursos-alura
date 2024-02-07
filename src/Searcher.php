<?php

namespace Alura\BuscadorDeCursos;
// use GuzzleHttp\Client;
// use Symfony\Component\DomCrawler\Crawler;

class Searcher 
{
  private $httpClient;
  private $crawler;
  public function __construct($httpClient, $crawler)
  {
    $this->httpClient = $httpClient;
    $this->crawler = $crawler;
  }

  public function search(string $url):array
  {
    $response = $this->httpClient->request('GET',$url);
    $html = $response->getBody();
    $this->crawler->addHtmlContent($html);
    $elementCourses = $this->crawler->filter('span.card-curso__nome');
    $courses = [];
    foreach($elementCourses as $element){

      $courses[] = $element->textContent;

     }
    return $courses;
  }

}
