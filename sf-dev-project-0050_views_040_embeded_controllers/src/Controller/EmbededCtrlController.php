<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EmbededCtrlController extends AbstractController
{
    /**
     * @Route("/embededctrl", name="embeded_ctrl")
     */
    public function index()
    {
        return $this->render('embeded_ctrl/index.html.twig', [
            'controller_name' => 'EmbededCtrlController',
        ]);
    }

    public function popularItems ($number = 3){ 

            // simulate a result of a database query
            $items = ['item1','item2','item3','item4','item4','item4']; 
            return $this->render('defaults/popularItems.html.twig',[ 
            'items'=>$items,
            ]
            );


    }
}
