<?php
require_once 'vendor/autoload.php'; // Load Twig

$loader = new \Twig\Loader\FilesystemLoader('templates'); // Specify the directory where your templates are located
$twig = new \Twig\Environment($loader); // Create a new Twig environment

echo $twig->render('body.html.twig', ['gibbyVar' => 'gibbeey' ]); // Render the "body.html.twig" templates and output the resulting HTML
