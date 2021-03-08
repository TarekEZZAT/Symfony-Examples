<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class C00100Controller extends AbstractController
{
    /**
     * @Route("/c00100", name="c00100")
     */
    public function index()
    {
        $users = ['Albert', 'Marie', 'Jean', 'Nathalie'];
        return $this->render('c00100/index.html.twig', [
            'city_name' => 'Paris',
            'users' => $users,
        ]);
    }
}

