<?php

namespace DashBundle\Controller;


//Use que funcionan para llamar los entitys y que funcionen las consultas, mandar llamar los controllers y las rutas
//
use CoreBundle\Entity\ListaDistribucion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use CoreBundle\Entity\LegalRequirements;
use CoreBundle\Entity\Archivos;
use CoreBundle\Entity\Reporte1;
use CoreBundle\Entity\Organigrama;
use CoreBundle\Entity\ReporteAspAmbType;
use Symfony\Component\HttpFoundation\Request;




class DefaultController extends Controller
{
    //Controlador para la vista del index
    /**
     * @Route("/", name="dashboard")
     */
    public function indexAction()
    {
        return $this->render('DashBundle:Default:index.html.twig');
    }

    //Cada controlador manda llamar una vista que ya esta predefinida en la vista de formato

    /**
     * @Route("/politica-I", name="politica")
     */
    public function politicaAction()
    {


        return $this->render('@Dash/Default/formato.html.twig', array('id' => 1));
    }

    /**
     * @Route("/identificacion-y-evaluacion-de-riesgos-e-impactos-ambientales", name="ieria")
     */
    public function ieriaAction()
    {
        return $this->render('@Dash/Default/formato.html.twig', array('id' => 2));
    }

    /**
     * @Route("/gestion-de-politicas-y-metas", name="gpm")
     */
    public function gpmAction()
    {
        return $this->render('@Dash/Default/formato.html.twig', array('id' => 3));
    }

    /**
     * @Route("/Carta_Poder", name="carta")
     */
    public function cartaAction()
    {
        return $this->render('@Dash/Default/formato.html.twig', array('id' => 4));
    }

    //Controlador para la vista de requisitos legales (apartado 3)

    /**
     * @Route("/requisitos-legales-vigentes", name="rlv")
     */
    public function rlvAction()
    {
        $query = $this->getDoctrine()->getManager();
        $req = $query->getRepository('CoreBundle:LegalRequirements')->findAll();
        return $this->render('@Dash/Default/formato3.html.twig', array('data' => $req));
    }

    //Controlador de generar un nuevo requerimiento

    /**
     * @Route("/nuevo-requerimiento", name="new")
     * @Method({"GET", "POST"})
     */
    public function newRequerimientoAction(Request $request)
    {
        $requerimiento = new LegalRequirements();
        $form = $this->createForm('CoreBundle\Form\RequirementType', $requerimiento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($requerimiento);
            $em->flush();

            return $this->redirectToRoute('rlv');
        }

        return $this->render('@Dash/Default/newrequirement.html.twig', array(
            'requerimiento' => $requerimiento,
            'form' => $form->createView()
        ));
    }



    //Controlador para guardar la consulta y mostrar el formulario de insertar archivo dentro de newfile

    /**
     * @Route("/Poder" , name="newfile")
     * @Method({"GET", "POST"})
     */
    public function newFileAction(Request $request)
    {
        $archivo = new Archivos();
        $form = $this->createForm('CoreBundle\Form\ArchivosType', $archivo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if ($archivo->getCartaPoder()) {
                $file = $archivo->getCartaPoder();

                $fileName = md5(uniqid()) . '.' . $file->guessExtension();
                $file->move($this->getParameter('cp_directory'), $fileName);
                $archivo->setCartaPoder($fileName);

            }

            $em->persist($archivo);
            $em->flush();
        }

        return $this->render('@Dash/Default/carta.html.twig', array(
            'archivo' => $archivo,
            'form' => $form->createView()
        ));
    }

    //Controlador para mostrar deberes y responsabilidades

    /**
     * @Route("/deberes-y-responsabilidades", name="dr")
     */
    public function drAction()
    {
        $query = $this->getDoctrine()->getManager();
        $acti = $query->getRepository('CoreBundle:Activities')->findAll();
        $respo = $query->getRepository('CoreBundle:Responsibilities')->findAll();
        $deb = $query->getRepository('CoreBundle:Deberes')->findAll();
        return $this->render('@Dash/Default/formato6.html.twig', array('acti' => $acti, 'respo' => $respo, 'deb' => $deb));
    }

    //Controlador para la vista del apartado 7 (PDF)

