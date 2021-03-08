<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;


/*
To use queries with parameters conversion, 
we need frame-extra-bundle

composer require sensio/framework-extra-bundle
*/
class C00250ParamConvertController extends AbstractController
{
    /**
     * @Route("/c00250/param/{id}", name="c00250_param_convert")
     */
    public function index(Request $request, Contact $contact)
    {
    // Put query parameter in the route and attached action

    // $entityManager = $this->getDoctrine()->getManager();
        //dump($contactsParam);

//        $this->$contacts = $contact;
        
        return $this->render('c00210_read/index.html.twig', [
            'function' => 'findAll()',
            'description' => 'finds all records in the table',
            'contact' => $contact,
        ]);
    } 
}
