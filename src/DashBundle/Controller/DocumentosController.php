<?php

namespace DashBundle\Controller;


use PhpOffice\PhpWord\TemplateProcessor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Dompdf\Dompdf;

class DocumentosController extends Controller
{
    /**
     * @Route("/prueba", name="prueba")
     */
    public function pruebaAction()
    {
        $query = $this->getDoctrine()->getManager();
        $doc =  $query->getRepository('CoreBundle:Documentos')->findAll();

        $templateWord = new TemplateProcessor('C:\xampp\htdocs\sasisopa\documentos\Apartado II.docx');

        foreach ($doc as $i){

            $templateWord ->setValue('Value1' , $i->getNoEstacion());
            $templateWord ->setValue('Value2', $i->getRazonSocial());
            $templateWord ->setValue('Value3' , $i->getDireccion());
            $templateWord ->setValue('Value4' , $i->getAlfanum());
            $templateWord ->setValue('Value5' , $i->getFechaPublicacion()->format('d.m.Y'));
            $templateWord ->setValue('Value6' , $i->getFechaInicio()->format('d.m.Y'));
            $templateWord ->setValue('Value7' , $i->getNombreReviso());
            $templateWord ->setValue('Value8' , $i->getPuestoReviso());
            $templateWord ->setValue('Value9' , $i->getQuienAprobo());
            $templateWord ->setValue('Value10' , $i->getPuestoAprobo());
        }

        $templateWord->saveAs('ApartadoII.docx');

        header("Content-Disposition: attachment; filename=ApartadoII.docx; charset=iso-8859-1");
        echo file_get_contents('ApartadoII.docx');


        $source = $this->getParameter('test_directory')."/ApartadoII.docx";
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($source);
        $htmlWriter = $this->get('phpword')->createWriter($phpWord,'HTML');
        $htmlWriter->save($this->getParameter('test_directory').DIRECTORY_SEPARATOR."prueba.html");

        $html = file_get_contents($this->getParameter('test_directory').DIRECTORY_SEPARATOR."prueba.html");

        $dompdf = new Dompdf();
        $dompdf->setPaper('letter', 'portrait');
        $dompdf->loadHtml($html);
        $dompdf->render();
        $file = $dompdf->output();
        file_put_contents($this->getParameter('test_directory').DIRECTORY_SEPARATOR."prueba.pdf",$file);

        return $this->render('@Dash/Default/prueba.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'pdf'=>$this->getParameter('test_directory').DIRECTORY_SEPARATOR.'prueba.pdf']);

    }
}
