<?php

namespace DashBundle\Controller;


//Use que funcionan para llamar los entitys y que funcionen las consultas, mandar llamar los controllers y las rutas
//
use CoreBundle\Entity\DocumentosExternos;
use CoreBundle\Entity\ListaControl;
use CoreBundle\Entity\ListaDistribucion;
use CoreBundle\Entity\ListaEquiposNuevos;
use CoreBundle\Entity\RevisionesExternas;
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
     * @Route("/insertar-lista-de-distribucion-de-documentos-del-sistema-de-administracion", name="newlddsa")
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

    //Controlador para la vista del formulario de la Lista de control de documentos apartado VIII

    /**
     * @Route("/insertar-lista-de-control-de-documentos", name="newlcd")
     * @Method({"GET", "POST"})
     */

    public function newlcdAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if ($user->getuser() == 1 || $user->getuser() == 2) {
            $listacontrol = new ListaControl();
            $form = $this->createForm('CoreBundle\Form\ListaControlType', $listacontrol);
            $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($listacontrol);
                    $em->flush();

                    return $this->redirectToRoute('lcd');
                }

                return $this->render('@Dash/Default/newlistacontrol.html.twig', array(
                    'listacontrol' => $listacontrol,
                    'form' => $form->createView()
                ));

        } else{
            return $this->redirect($this->generateUrl('lcd'));
        }
    }

    //Controlador para la vista de Lista de control de documentos apartado VIII
    /**
     * @Route("/lista-de-control-de-documentos", name="lcd")
     */

    public function lcdAction()
    {
        $query = $this->getDoctrine()->getManager();
        $listac = $query->getRepository('CoreBundle:ListaControl')->findAll();
        return $this->render('@Dash/Default/listacontrol.html.twig', array('listac' => $listac));
    }

    //Controlador para la vista Control de documentos externos apartado VIII
    /**
     * @Route("/control-de-documentos-externos", name="cde")
     */
    public function cdeAction()
    {
        $query = $this->getDoctrine()->getManager();
        $documentose = $query->getRepository('CoreBundle:DocumentosExternos')->findAll();
        return $this->render('@Dash/Default/documentos_externos.twig', array('documentose' => $documentose));
    }

    //Controlador para la vista del formulario de Documentos externos apartado VIII
    /**
     * @Route("/insertar-documento-externo", name="newcde")
     * @Method({"GET", "POST"})
     */
        public function newcdeAction(Request $request)
    {
        $documentosexternos = new DocumentosExternos();
        $form = $this->createForm('CoreBundle\Form\DocumentosExternosType', $documentosexternos);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($documentosexternos);
            $em->flush();

            return $this->redirectToRoute('cde');
        }

        return $this->render('@Dash/Default/newdocumentoexterno.html.twig', array(
            'documentosexternos' => $documentosexternos,
            'form' => $form->createView()
        ));
    }

    //Controlador para las fechas de revision de documentos externos (apartado VIII)
    /**
     * @Route("/insertar-fecha-documento-externo", name="newfcde")
     * @Method({"GET", "POST"})
     */
    public function newfcdeAction(Request $request)
    {
        $revisionesexternas = new RevisionesExternas();
        $form = $this->createForm('CoreBundle\Form\RevisionesExternasType', $revisionesexternas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($revisionesexternas);
            $em->flush();

            return $this->redirectToRoute('cde');
        }

        return $this->render('@Dash/Default/newfechaexterna.html.twig', array(
            'revisionesexternas' => $revisionesexternas,
            'form' => $form->createView()
        ));
    }



    //Controlador para la vista de pdf de mejores prácticas y estándares apartado IX
    /**
     * @Route("/mejores-practicas-y-estandares", name="mpe")
     */
    public function mpeAction()
    {
        return $this->render('@Dash/Default/practicas_estandares.html.twig');
    }

    //Cada controlador manda llamar una vista que ya esta predefinida en la vista de formato (apartado X)

    /**
     * @Route("/control-de-aspectos-ambientales-y-reducción-de-riesgos", name="caarr")
     */
    public function caarrAction()
    {
        return $this->render('@Dash/Default/apartadoX.html.twig', array('id' => 1));
    }
    /**
     * @Route("/pruebas-y-puesta-en-marcha-de-instalaciones-y-equipos", name="ppmie")
     */
    public function ppmieAction()
    {
        return $this->render('@Dash/Default/apartadoX.html.twig',  array('id' => 2));
    }
    /**
     * @Route("/uso-maquinaria-y-equipo", name="ume")
     */
    public function umeAction()
    {
        return $this->render('@Dash/Default/apartadoX.html.twig',  array('id' => 3));
    }
    /**
     * @Route("/manejo-de-combustibles-y-sustancias-quimicas", name="mcsq")
     */
    public function mcsqAction()
    {
        return $this->render('@Dash/Default/apartadoX.html.twig',  array('id' => 4));
    }
    /**
     * @Route("/proteccion-ambiental", name="pa")
     */
    public function paAction()
    {
        return $this->render('@Dash/Default/apartadoX.html.twig',  array('id' => 5));
    }
    /**
     * @Route("/despacho-de-combustible-al-consumidor", name="dcc")
     */
    public function dccAction()
    {
        return $this->render('@Dash/Default/apartadoX.html.twig',  array('id' => 6));
    }
    /**
     * @Route("/acceso-y-circulacion-de-auto-tanques-y-vehiculos-de-reparto", name="acatvr")
     */
    public function acatvrAction()
    {
        return $this->render('@Dash/Default/apartadoX.html.twig',  array('id' => 7));
    }
    /**
     * @Route("/descarga-de-combustible-con-auto-tanques", name="dcat")
     */
    public function dcatAction()
    {
        return $this->render('@Dash/Default/apartadoX.html.twig',  array('id' => 8));
    }

    //Cada controlador manda llamar una vista que ya esta predefinida en la vista de apartado XI (apartado XI)

    /**
     * @Route("/integridad-mecanica-y-aseguramiento-de-calidad", name="imac")
     */
    public function imacAction()
    {
        return $this->render('@Dash/Default/apartadoXI.html.twig', array('id' => 1));
    }
    /**
     * @Route("/manual-de-mantenimiento-a-maquinaria-y-equipo", name="mmme")
     */
    public function mmmeAction()
    {
        return $this->render('@Dash/Default/apartadoXI.html.twig', array('id' => 2));
    }
    /**
     * @Route("/identificación-de-equipos-críticos", name="iec")
     */
    public function iecAction()
    {
        return $this->render('@Dash/Default/apartadoXI.html.twig', array('id' => 3));
    }
    /**
     * @Route("/procedimiento-de-limpieza-y-revision-a-instalaciones", name="plri")
     */
    public function plriAction()
    {
        return $this->render('@Dash/Default/apartadoXI.html.twig', array('id' => 4));
    }
    /**
     * @Route("/revision-limpieza-y-mantenimiento-anual-de-los-elementos-constructivos-e-instalaciones", name="rlmaeci")
     */
        public function rlmaeciAction()
        {
            return $this->render('@Dash/Default/apartadoXI.html.twig', array('id' => 5));
        }
    /**
     * @Route("/revision-y-mantenimiento-anual-de-los-sistemas-y-elementos-de-seguridad", name="rmases")
     */
    public function rmasesAction()
    {
        return $this->render('@Dash/Default/apartadoXI.html.twig', array('id' => 6));
    }
    /**
     * @Route("/revision-y-mantenimiento-anual-de-los-equipos-instalados", name="rmaei")
     */
    public function rmaeiAction()
    {
        return $this->render('@Dash/Default/apartadoXI.html.twig', array('id' => 7));
    }

    //Controlador para vista del formulario Listado de Equipos Críticos (apartado XI)

    /**
     * @Route("/insertar-lista-verificacion-de-equipos-nuevos", name="newlven")
     * @Method({"GET", "POST"})
     */
    public function newlvenAction(Request $request)
    {
        $listaequip = new ListaEquiposNuevos();
        $form = $this->createForm('CoreBundle\Form\ListaEquiposNuevosType', $listaequip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($listaequip);
            $em->flush();

            return $this->redirectToRoute('lic');
        }

        return $this->render('@Dash/Default/newlistaequiposnuevos.html.twig', array(
            'revisionesexternas' => $revisionesexternas,
            'form' => $form->createView()
        ));
    }

    //Controlador para vista de Listado de Equipos o sistemas nuevos (apartado XI)
    /**
     * @Route("/listado-de-equipos-o-sistemas-nuevos", name="lesn")
     */
    public function lesnAction()
    {
        return $this->render('@Dash/Default/equipos_nuevos.html.twig');
    }

    //Controlador para vista de Listado de Equipos Críticos (apartado XI)
    /**
     * @Route("/listado-de-equipos-criticos", name="lic")
     */
    public function licAction()
    {
        return $this->render('@Dash/Default/equipos_criticos.html.twig');
    }
}

