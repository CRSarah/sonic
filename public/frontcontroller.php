<?php

// Inclusion des classes
include __DIR__.'/../app/Utils/DBData.php';
include __DIR__.'/../app/controllers/CoreController.php';
include __DIR__.'/../app/controllers/MainController.php';
include __DIR__.'/../app/controllers/DevelopersController.php';
include __DIR__.'/../app/models/CoreModel.php';
include __DIR__.'/../app/models/CharacterModel.php';

// Inclusion d'autoload pour pouvoir utiliser les dépendances
require __DIR__.'/../vendor/autoload.php';

// $_GET['_url'] contient l'adresse URL actuelle
// Ici, on admet qu'on récupére l'URL demandée, ou / si ça n'existe pas
$currentUrl = isset($_GET['_url']) ? $_GET['_url'] : '/';

/**
 * AltoRouter
 * 1 - composer require ...
 * 2 - require de vendor/autoload.php
 * 3 - instanciation de l'objet $router
 * 4 - définir le basePath
 * 5 - mapper toutes les routes
 * 6 - lancer la recherche de correspondance (méthode match)
*/

// Instanciation de la classe AltoRouter / de l'objet $router
$router = new AltoRouter();
// dump($router);exit;

// Je dis à AltoRouter, d'ignorer dans l'URL complète actuelle, tous les dossiers et sous-dossiers qui nous amènent jusqu'à notre projet
$router->setBasePath($_SERVER['BASE_URI']);


// Je déclare la route pour la home
// ->map parameters:
//    - GET => method HTTP
//    - '/' => pattern d'URL => URL de la page
//    - 'MainController#home' => string contenant le nom du Controller puis # puis le nom de la méthode pour cette page
//    - 'home' => le nom de cette route
$router->map('GET', '/', 'MainController#home', 'home');

// Je déclare la route pour la page sur les créateurs
$router->map('GET', '/createurs/', 'DevelopersController#developers', 'developers_developers');

// Recherche de correspondance
$match = $router->match();
// dump($match);

// Dispatch
// Si il y a un match (correspondance)
if ($match !== false) {
    // Alors je veux récupérer le nom du Controller et le nom de la méthode à appeler
    $target = $match['target'];
    $urlParamsFromMatch = $match['params'];
    // dump($target);
    // dump($urlParamsFromMatch);
    // Je sépare la chaine de caractère par le délimiteur #
    $explodedArray = explode('#', $target);
    // dump($explodedArray);
    // Je stocke les infos dans les bonnes variables
    $controllerName = $explodedArray[0];
    $methodName = $explodedArray[1];
    // dump($controllerName);
    // dump($methodName);
    // On veut instancier le bon controller
    $controller = new $controllerName($router);
    // Puis appeler la méthode de ce controller
    $controller->$methodName($urlParamsFromMatch);
}
else {
    //die('404');
    // on modifie l'entête de réponse pour avoir un statut 404
    header("HTTP/1.0 404 Not Found");

    $error404 = new MainController($router);
    $error404->error404();
}
