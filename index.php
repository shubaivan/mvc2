<?php

require_once 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use mvc\Controller\TimController;
use mvc\Controller\IndexController;
use Phroute\RouteCollector;
use mvc\MvcKernel;

/*$request = Request::createFromGlobals();

$loader = new Twig_Loader_Filesystem(__DIR__ . '/app/views');
$twig = new Twig_Environment($loader);
$TimController = new TimController($twig);
$indexController = new IndexController($twig);

$router = new RouteCollector();

$router->get('/', [$indexController, 'indexAction']);
$router->get('/tim', [$TimController, 'getTimsAction']);
$router->get('/tim/{timId}', [$TimController, 'getTimAction']);

$dispatcher = new Phroute\Dispatcher($router);
try {
    $response = $dispatcher->dispatch($request->getMethod(), parse_url($request->getPathInfo(), PHP_URL_PATH));
} catch (Phroute\Exception\HttpRouteNotFoundException $e) {
    $response = new Response($twig->render('error404.html.twig'));
} catch (Phroute\Exception\HttpMethodNotAllowedException $e) {
    $response = new Response(sprintf('<h1 style="color: red">Error 405:</h1><b style="color: red">Url was matched but method "%s" is not allowed</b>', $e));
}

$response->send();*/
$request = Request::createFromGlobals();
$kernel = new MvcKernel();
$response = $kernel->handle($request);
$response->send();
