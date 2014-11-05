<?php

namespace mvc;

use mvc\Controller\TimController;

class MvcKernel extends Kernel
{
    public function getRoutes()
    {
            return array(
                ['GET', '/', 'mvc\Controller\IndexController:indexAction'],
                ['GET', '/tim', 'mvc\Controller\TimController:getTimsAction'],
                ['GET', '/tim/{timId}', 'mvc\Controller\TimController:getTimAction'],

            );

    }
    public function getTemplateHandler()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../app/views');
        $twig = new \Twig_Environment($loader);
        return $twig;
    }
}