<?php
require_once 'vendor/autoload.php';

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

$loader = new FilesystemLoader(__DIR__ . '/app/Views');
$twig = new Environment($loader);

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $router) {
    $router->addRoute('GET', '/articles', ['App\Controllers\ArticleController', 'index']);
    $router->addRoute('GET', '/articles-show1', ['App\Controllers\ArticleController', 'show']);
    $router->addRoute('GET', '/articles-show2', ['App\Controllers\ArticleController', 'show2']);
    $router->addRoute('GET', '/articles-show3', ['App\Controllers\ArticleController', 'show3']);
    $router->addRoute('GET', '/articles-show4', ['App\Controllers\ArticleController', 'show4']);
    $router->addRoute('GET', '/articles-show5', ['App\Controllers\ArticleController', 'show5']);
    $router->addRoute('GET', '/articles-show6', ['App\Controllers\ArticleController', 'show6']);
    $router->addRoute('GET', '/articles-show7', ['App\Controllers\ArticleController', 'show7']);
    $router->addRoute('GET', '/articles-show8', ['App\Controllers\ArticleController', 'show8']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        break;
    case FastRoute\Dispatcher::FOUND:
        $vars = $routeInfo[2];
        [$className, $method] = $routeInfo[1];
        $response = (new $className)->{$method}();

        $viewName = $response->getViewName();
        $data = $response->getData();

        $articleList = [
            'Article Show 1',
            'Article Show 2',
            'Article Show 3',
            'Article Show 4',
            'Article Show 5',
            'Article Show 6',
            'Article Show 7',
            'Article Show 8'
        ];

        if ($viewName === 'Article List') {
            echo $twig->render('article.twig', ['articles' => $data['articles']]);
        } else {
            foreach ($articleList as $articles) {
                if ($viewName === $articles) {
                    $article = $data['article'];
                    echo $twig->render('article.twig', [
                        'title' => $article->getTitle(),
                        'content' => $article->getDescription(),
                        'date' => $article->getPublicationDate()
                    ]);
                    break;
                }
            }
        }
}
