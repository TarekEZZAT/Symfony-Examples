<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppvarsController extends AbstractController
{
    /**
     * @Route("/appvars", name="appvars")
     */
    public function index()
    {
        return $this->render('appvars/index.html.twig', [
            'controller_name' => 'AppvarsController',
        ]);
    }
}
