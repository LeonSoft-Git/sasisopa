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

        $phpWordObject = $this->get('phpword')->createPHPWordObject();
        $section = $phpWordObject->addSection();
        $section->addText(
            '"Learn from yesterday, live for today, hope for tomorrow. '
            . 'The important thing is not to stop questioning." '
            . '(Albert Einstein)'
        );
        $writer = $this->get('phpword')->createWriter($phpWordObject,'Word2007');
        $writer->save($this->getParameter('test_directory').DIRECTORY_SEPARATOR."ejemplo.docx");

        $source = $this->getParameter('test_directory')."/ejemplo.docx";
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

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'pdf'=>$this->getParameter('test_directory').DIRECTORY_SEPARATOR.'prueba.pdf']);


       /* $query = $this->getDoctrine()->getManager();
        $doc =  $query->getRepository('CoreBundle:Documentos')->findOneBy(array('idc' => 1));

        $templateWord = new TemplateProcessor('C:\xampp\htdocs\sasisopa\documentos\Apartado II.docx');

        $templateWord ->setValue('Value1' , $doc->getNoEstacion());
        $templateWord ->setValue('Value2',  $doc->getRazonSocial());
        $templateWord ->setValue('Value3' , $doc->getDireccion());
        $templateWord ->setValue('Value4' , $doc->getAlfanum());
        $templateWord ->setValue('Value5' , $doc->getFechaPublicacion()->format('d.m.Y'));
        $templateWord ->setValue('Value6' , $doc->getFechaInicio()->format('d.m.Y'));
        $templateWord ->setValue('Value7' , $doc->getNombreReviso());
        $templateWord ->setValue('Value8' , $doc->getPuestoReviso());
        $templateWord ->setValue('Value9' , $doc->getQuienAprobo());
        $templateWord ->setValue('Value10', $doc->getPuestoAprobo());

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
            'pdf'=>$this->getParameter('test_directory').DIRECTORY_SEPARATOR.'prueba.pdf']);*/

    }
}
