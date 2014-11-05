<?php

namespace mvc;

use Phroute\RouteCollector;
use Phroute\Dispatcher;
use Symfony\Component\HttpFoundation\Request;
use mvc\Controller\TimController;
use mvc\Controller\IndexController;

abstract class Kernel implements KernelInterface
{
    public function handle(Request $request)
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/app/views');
        $twig = new \Twig_Environment($loader);
        $router = $this->handleRoutes($this->getRoutes());
        $dispatcher = new Dispatcher($router);
        try {
            $response = $dispatcher->dispatch($request->getMethod(), parse_url($request->getPathInfo(), PHP_URL_PATH));
        } catch ( \Phroute\Exception\HttpRouteNotFoundException $e) {
            $response = new Response($twig->render('error404.html.twig'));
        } catch ( \Phroute\Exception\HttpMethodNotAllowedException $e) {
            $response = new Response(sprintf('<h1 style="color: red">Error 405:</h1><b style="color: red">Url was matched but method "%s" is not allowed</b>', $e));
        }
        return $response;
    }
    protected function handleRoutes(array $routes)
    {
        $router = new RouteCollector();
        $TimController = $this->getControllers($routes);
        return $router;
    }
    protected function getControllers($routes)
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/app/views');
        $twig = new \Twig_Environment($loader);
        $TimController = new TimController($twig);
        $indexController = new IndexController($twig);
        return $TimController;
       
    }
}