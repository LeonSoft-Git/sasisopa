<?php

namespace DashBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use CoreBundle\Entity\LegalRequirements;
use CoreBundle\Entity\Archivos;
use CoreBundle\Entity\Reporte1;
use Symfony\Component\HttpFoundation\Request;




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
     * @Route("/Carta_Poder", name="carta")
     */
    public function cartaAction(){
        return $this->render('@Dash/Default/formato.html.twig' , array('id'=>4));
    }

    /**
     * @Route("/Poder" , name="newfile")
     * @Method({"GET", "POST"})
     */
    public function newFileAction(Request $request){
        $archivo = new Archivos();
        $form = $this->createForm('CoreBundle\Form\ArchivosType', $archivo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if($archivo->getCartaPoder()){
                $file = $archivo->getCartaPoder();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                $file->move($this->getParameter('cp_directory'),$fileName);
                $archivo->setCartaPoder($fileName);

            }

            $em->persist($archivo);
            $em->flush();
        }

        return $this->render('@Dash/Default/carta.html.twig',array(
            'archivo' => $archivo,
            'form' => $form->createView()
        ));
    }


    /**
     * @Route("/Reporte-de-aspectos-ambientales", name="newrepo")
     * @Method({"GET", "POST"})
     */
    public function newReporteAction(Request $request){
        $reporte1 = new Reporte1();
        $form = $this->createForm('CoreBundle\Form\ReporteAspAmbType', $reporte1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rep = $this->getDoctrine()->getManager();
            $rep->persist($reporte1);
            $rep->flush();

            return $this->redirectToRoute('newrepo' );
        }

        return $this->render('@Dash/Default/formato7.html.twig',array(
            'reporte1' => $reporte1,
            'form' => $form->createView()
        ));
    }


    /**
     * @Route("/deberes-y-responsabilidades", name="dr")
     */
    public function drAction(){
        $query = $this->getDoctrine()->getManager();
        $acti =  $query->getRepository('CoreBundle:Activities')->findAll();
        $respo =  $query->getRepository('CoreBundle:Responsibilities')->findAll();
        $deb =  $query->getRepository('CoreBundle:Deberes')->findAll();
        return $this->render('@Dash/Default/formato6.html.twig',array('acti'=>$acti , 'respo'=>$respo , 'deb'=>$deb));
    }

    /**
         * @Route("/nuevo-requerimiento", name="new")
         * @Method({"GET", "POST"})
         */
    public function newRequerimientoAction(Request $request){
            $requerimiento = new LegalRequirements();
            $form = $this->createForm('CoreBundle\Form\RequirementType', $requerimiento);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($requerimiento);
                  $em->flush();

        return $this->redirectToRoute('rlv' );
        }

        return $this->render('@Dash/Default/newrequirement.html.twig',array(
                    'requerimiento' => $requerimiento,
                    'form' => $form->createView()
                    ));
    }


    /**
     * @Route("/Reporte-de-aspectos-ambientales", name="raa")
     */
    public function raaAction()
    {
        return $this->render('DashBundle:Default:formato7.html.twig');
    }





}
