<?php

namespace mvc\Controller;

use Symfony\Component\HttpFoundation\Response;
use mvc\Models\Barcelona;
use mvc\Models\RealMadrid;

class TimController
{
    /** @var \Twig_Environment */
    protected $twig;
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }
    /**
     * @return Response
     */
    public function getTimsAction()
    {
        return new Response($this->twig->render('tims.html.twig'));
    }
    /**
     * @param  string   $id
     * @return Response
     */
    public function getTimAction($timId)
    {
        switch ($timId) {
            case 'barsa':
                $Barcelona = new Barcelona('Luis Enrique', 'Camp Nou', 'Xavier ');
                echo $Barcelona->show();
                break;
            case 'real':
                $RealMadrid = new RealMadrid('Carlo Ancelotti', 'Santiago Bernabeu', 'Casillas');
                echo $RealMadrid->show();

                echo ' Champions League - ' . $RealMadrid->LC();
                break;
            default:
                return new Response(sprintf('<h1 style="color: red">Error:</h1><p style="color: red">Method not found for tim <b>"%s"</b></p>', $timId));
        }

        return new Response($this->twig->render('tim.html.twig', array('show' => $timId)) . '<br>' . $timId);
    }
    /**
     * @param  string   $id
     * @return Response
     */
    public function putArticleAction($id)
    {
        return new Response($this->twig->render('article.html.twig', ['method' => 'Put', 'articleId' => $id]));
    }
    /**
     * @param  string   $id
     * @return Response
     */
    public function postArticleAction($id)
    {
        return new Response($this->twig->render('article.html.twig', ['method' => 'Post', 'articleId' => $id]));
    }
    /**
     * @param  string   $id
     * @return Response
     */
    public function deleteArticleAction($id)
    {
        return new Response($this->twig->render('article.html.twig', ['method' => 'Delete', 'articleId' => $id]));
    }
}
