<?php

namespace DashBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use CoreBundle\Entity\Usuarios;
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

    /**
     * @Route("/nuevo-usuario" , name="newuser")
     * @Method({"GET", "POST"})
     */
    public function newUsuarioAction(Request $request){
        $usuario = new Usuarios();
        $form = $this->createForm('CoreBundle\Form\UsuarioType', $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();

            return $this->redirectToRoute('dashboard' );
        }

        return $this->render('@Dash/Default/newuser.html.twig',array(
            'usuario' => $usuario,
            'form' => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Usuarios entity.
     *
     * @Route("/{id}/edit", name="usuarios_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Usuarios $usuario)
    {
            $deleteForm = $this->createDeleteForm($usuario);
            $editForm = $this->createForm('CoreBundle\Form\UsuarioType', $usuario);
            $editForm->handleRequest($request);

            if ($editForm->isSubmitted() && $editForm->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($usuario);
                $em->flush();

                return $this->redirectToRoute('login');

            }

            return $this->render('@Dash/Default/edituser.html.twig', array(
                'usuario' => $usuario,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ));
    }

    /**
     * Deletes a Usuarios entity.
     *
     * @Route("/{id}", name="usuarios_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Usuarios $usuario)
    {
        $form = $this->createDeleteForm($usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($usuario);
            $em->flush();
        }

        return $this->redirectToRoute('login');
    }

    /**
     * Creates a form to delete a Usuarios entity.
     *
     * @param Usuarios $usuario The Usuarios entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Usuarios $usuario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usuarios_delete', array('id' => $usuario->getIdu())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

}
