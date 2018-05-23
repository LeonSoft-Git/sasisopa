<?php

namespace DashBundle\Controller;


//Use que funcionan para llamar los entitys y que funcionen las consultas, mandar llamar los controllers y las rutas
//

use CoreBundle\Entity\RecursosNecesarios;
use CoreBundle\Entity\ReporteMantenimiento;
use CoreBundle\Entity\DocumentosExternos;
use CoreBundle\Entity\EvaluacionServicio;
use CoreBundle\Entity\HojaEspecificacion;
use CoreBundle\Entity\ListaControl;
use CoreBundle\Entity\ListaDistribucion;
use CoreBundle\Entity\ListaEquiposNuevos;
use CoreBundle\Entity\RevisionesExternas;
use CoreBundle\Entity\RevisionExtintores;
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
        /*
        $tmp = array();
        $tmp["nombre"] = "Cesar";
        $tmp["apellido"] = "Rios";
        $tmp["hijos"] = array('nombre hijo'=>"Leonardo");
        $json_string= json_encode($tmp);
        $file_name='ejemplo.json';
        $file=$this->getParameter('cp_directory').'/'.$file_name;
        file_put_contents($file,$json_string);
        $segundo=$this->getParameter('cp_directory'). '/ejemplo2.json';
        $datos=file_get_contents($segundo);
        $json=json_decode($datos,true);
        print_r($json);
        exit;
        */
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
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user->getLevel()->getIdl()==1 || $user->getLevel()->getIdl()==2) {
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
        } else{
            return $this->redirect($this->generateUrl('dashboard'));
        }

    }



    //Controlador para guardar la consulta y mostrar el formulario de insertar archivo dentro de newfile

    /**
     * @Route("/insertar-carta-poder" , name="newfile")
     * @Method({"GET", "POST"})
     */
    public function newFileAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user->getLevel()->getIdl()==1 || $user->getLevel()->getIdl()==2) {
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
        }  else{
            return $this->redirect($this->generateUrl('dashboard'));
        }
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
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user->getLevel()->getIdl()==1 || $user->getLevel()->getIdl()==2) {
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
        }else{
            return $this->redirect($this->generateUrl('dashboard'));
        }
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
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user->getLevel()->getIdl()==1 || $user->getLevel()->getIdl()==2) {
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
        }else{
            return $this->redirect($this->generateUrl('dashboard'));
        }
    }
    //Controlador para la vista de Lista de distribucion de documentos apartado VIII

    /**
     * @Route("/lista-de-distribucion-de-documentos-del-sistema-de-administracion", name="lddsa")
     * @Method({"GET", "POST"})
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
        if($user->getLevel()->getIdl()==1 || $user->getLevel()->getIdl()==2) {
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
        }else{
            return $this->render('@Dash/Default/listacontrol.html.twig');
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
        $revisiones = $query->getRepository('CoreBundle:RevisionesExternas')->findAll();

        return $this->render('@Dash/Default/documentos_externos.html.twig', array('documentose' => $documentose,'revisiones'=>$revisiones));
    }

    //Controlador para generar el formulario para insertar fecha en control de documentos externos apartado VIII
    /**
     * @Route("/{id}/insertar-fecha-control-documentos-externos", name="nfcd")
     * @Method({"GET", "POST"})
     */
    public function nfcdcdeAction(Request $request, $id)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user->getLevel()->getIdl()==1 || $user->getLevel()->getIdl()==2) {

            $revisionesExternas = new RevisionesExternas();
            $form = $this->createForm('CoreBundle\Form\RevisionesExternasType', $revisionesExternas);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $doc = $em->getRepository('CoreBundle:DocumentosExternos')->findOneBy(array('idde'=>$id));
                $revisionesExternas->setDocumentosExternos($doc);
                $em->persist($revisionesExternas);
                $em->flush();

                return $this->redirectToRoute('cde');
            }

            return $this->render('@Dash/Default/newfechaexterna.html.twig', array(
                'id' => $id,
                'form' => $form->createView()
            ));
        } else {
            return $this->redirect($this->generateUrl('dashboard'));
        }
    }

    //Controlador para la vista del formulario de Documentos externos apartado VIII
    /**
     * @Route("/insertar-documento-externo", name="newcde")
     * @Method({"GET", "POST"})
     */
        public function newcdeAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user->getLevel()->getIdl()==1 || $user->getLevel()->getIdl()==2) {
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
        } else {
            return $this->redirect($this->generateUrl('dashboard'));
        }
    }

    //Controlador para las fechas de revision de documentos externos (apartado VIII)
    /**
     * @Route("/insertar-fecha-documento-externo", name="newfcde")
     * @Method({"GET", "POST"})
     */
    public function newfcdeAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user->getLevel()->getIdl()==1 || $user->getLevel()->getIdl()==2) {
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
        }else {
            return $this->redirect($this->generateUrl('dashboard'));
        }
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

    //Controlador para vista del formulario Listado de Equipos Nuevos (apartado XI)

    /**
     * @Route("/insertar-lista-verificacion-de-equipos-nuevos", name="newlven")
     * @Method({"GET", "POST"})
     */
    public function newlvenAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user->getLevel()->getIdl()==1 || $user->getLevel()->getIdl()==2){
            $listaequip = new ListaEquiposNuevos();
            $form = $this->createForm('CoreBundle\Form\ListaEquiposNuevosType', $listaequip);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($listaequip);
                $em->flush();

                return $this->redirectToRoute('lvec');
            }

            return $this->render('@Dash/Default/newlistaequiposnuevos.html.twig', array(
                'listaequip' => $listaequip,
                'form' => $form->createView()
            ));
        }else{
            return $this->redirect($this->generateUrl('dashboard'));
        }
    }


    //Controladores para ver cada formato de la Lista de Equipos o Sistemas Nuevos. (apartado XI)

    /**
     * @Route("/{id}/listado-de-verificacion-de-equipos-o-sistemas-nuevos", name="lvesc")
     * @Method({"GET", "POST"})
     */
    public function viewLicAction(Request $request, ListaEquiposNuevos $listaequip)
    {
        $editForm = $this->createForm('CoreBundle\Form\ListaEquiposNuevosType', $listaequip);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist();
            $em->flush();

            return $this->redirectToRoute('lvec');

        }

        return $this->render('@Dash/Default/viewlistaequipos_nuevos.html.twig', array(
            'listaequip' => $listaequip,
            'edit_form' => $editForm->createView()
        ));
    }

    //Controlador para vista de Listado de Equipos nuevos (apartado XI)
    /**
     * @Route("/lista-de-equipos-nuevos", name="lvec")
     */
    public function lvecAction()
    {
        $em = $this->getDoctrine()->getManager();
        $eqnu = $em->getRepository('CoreBundle:ListaEquiposNuevos')->findAll();
        return $this->render('DashBundle:Default:equipos_nuevos.html.twig', array('eqnu' => $eqnu));
    }

    //Controlador para vista de Hoja de Especificación y Datos Técnicos (apartado XI)

    /**
     * @Route("/hoja-especificacion-y-datos-tecnicos", name="hedt")
     */
    public function hedtAction()
    {
        $em = $this->getDoctrine()->getManager();
        $hoja = $em->getRepository('CoreBundle:HojaEspecificacion')->findAll();
        return $this->render('DashBundle:Default:hoja_especificacion.html.twig', array('hoja' => $hoja));
    }

    //Controlador para vista del formulario Hoja de especificacion (apartado XI)

    /**
     * @Route("/insertar-hoja-de-especificacion-y-datos-tecnicos", name="newhedt")
     * @Method({"GET", "POST"})
     */
    public function newhedtAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user->getLevel()->getIdl()==1 || $user->getLevel()->getIdl()==2){
            $hojaesp = new HojaEspecificacion();
            $form = $this->createForm('CoreBundle\Form\HojaEspecificacionDatosType', $hojaesp);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($hojaesp);
                $em->flush();

                return $this->redirectToRoute('hedt');
            }

            return $this->render('@Dash/Default/newhojaespecificacion.html.twig', array(
                'hojaesp' => $hojaesp,
                'form' => $form->createView()
            ));
        }else{
            return $this->redirect($this->generateUrl('dashboard'));
        }
    }

    //Controladores para ver cada formato de la Hoja de especificacion y datos tecnicos (apartado XI)

    /**
     * @Route("/{id}/hoja-de-especificacion-y-datos-tecnicos", name="vhedt")
     * @Method({"GET", "POST"})
     */
    public function viewVhedtAction(Request $request, HojaEspecificacion $hojaesp)
    {
        $editForm = $this->createForm('CoreBundle\Form\HojaEspecificacionDatosType', $hojaesp);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist();
            $em->flush();

            return $this->redirectToRoute('hedt');

        }

        return $this->render('@Dash/Default/viewhoja_especificacion.html.twig', array(
            'hojaesp' => $hojaesp,
            'edit_form' => $editForm->createView()
        ));
    }
    //Controlador para vista de Listado de Equipos Críticos (apartado XI)
    /**
     * @Route("/lista-de-equipos-criticos", name="lec")
     */
    public function lecAction()
    {
        return $this->render('@Dash/Default/equipos_criticos.html.twig');
    }

    //Controladores para las vistas del apartado XII
    /**
     * @Route("/carta-compromiso", name="cc")
     */
    public function ccAction()
    {
        return $this->render('@Dash/Default/apartadoXII.html.twig', array('id' => 1));
    }
    /**
     * @Route("/evaluacion-y-seleccion-de-contratistas-subcontratistas-prestadores-de-servicios-y-proveedores", name="escspsp")
     */
    public function escspspAction()
    {
        return $this->render('@Dash/Default/apartadoXII.html.twig', array('id' => 2));
    }
    /**
     * @Route("/acceso-a-contratistas-subcontratistas-prestadores-de-servicio-y-provedores", name="acspsp")
     */
    public function acspspAction()
    {
        return $this->render('@Dash/Default/apartadoXII.html.twig', array('id' => 3));
    }

    //Controlador para vista del formulario evaluacion a servicio nuevo (apartado XII)
    /**
     * @Route("/insertar-evaluacion-a-servicio", name="newes")
     */
    public function newesAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user->getLevel()->getIdl()==1 || $user->getLevel()->getIdl()==2){
            $evaluacion = new EvaluacionServicio();
            $form = $this->createForm('CoreBundle\Form\EvaluacionServcioType', $evaluacion);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($evaluacion);
                $em->flush();

                return $this->redirectToRoute('es');
            }

            return $this->render('@Dash/Default/newevaluacionservicio.html.twig', array(
                'evaluacion' => $evaluacion,
                'form' => $form->createView()
            ));
        }else{
            return $this->redirect($this->generateUrl('dashboard'));
        }
    }

    //Controladores para ver cada formato de la Hoja de especificacion y datos tecnicos (apartado XI)

    /**
     * @Route("/{id}/evaluacion-a-servicio", name="ves")
     * @Method({"GET", "POST"})
     */
    public function viewEsAction(Request $request, EvaluacionServicio $evaluacion)
    {
        $editForm = $this->createForm('CoreBundle\Form\EvaluacionServcioType', $evaluacion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist();
            $em->flush();

            return $this->redirectToRoute('es');

        }

        return $this->render('@Dash/Default/viewevaluacion_servicios.html.twig', array(
            'evaluacion' => $evaluacion,
            'edit_form' => $editForm->createView()
        ));
    }

    //Controlador para vista de evaluacion a servicio nuevo (apartado XII)
    /**
     * @Route("/evaluacion-a-servicio", name="es")
     */
    public function esAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reporte = $em->getRepository('CoreBundle:EvaluacionServicio')->findAll();
        return $this->render('DashBundle:Default:evaluacion_servicios.html.twig', array('reporte' => $reporte));
    }

    //Controlador para vista de Reporte mantenimiento (apartado XII)
    /**
     * @Route("/reporte-de-mantenimiento", name="rm")
     * @Method({"GET", "POST"})
     */
    public function rmAction()
    {
        $em = $this->getDoctrine()->getManager();
        $mantenimiento = $em->getRepository('CoreBundle:ReporteMantenimiento')->findAll();
        return $this->render('@Dash/Default/reporte_mantenimiento.twig', array('reporte' => $mantenimiento));
    }
    //Controlador para vista del formulario Reporte mantenimiento (apartado XII)

    /**
     * @Route("/insertar-reporte-de-mantenimiento", name="newrm")
     * @Method({"GET", "POST"})
     */
    public function newrmAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user->getLevel()->getIdl()==1 || $user->getLevel()->getIdl()==2){
            $mantenimiento = new ReporteMantenimiento();
            $form = $this->createForm('CoreBundle\Form\ReporteMantenimientoType', $mantenimiento);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($mantenimiento);
                $em->flush();
                return $this->redirectToRoute('rm');
            }

            return $this->render('@Dash/Default/newreportemantenimiento.html.twig', array(
                'mantenimiento' => $mantenimiento,
                'form' => $form->createView()
            ));
        }else{
            return $this->redirect($this->generateUrl('dashboard'));
        }
    }


    //Controladores para ver cada formato de Reporte de mantenimiento (apartado XII)

    /**
     * @Route("/{id}/reporte-de-mantenimiento", name="viewrm")
     * @Method({"GET", "POST"})
     */
    public function viewRmAction(Request $request, ReporteMantenimiento $mantenimiento)
    {
        $editForm = $this->createForm('CoreBundle\Form\ReporteMantenimientoType', $mantenimiento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist();
            $em->flush();

            return $this->redirectToRoute('rm');

        }

        return $this->render('@Dash/Default/viewreporte_mantenimiento.html.twig', array(
            'mantenimiento' => $mantenimiento,
            'edit_form' => $editForm->createView()
        ));
    }

    //Controlador para vista del formulario recursos necesarios (apartado XII)
    /**
     * @Route("/{id}/insertar-recurso-reporte-de-mantenimiento", name="nwrn")
     * @Method({"GET", "POST"})
     */
    public function nwrnAction(Request $request, $id)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user->getLevel()->getIdl()==1 || $user->getLevel()->getIdl()==2) {

            $recurso = new RecursosNecesarios();
            $form = $this->createForm('CoreBundle\Form\RecursosNecesariosType', $recurso);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $doc = $em->getRepository('CoreBundle:ReporteMantenimiento')->findOneBy(array('idrm'=>$id));
                $recurso->setReporteMantenimiento($doc);
                $em->persist($recurso);
                $em->flush();

                return $this->redirectToRoute('rm');
            }

            return $this->render('@Dash/Default/newrecursos.html.twig', array(
                'id' => $id,
                'form' => $form->createView()
            ));
        } else {
            return $this->redirect($this->generateUrl('dashboard'));
        }
    }

    //Controlador para vista del formulario recursos necesarios (apartado XII)

    /**
     * @Route("/insertar-recursos-necesarios", name="newrn")
     * @Method({"GET", "POST"})
     */
    public function newrnAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user->getLevel()->getIdl()==1 || $user->getLevel()->getIdl()==2){
            $recursos = new RecursosNecesarios();
            $form = $this->createForm('CoreBundle\Form\RecursosNecesariosType', $recursos);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($recursos);
                $em->flush();

                return $this->redirectToRoute('rm');
            }

            return $this->render('@Dash/Default/newrecursos.html.twig', array(
                'recursos' => $recursos,
                'form' => $form->createView()
            ));
        }else{
            return $this->redirect($this->generateUrl('dashboard'));
        }
    }

    //Apartado XIII

    //Controladores para las vistas de PDF del apartado XIII

    /**
    * @Route("/identificacion-de-situaciones-de-emergencia", name="ise")
    */
    public function iseAction()
    {
        return $this->render('@Dash/Default/apartadoXIII.html.twig', array('id' => 1));
    }
    /**
     * @Route("/plan-de-atencion-a-emergencias", name="pae")
     */
    public function paeAction()
    {
        return $this->render('@Dash/Default/apartadoXIII.html.twig', array('id' => 2));
    }
    /**
     * @Route("/investigacion-y-analisis-despues-de-la-emergencia", name="iade")
     */
    public function iadeAction()
    {
        return $this->render('@Dash/Default/apartadoXIII.html.twig', array('id' => 3));
    }
    /**
     * @Route("/revision-de-equipo-de-atencion-de-emergencias", name="reae")
     */
    public function reaeAction()
    {
        return $this->render('@Dash/Default/apartadoXIII.html.twig', array('id' => 4));
    }

    //Controlador para formulario de revision de extintores

    /**
     * @Route("/insertar-revision-de-exintores", name="newrex")
     * @Method({"GET", "POST"})
     */
    public function newrexAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user->getLevel()->getIdl()==1 || $user->getLevel()->getIdl()==2){
            $extintor = new RevisionExtintores();
            $form = $this->createForm('CoreBundle\Form\RevisionExtintoresType', $extintor);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($extintor);
                $em->flush();
                return $this->redirectToRoute('rex');
            }

            return $this->render('@Dash/Default/newRevisionExtintores.html.twig', array(
                'extintor' => $extintor,
                'form' => $form->createView()
            ));
        }else{
            return $this->redirect($this->generateUrl('dashboard'));
        }
    }
    //Controlador para la vista de revision de Extintores
    /**
     * @Route("/revision-de-extintores", name="rex")
     * @Method({"GET", "POST"})
     */
    public function rexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $extintor = $em->getRepository('CoreBundle:RevisionExtintores')->findAll();
        return $this->render('@Dash/Default/RevisionExtintores.html.twig', array('extintor' => $extintor));
    }

    //Apartado XIV


}

