<?php

namespace DashBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;




class DefaultController extends Controller
{
    /**
     * @Route("/", name="dashboard")
     */
    public function indexAction()
    {
        return $this->render('DashBundle:Default:index.html.twig');
    }

    /**
     * @Route("/requisitos-legales-vigentes", name="rlv")
     */
    public function rlvAction(){
        $query = $this->getDoctrine()->getManager();
        $req =  $query->getRepository('CoreBundle:LegalRequirements')->findAll();
        return $this->render('@Dash/Default/formato3.html.twig',array('data'=>$req));
    }

    /**
     * @Route("/politica-I", name="politica")
     */
    public function politicaAction(){
        return $this->render('@Dash/Default/formato.html.twig' , array('id'=>1));
    }

    /**
     * @Route("/identificacion-y-evaluacion-de-riesgos-e-impactos-ambientales", name="ieria")
     */
    public function ieriaAction(){
        return $this->render('@Dash/Default/formato.html.twig' , array('id'=>2));
    }

    /**
     * @Route("/gestion-de-politicas-y-metas", name="gpm")
     */
    public function gpmAction(){
        return $this->render('@Dash/Default/formato.html.twig' , array('id'=>3));
    }

    /**
     * @Route("/funciones-responsabilidades-y-autoridad", name="fra")
     */
    public function fraAction(){
        return $this->render('@Dash/Default/formato.html.twig' , array('id'=>4));
    }

    /**
     * @Route("/deberes-y-responsabilidades", name="dr")
     */
    public function drAction(){
        $query = $this->getDoctrine()->getManager();
        $acti =  $query->getRepository('CoreBundle:Activities')->findAll();
        return $this->render('@Dash/Default/formato6.html.twig',array('acti'=>$acti));
    }

}
