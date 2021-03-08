<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ViewsglobalsController extends AbstractController
{
    /**
     * @Route("/viewsglobals", name="viewsglobals")
     */
    public function index()
    {
        return $this->render('viewsglobals/index.html.twig', [
            'controller_name' => 'ViewsglobalsController',
        ]);
    }
}
