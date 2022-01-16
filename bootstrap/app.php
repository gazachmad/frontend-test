<?php

use Libraries\Twig;

error_reporting(-1);
ini_set('display_errors', 1);

define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

// Path to the front controller (this file) directory
define('FCPATH', realpath(__DIR__ . '/..') . '/');

// The path to the "views" directory
define('VIEWPATH', realpath(FCPATH . 'templates') . '/');


$twig = new Twig;

$json = file_get_contents(FCPATH . 'assets/data/data.json');
$data = json_decode($json);

$twig->render('home/page.html.twig', ['data' => $data->json]);