    /**
     * @Route("/Reporte-de-aspectos-ambientales", name="raa")
     * @Method("GET")
     *
     */
    public function raaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reportes = $em->getRepository('CoreBundle:Reporte1')->findAll();
        return $this->render('DashBundle:Default:formato7.html.twig', array('reportes' => $reportes));
    }

    //Controlador para guardar la consulta y mostrar el formulario dentro de newreporte1

    /**
     * @Route("/insertar-reporte-de-aspectos-ambientales", name="newrepo")
     * @Method({"GET", "POST"})
     */
    public function newReporteAction(Request $request)
    {
        $reporte1 = new Reporte1();
        $form = $this->createForm('CoreBundle\Form\ReporteAspAmbType', $reporte1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rep = $this->getDoctrine()->getManager();
            $rep->persist($reporte1);
            $rep->flush();

            return $this->redirectToRoute('raa');
        }

        return $this->render('@Dash/Default/newreporte1.html.twig', array(
            'reporte1' => $reporte1,
            'form' => $form->createView()
        ));
    }
    //Controlador para la vista del formulario de Editar en el apartado 7 (Reportes)

    /**
     * @Route("/{id}/editar-reporte", name="editrepo")
     * @Method({"GET", "POST"})
     */
    public function editReporteAction(Request $request, Reporte1 $reporte1)
    {
        $editForm = $this->createForm('CoreBundle\Form\ReporteAspAmbType', $reporte1);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reporte1);
            $em->flush();

            return $this->redirectToRoute('raa');

        }

        return $this->render('@Dash/Default/editreporte1.html.twig', array(
            'reporte1' => $reporte1,
            'edit_form' => $editForm->createView()
        ));
    }

    //Controlador para la vista de los reportes del apartado 7

    /**
     * @Route("/{id}/vista-reporte", name="viewrepo")
     * @Method({"GET", "POST"})
     */
    public function viewReporteAction(Request $request, Reporte1 $reporte1)
    {
        $editForm = $this->createForm('CoreBundle\Form\ReporteAspAmbType', $reporte1);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reporte1);
            $em->flush();

            return $this->redirectToRoute('raa');

        }

        return $this->render('@Dash/Default/viewreporte1.html.twig', array(
            'reporte1' => $reporte1,
            'edit_form' => $editForm->createView()
        ));
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
    public function newOrgAction(Request $request)
    {
        $organigrama = new Organigrama();
        $form = $this->createForm('CoreBundle\Form\OrganigramaType', $organigrama);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $orga = $this->getDoctrine()->getManager();
            $orga->persist($organigrama);
            $orga->flush();

            return $this->redirectToRoute('org');
        }

        return $this->render('@Dash/Default/neworganigrama.html.twig', array(
            'organigrama' => $organigrama,
            'form' => $form->createView()
        ));
    }
    //Controlador para la vista de pdf de control de documentos apartado VIII
    /**
     * @Route("/Elaboración-y-Control-de-Documentos-y-Registros", name="ecdr")
     */
    public function ecdrAction()
    {
        return $this->render('@Dash/Default/control_documentos.html.twig');
    }

    //Controlador para la vista del formulario de la Lista de distribucion de documentos apartado VIII
    /**
     * @Route("/INSERTAR-LISTA-DE-DISTRIBUCIÓN-DE-DOCUMENTOS-DEL-SISTEMA-DE-ADMINISTRACIÓN.", name="newlddsa")
     * @Method({"GET", "POST"})
     */

    public function newlddsaAction(Request $request)
    {
        $listadistribucion = new ListaDistribucion();
        $form = $this->createForm('CoreBundle\Form\ListaDistribucionType', $listadistribucion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($listadistribucion);
            $em->flush();

            return $this->redirectToRoute('lddsa');
        }

        return $this->render('@Dash/Default/newlistadistribucion.html.twig', array(
            'listadistribucion' => $listadistribucion,
            'form' => $form->createView()
        ));
    }
    //Controlador para la vista de Lista de distribucion de documentos apartado VIII
    /**
     * @Route("/LISTA-DE-DISTRIBUCIÓN-DE-DOCUMENTOS-DEL-SISTEMA-DE-ADMINISTRACIÓN.", name="lddsa")
     */

    public function lddsaAction()
    {
        $query = $this->getDoctrine()->getManager();
        $lista = $query->getRepository('CoreBundle:ListaDistribucion')->findAll();
        return $this->render('@Dash/Default/listadistribucion.html.twig', array('data' => $lista));
    }

}
