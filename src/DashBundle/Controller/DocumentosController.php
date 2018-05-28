<?php

namespace DashBundle\Controller;

use DashBundle\DashBundle;
use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\TemplateProcessor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class DocumentosController extends Controller
{


    /**
     * @Route("/prueba", name="prueba")
     */
    public function pruebaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $doc =  $em->getRepository('CoreBundle:Documentos')->findAll();

        foreach ($doc as $i) {
            
        }
            $templateWord = new TemplateProcessor('C:\xampp\htdocs\sasisopa\documentos\Apartado II.docx');

            $templateWord->setValue('Value1', $i->getNoEstacion());


            $templateWord->saveAs('ApartadoII.docx');

            header("Content-Disposition: attachment; filename=ApartadoII.docx; charset=iso-8859-1");
            echo file_get_contents('ApartadoII prueba.docx');


        return $response;

    }
}
