<?php

namespace dev\fileboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Dropbox as dbx;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('devfileboxBundle:Default:home.html.twig', array('url' => ''));
    }
    /**
     * @Route("/hello")
     */
    public function helloAction()
    {
        $cle = NULL;
        $path = __DIR__."/../Resources/config/configDropbox.json";
        $appInfo = dbx\AppInfo::loadFromJsonFile($path);
        $webAuth = new dbx\WebAuthNoRedirect($appInfo, "PHP-Example/1.0");
        $authorizeUrl = $webAuth->start();
        //$webAuth->finish($authCode);
        $form = $this ->createFormBuilder()
            ->add('cle')
            ->add('send', SubmitType::class , array("label" => 'OK'))
            ->getForm();
        //$webAuth->finish($cle);
        return $this->render('devfileboxBundle:Default:home.html.twig',array('url' => $authorizeUrl,
                                                                             'form' => $form->createView()));
    }
}
