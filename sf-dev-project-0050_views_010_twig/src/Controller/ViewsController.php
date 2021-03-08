<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ViewsController extends AbstractController
{
    /**
     * @Route("/views", name="views")
     */
    public function index()
    {
        return $this->render('views/index.html.twig', [
            'controller_name' => 'ViewsController',
        ]);
    }
}
