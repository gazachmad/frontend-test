<?php

use Libraries\Twig;

require_once 'vendor/autoload.php';

define('VIEWPATH', 'templates/');

$twig = new Twig;

$json = file_get_contents('assets/data/data.json');
$data = json_decode($json);

$twig->render('home/page.html.twig', ['data' => $data->json]);
