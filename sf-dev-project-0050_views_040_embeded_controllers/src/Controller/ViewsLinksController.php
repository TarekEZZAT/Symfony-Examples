<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ViewsLinksController extends AbstractController
{
    /**
     * @Route("/viewslinks", name="viewslinks")
     */
    public function index()
    {
        return $this->render('viewslinks/index.html.twig', [
            'controller_name' => 'ViewsLinksController',
        ]);
    }
}
