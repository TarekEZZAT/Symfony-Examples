<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ViewsTwigController extends AbstractController
{
    /**
     * @Route("/viewstwig", name="viewstwig")
     */
    public function index()
    {
        return $this->render('viewstwig/index.html.twig', [
            'controller_name' => 'ViewsTwigController',
        ]);
    }
}
