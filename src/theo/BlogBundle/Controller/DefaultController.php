<?php

namespace theo\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('theoBlogBundle:Default:index.html.twig');
    }
    /**
     * @Route("/hello")
     */
    public function hello()
    {
        $prenom = "theo";
        return $this->render('theoBlogBundle:Default:hello.html.twig',array('prenom' => $prenom));
    }
}
