<?php

require 'vendor/autoload.php';

use Alura\BuscadorDeCursos\Searcher;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

//Caso não tenha a configuração do psr-4, pode configurar no composer para instanciar a classe pela raiz
Teste::teste();
$client = new Client(['base_uri' => 'https://alura.com.br/']);
$crawler = new Crawler();
//composer install --no-dev não instala dependências de dev


$searcher = new Searcher($client, $crawler);
$courses = $searcher->search('cursos-online-programacao/php');

foreach ($courses as $course){
  showMessage($course);
}
