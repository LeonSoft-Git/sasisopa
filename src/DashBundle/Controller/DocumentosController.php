<?php

namespace DashBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// Include the requires classes of Phpword
use PhpOffice\PhpWord\PhpWord;

class DocumentosController extends Controller
{


    /**
     * @Route("/prueba", name="prueba")
     */
    public function pruebaAction()
    {
        $wordTest = new \PhpOffice\phpWord\phpWord();

        $newSection = $wordTest ->addSection();

        $desc1 = "Hola mi nombre es Karem";

        $desc2 = "Soy progranadora";

        $newSection->addText($desc1);
        $newSection->addText($desc2);

        $objectWritter = \PhpOffice\phpWord\IOFactory::createWriter($wordTest, 'Word2016');
        try{
            $objectWritter->save(storage_path('Prueba.docx'));
        }catch (\Exception $e){

        }
        return response()->download(storage_path('prueba.docx'));

        return $this->render('@Dash/Default/prueba.php');
    }


}

