<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__.'/../vendor/autoload.php';


Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(__DIR__.'/../src/View/Templates/');
$twig = new Twig_Environment($loader, array(
        'debug' => true
));

echo $twig->render('NewDentistEvent.html.twig');
//$template = $twig->loadTemplate('index.html.twig');
//echo $template->render();
