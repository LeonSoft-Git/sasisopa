<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="core")
     */
    public function indexAction()
    {
        $query = $this->getDoctrine()->getManager();
        $usuario =  $query->getRepository('CoreBundle:Usuarios')->findAll();
        return $this->render('CoreBundle:Default:index.html.twig',array('grupo'=>$usuario));
    }
}
