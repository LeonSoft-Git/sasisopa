<?php

namespace DashBundle\Controller;


use CoreBundle\Entity\Organigrama;
use DashBundle\DashBundle;
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

    //Cada controlador manda llamar una vista que ya esta predefinida en la vista de formato

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


    //Controlador para guardar la consulta y mostrar el formulario de insertar archivo dentro de newfile
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



    //Controlador para mostrar deberes y responsabilidades
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
    //Controlador de generar un nuevo requerimiento
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

    //Controlador para la vista del apartado 7 (PDF)
    /**
     * @Route("/Reporte-de-aspectos-ambientales", name="raa")
     */
    public function raaAction()
    {

        return $this->render('DashBundle:Default:formato7.html.twig');
    }

    //Controlador para guardar la consulta y mostrar el formulario dentro de newreporte1

    /**
     * @Route("/insertar-reporte-de-aspectos-ambientales", name="newrepo")
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

            return $this->redirectToRoute('raa' );
        }

        return $this->render('@Dash/Default/newreporte1.html.twig',array(
            'reporte1' => $reporte1,
            'form' => $form->createView()
        ));
    }

    //Controlador para la vista de los reportes del apartado 7
    /**
     * @Route("/View-Reportes-de-aspectos-ambientales", name="vraa")
     */
    public function vraaAction()
    {

        return $this->render('DashBundle:Default:viewreportesambientales.html.twig');
    }

    //Controlador para la vista de el organigrama del apartado 7
    /**
     * @Route("/Comunicacion-Organigrama", name="org")
     */
    public function orgAction()
    {

        return $this->render('DashBundle:Default:organigrama.html.twig');
    }

    //Controlador para guardar la consulta y mostrar el formulario del organigrama

    /**
     * @Route("/insertar-Organigrama", name="neworg")
     * @Method({"GET", "POST"})
     */
    public function newOrgAction(Request $request){
        $org = new Organigrama();
        $form = $this->createForm('CoreBundle\Form\OrganigramaType', $org);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rep = $this->getDoctrine()->getManager();
            $rep->persist($org);
            $rep->flush();

            return $this->redirectToRoute('org' );
        }

        return $this->render('@Dash/Default/organigrama.html.twig',array(
            'organigrama' => $organigrama,
            'form' => $form->createView()
        ));
    }



}
