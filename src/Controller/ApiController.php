<?php

namespace App\Controller;

use Knp\Snappy\Pdf;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends AbstractController
{

    const ENCODING = 'utf-8';

    /**
     * @\Symfony\Component\Routing\Annotation\Route("/string", name="pdf-string-output", methods={"POST"})
     * @param Request $request
     * @param Pdf $pdf
     * @return Response
     */
    public function stringAction(Request $request, Pdf $pdf): Response
    {
        $html = $request->request->get('html');
        $pdfParams = ['encoding' => self::ENCODING];
        $pdf->getOutput($html, $pdfParams);
        return new Response($pdf);

    }
}