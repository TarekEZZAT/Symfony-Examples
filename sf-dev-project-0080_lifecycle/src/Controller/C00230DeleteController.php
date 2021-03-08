<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;


class C00230DeleteController extends AbstractController
{
    /**
     * @Route("/c00230/delete", name="c00230_delete")
     */
    public function index()
    
    {

        $entityManager = $this->getDoctrine()->getManager();

        $id = 20;
        $contact = $entityManager->getRepository(contact::class)->find($id);

        if (!$contact)
        {
            throw $this->createNotFoundException(
                'No contact found for id '.$id
            );
        }
        $entityManager->remove($contact);
        $entityManager->flush();

//        dump($contact);

        return $this->render('c00230_delete/index.html.twig', [
            'controller_name' => 'C00230DeleteController',
        ]);
    }
}
